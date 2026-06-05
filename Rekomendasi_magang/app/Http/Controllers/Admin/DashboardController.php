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
}