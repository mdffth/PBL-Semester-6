<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total perusahaan
        $totalPerusahaan = Perusahaan::count();

        // Lowongan aktif
        $lowonganAktif = Perusahaan::where(
            'status_magang',
            'paid'
        )->count();

        // Lowongan tutup
        $lowonganTutup = Perusahaan::where(
            'status_magang',
            'unpaid'
        )->count();

        // Ambil semua perusahaan terbaru
        $perusahaan = Perusahaan::latest()
            ->paginate(10);

        return view('admin.dashboard', compact(
            'totalPerusahaan',
            'lowonganAktif',
            'lowonganTutup',
            'perusahaan',
            
        ));
    }
    public function toggleStatus($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->status_magang =
            $perusahaan->status_magang == 'Paid'
            ? 'Unpaid'
            : 'Paid';

        $perusahaan->save();

        return response()->json([
            'success' => true,
            'status' => $perusahaan->status_magang
        ]);
    }

    public function create()
    {
        return view('Admin.tambah_perusahaan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'bidang_industri' => 'required',
            'posisi_magang' => 'required',
            'status_magang' => 'required',
        ]);

        Perusahaan::create([
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
            ->with('success', 'Perusahaan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->delete();

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        return view('Admin.tambah_perusahaan', compact('perusahaan'));
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