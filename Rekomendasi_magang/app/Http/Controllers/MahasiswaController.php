<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Landing Page
    public function landing()
    {
        $perusahaanList = Perusahaan::limit(6)->get();
        $totalPerusahaan = Perusahaan::count();

        return view('welcome', compact('perusahaanList', 'totalPerusahaan'));
    }

    // Page Rekomendasi + Filter
    public function rekomendasi(Request $request)
{
    $query = Perusahaan::query();

    // Filter yang sudah ada
    if ($request->filled('tipe_industri')) {
        $query->where('tipe_industri', 'like', '%' . $request->tipe_industri . '%');
    }

    if ($request->filled('status_magang')) {
        $query->where('status_magang', $request->status_magang);
    }

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('ipk')) {
        $query->where('min_ipk', '<=', (float) $request->ipk);
    }

    // ✅ Filter baru yang sebelumnya TIDAK dihandle
    if ($request->filled('benefit')) {
        $query->where('benefit', 'like', '%' . $request->benefit . '%');
    }

    if ($request->filled('provinsi')) {
        $query->where('provinsi', 'like', '%' . $request->provinsi . '%');
    }

    if ($request->filled('kota')) {
        $query->where('kota', 'like', '%' . $request->kota . '%');
    }

    $sort = $request->get('sort', 'name');
    if (in_array($sort, ['name', 'min_ipk', 'status_magang'])) {
        $direction = ($sort === 'status_magang') ? 'desc' : 'asc';
        $query->orderBy($sort, $direction);
    }

    $perusahaan = $query->paginate(9)->withQueryString();
    $totalPerusahaan = Perusahaan::count();

    $tipeIndustriList = Perusahaan::select('tipe_industri')
        ->whereNotNull('tipe_industri')
        ->distinct()
        ->orderBy('tipe_industri')
        ->pluck('tipe_industri');

    $benefitList = Perusahaan::select('benefit')
        ->whereNotNull('benefit')  // ✅ tambah whereNotNull agar konsisten
        ->distinct()
        ->orderBy('benefit')
        ->pluck('benefit');

    $provinsiList = Perusahaan::select('provinsi')
        ->whereNotNull('provinsi')
        ->distinct()
        ->orderBy('provinsi')
        ->pluck('provinsi');

    $kotaList = Perusahaan::select('kota')
        ->whereNotNull('kota')
        ->distinct()
        ->orderBy('kota')
        ->pluck('kota');

    return view('Mahasiswa.rekomendasi', compact(
        'perusahaan',
        'totalPerusahaan',
        'tipeIndustriList',
        'benefitList',
        'provinsiList',
        'kotaList'
    ));
}
}