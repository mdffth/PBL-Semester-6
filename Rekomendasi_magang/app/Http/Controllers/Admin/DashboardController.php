<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\MinatBidang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $totalPerusahaan = Perusahaan::count();

        $lowonganAktif = Perusahaan::where(
            'status_magang',
            'Paid'
        )->count();

        $lowonganTutup = Perusahaan::where(
            'status_magang',
            'Unpaid'
        )->count();

        $perusahaan = Perusahaan::latest()
            ->paginate(10);

        return view('admin.dashboard', compact(
            'totalPerusahaan',
            'lowonganAktif',
            'lowonganTutup',
            'perusahaan'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH PERUSAHAAN
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $skills = Skill::all();

        $technologies = Technology::all();

        $minatBidang = MinatBidang::all();

        return view('admin.tambah_perusahaan', compact(
            'skills',
            'technologies',
            'minatBidang'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PERUSAHAAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            /*
            |--------------------------------------------------------------------------
            | DATA PERUSAHAAN
            |--------------------------------------------------------------------------
            */

            'name' => 'required|string|max:255',

            'tipe_industri' => 'required|string|max:255',

            'profile_perusahaan' => 'nullable|string',

            /*
            |--------------------------------------------------------------------------
            | LOWONGAN
            |--------------------------------------------------------------------------
            */

            'posisi_magang' => 'required|string|max:255',

            'job_description' => 'nullable|string',

            'status_magang' => 'required|in:Paid,Unpaid',

            'duration_months' => 'nullable|integer|min:1|max:12',

            'min_ipk' => 'nullable|numeric|min:0|max:4',

            'kota' => 'nullable|string|max:255',

            /*
            |--------------------------------------------------------------------------
            | LOGO
            |--------------------------------------------------------------------------
            */

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            /*
            |--------------------------------------------------------------------------
            | RELASI REKOMENDASI
            |--------------------------------------------------------------------------
            */

            'skill_id' => 'required|array',

            'technology_id' => 'required|array',

            'minat_id' => 'required|array',
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD LOGO
        |--------------------------------------------------------------------------
        */

        $logoPath = null;

        if ($request->hasFile('logo')) {

            $logoPath = $request->file('logo')
                ->store('logo_perusahaan', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA PERUSAHAAN
        |--------------------------------------------------------------------------
        */

        $perusahaan = Perusahaan::create([

            'name' => $request->name,

            'tipe_industri' => $request->tipe_industri,

            'profile_perusahaan' => $request->profile_perusahaan,

            'posisi_magang' => $request->posisi_magang,

            'job_description' => $request->job_description,

            'status_magang' => $request->status_magang,

            'duration_months' => $request->duration_months,

            'min_ipk' => $request->min_ipk,

            'kota' => $request->kota,

            'logo' => $logoPath,
        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN RELASI
        |--------------------------------------------------------------------------
        */

        $perusahaan->skills()->sync(
            $request->skill_id ?? []
        );

        $perusahaan->technologies()->sync(
            $request->technology_id ?? []
        );

        $perusahaan->minatBidang()->sync(
            $request->minat_id ?? []
        );

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('dashboard.index')
            ->with(
                'success',
                'Perusahaan berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | TOGGLE STATUS
    |--------------------------------------------------------------------------
    */

    public function toggleStatus($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->status_magang =
            $perusahaan->status_magang == 'Paid'
            ? 'Unpaid'
            : 'Paid';

        $perusahaan->save();

        return back();
    }

    // ==============================
    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $skills = Skill::all();

        $technologies = Technology::all();

        $minatBidang = MinatBidang::all();

        return view(
            'Admin.tambah_perusahaan',
            compact(
                'perusahaan',
                'skills',
                'technologies',
                'minatBidang'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'bidang_industri' => 'required',
            'posisi_magang' => 'required',
            'status_magang' => 'required',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'bidang_industri' => $request->bidang_industri,
            'company_profile' => $request->company_profile,
            'posisi_magang' => $request->posisi_magang,
            'status_magang' => $request->status_magang,
            'duration_months' => $request->duration_months,
            'min_ipk' => $request->min_ipk,
            'lokasi' => $request->lokasi,
            'job_description' => $request->job_description,
        ]);

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Perusahaan berhasil diupdate');
    }

    public function show($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        return view('Admin.detail_perusahaan', compact('perusahaan'));
    }
}