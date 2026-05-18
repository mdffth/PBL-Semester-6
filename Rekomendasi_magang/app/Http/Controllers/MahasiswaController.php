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

        $sort = $request->get('sort', 'name');
        if (in_array($sort, ['name', 'min_ipk', 'status_magang'])) {
            $direction = ($sort === 'status_magang') ? 'desc' : 'asc';
            $query->orderBy($sort, $direction);
        }

        $perusahaan = $query->paginate(9)->withQueryString();
        $totalPerusahaan = Perusahaan::count();

        $tipeIndustri = Perusahaan::select('tipe_industri')
            ->whereNotNull('tipe_industri')
            ->distinct()
            ->pluck('tipe_industri');

        return view('Mahasiswa.rekomendasi', compact('perusahaan', 'totalPerusahaan', 'tipeIndustri'));
    }
}