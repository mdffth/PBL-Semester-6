<?php

namespace App\Http\Controllers;

use App\Models\MinatBidang;
use App\Models\Skill;
use App\Models\Technology;
use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function getdata()
    {
        $technologies = Technology::all();
        $skills = Skill::all();
        $minat_bidang = MinatBidang::all();

        return view('mahasiswa.form_page', compact('technologies', 'skills', 'minat_bidang'));
    }
}
