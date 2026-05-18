<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;

class MahasiswaController extends Controller
{
    public function detail_perusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        return view('mahasiswa.detail_perusahaan', compact('perusahaan'));
    }
}