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
    $filter   = $request->filter;
    $bidang   = $request->bidang;
    $industri = $request->industri;

    /*
    |--------------------------------------------------------------------------
    | QUERY DASAR UNTUK FILTER TABEL
    |--------------------------------------------------------------------------
    */
    $baseQuery = Perusahaan::query()

        ->when($filter == 'active', function ($q) {
            $q->where('status_magang', 'Active');
        })

        ->when($filter == 'nonactive', function ($q) {
            $q->where('status_magang', 'Nonactive');
        })

        ->when($industri, function ($q) use ($industri) {
            $q->where('tipe_industri', $industri);
        })

        ->when($bidang, function ($q) use ($bidang) {
            $q->whereHas('minatBidang', function ($sub) use ($bidang) {
                $sub->where('name', $bidang);
            });
        });

    /*
    |--------------------------------------------------------------------------
    | STATISTIK GLOBAL
    |--------------------------------------------------------------------------
    */
    $totalPerusahaan = (clone $baseQuery)->count();

    $lowonganAktif = (clone $baseQuery)
        ->where('status_magang', 'Active')
        ->count();

    $lowonganTutup = (clone $baseQuery)
        ->where('status_magang', 'Nonactive')
        ->count();

    /*
    |--------------------------------------------------------------------------
    | TOP 5 MINAT BIDANG
    |--------------------------------------------------------------------------
    */
    $topMinat = DB::table('minat_bidang')
        ->join(
            'perusahaan_posisi',
            'minat_bidang.id',
            '=',
            'perusahaan_posisi.minat_bidang_id'
        )
        ->join(
            'perusahaan',
            'perusahaan.id',
            '=',
            'perusahaan_posisi.perusahaan_id'
        )

        ->when($filter == 'active', function ($q) {
            $q->where('perusahaan.status_magang', 'Active');
        })

        ->when($filter == 'nonactive', function ($q) {
            $q->where('perusahaan.status_magang', 'Nonactive');
        })

        ->when($industri, function ($q) use ($industri) {
            $q->where('perusahaan.tipe_industri', $industri);
        })

        ->select(
            'minat_bidang.name',
            DB::raw('COUNT(*) as total')
        )

        ->groupBy(
            'minat_bidang.id',
            'minat_bidang.name'
        )

        ->orderByDesc('total')
        ->limit(5)
        ->get();

    // Jika bidang dipilih, tampilkan hanya bidang tersebut
    if ($bidang) {

        $labels = [$bidang];

        $data = [
            (clone $baseQuery)->count()
        ];

    } else {

        $labels = $topMinat
            ->pluck('name')
            ->toArray();

        $data = $topMinat
            ->pluck('total')
            ->toArray();
    }

    /*
    |--------------------------------------------------------------------------
    | CHART INDUSTRI
    |--------------------------------------------------------------------------
    */
    $industriChart = Perusahaan::query()

        ->when($filter == 'active', function ($q) {
            $q->where('status_magang', 'Active');
        })

        ->when($filter == 'nonactive', function ($q) {
            $q->where('status_magang', 'Nonactive');
        })

        ->when($bidang, function ($q) use ($bidang) {
            $q->whereHas('minatBidang', function ($sub) use ($bidang) {
                $sub->where('name', $bidang);
            });
        })

        ->select(
            'tipe_industri',
            DB::raw('COUNT(*) as total')
        )

        ->groupBy('tipe_industri')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

    $industriLabels = $industriChart
        ->pluck('tipe_industri')
        ->toArray();

    $industriData = $industriChart
        ->pluck('total')
        ->toArray();

    /*
    |--------------------------------------------------------------------------
    | 5 PERUSAHAAN TERBARU
    |--------------------------------------------------------------------------
    */
    $perusahaan = (clone $baseQuery)
        ->latest()
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'totalPerusahaan',
        'lowonganAktif',
        'lowonganTutup',
        'perusahaan',
        'labels',
        'data',
        'industriLabels',
        'industriData',
        'filter',
        'bidang',
        'industri'
    ));
}
}