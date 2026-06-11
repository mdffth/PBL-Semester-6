<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalPerusahaan = Perusahaan::count();

        $lowonganAktif = Perusahaan::where(
            'status_magang',
            'Active'
        )->count();

        $lowonganTutup = Perusahaan::where(
            'status_magang',
            'Nonactive'
        )->count();

        // TOP 5 MINAT BIDANG

        $topMinat = DB::table('minat_bidang')
            ->join(
                'perusahaan_posisi',
                'minat_bidang.id',
                '=',
                'perusahaan_posisi.minat_bidang_id'
            )
            ->select(
                'minat_bidang.name',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('minat_bidang.id', 'minat_bidang.name')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $labels = $topMinat->pluck('name');
        $data = $topMinat->pluck('total');

        // PERUSAHAAN BERDASARKAN INDUSTRI

        $industriChart = Perusahaan::select(
                'tipe_industri',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('tipe_industri')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $industriLabels = $industriChart->pluck('tipe_industri');
        $industriData = $industriChart->pluck('total');

        $query = Perusahaan::query();

        if ($request->filter == 'active') {
            $query->where('status_magang', 'Active');
        }

        if ($request->filter == 'nonactive') {
            $query->where('status_magang', 'Nonactive');
        }

        $perusahaan = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.dashboard', compact(
            'totalPerusahaan',
            'lowonganAktif',
            'lowonganTutup',
            'perusahaan',

            'labels',
            'data',

            'industriLabels',
            'industriData'
        ));
    }

    // ==============================
    // UPDATE
    // ==============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tipe_industri' => 'required|string|max:255',
            
            // 'posisi_magang' => 'required|exsist:minat_bidang,id',
            'benefit' => 'required|in:Paid,Unpaid',

            'profile_perusahaan' => 'nullable|string',
            'job_description' => 'nullable|string',

            'duration_months' => 'nullable|integer|min:1|max:12',
            'min_ipk' => 'nullable|numeric|min:0|max:4',
            'kota' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'skill_id' => 'nullable|array',
            'technology_id' => 'nullable|array',
            'minat_id' => 'nullable|array',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        /* UPDATE LOGO (JIKA ADA) */
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/perusahaan'), $filename);
            $perusahaan->logo = 'img/perusahaan/' . $filename;
            $perusahaan->save();
        }

        $perusahaan->update([
            'name' => $request->name,
            'tipe_industri' => $request->tipe_industri,
            'profile_perusahaan' => $request->profile_perusahaan,
            'posisi_magang' => '-',
            'benefit' => $request->benefit,
            'min_ipk' => $request->min_ipk,
            'kota' => $request->kota,
            'duration_months' => $request->duration_months ?? $perusahaan->duration_months,
            'job_description' => $request->job_description ?? $perusahaan->job_description,
        ]);

        /* SYNC RELASI */
        $perusahaan->skills()->sync($request->skill_id ?? []);
        $perusahaan->technologies()->sync($request->technology_id ?? []);
        $perusahaan->minatBidang()->sync($request->minat_id ?? []);

        return redirect()->route('dashboard.index', [
            'page' => $request->page
        ])->with('success', 'Data berhasil diperbarui');
    }

    // ==============================
    // SHOW
    // ==============================
    public function show($id)
    {
        $perusahaan = Perusahaan::with([
            'skills',
            'technologies',
            'minatBidang',
            'benefit'
        ])->findOrFail($id);

        return view('Admin.detail_perusahaan', compact('perusahaan'));
    }
}