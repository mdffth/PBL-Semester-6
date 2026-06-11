<?php

namespace App\Http\Controllers;

use App\Models\MinatBidang;
use App\Models\RecommendationResult;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\UserInput;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecommendationController extends Controller
{
    public function getdata()
    {
        $technologies = Technology::all();
        $skills = Skill::all();
        $minat_bidang = MinatBidang::all();

        return view(
            'mahasiswa.form_page',
            compact('technologies', 'skills', 'minat_bidang')
        );
    }

    public function process(Request $request)
    {
        $uuid = (string) Str::uuid();

        $user = UserInput::create([
            'session_uuid' => $uuid,
            'ipk' => $request->ipk,
        ]);

        $user->skills()->sync($request->skill_id ?? []);
        $user->technologies()->sync($request->technology_id ?? []);
        $user->minatBidang()->sync($request->minat_id ?? []);

        $pythonPath = base_path('ml/recommendML.py');

        $python = config('ml.python_path') ?: 'python';

        $pythonPath = base_path('ml/recommendML.py');

        $python = config('ml.python_path') ?: 'python';

        $command = '"' . $python . '" "' . $pythonPath . '" '
            . escapeshellarg($user->id);

        $output = [];
        $code = 0;

        exec($command . " 2>&1", $output, $code);

        if ($code !== 0) {

            dd([
                'command' => $command,
                'output' => $output,
                'code' => $code,
            ]);
        }

        session([
            'recommendation_uuid' => $uuid
        ]);

        return redirect()->route('recommendation.result');
    }

    public function result(Request $request)
    {
        $uuid = session('recommendation_uuid');

        if (!$uuid) {
            return redirect()->route('recommendation.index');
        }

        $user = UserInput::with([
            'skills',
            'technologies',
            'minatBidang',
        ])
        ->where('session_uuid', $uuid)
        ->firstOrFail();

        $tipeIndustri = $request->tipe_industri;
        $benefit = $request->benefit;
        $provinsi = $request->provinsi;
        $kota = $request->kota;
        

        $query = RecommendationResult::with('perusahaan')
            ->where('user_input_id', $user->id);

        if ($tipeIndustri) {
            $query->whereHas('perusahaan', function ($q) use ($tipeIndustri) {
                $q->where('tipe_industri', $tipeIndustri);
            });
        }

        if ($benefit) {
    $query->whereHas('perusahaan', function ($q) use ($benefit) {
        $q->where('benefit', $benefit);
    });
}
        
        if ($provinsi) {
            $query->whereHas('perusahaan', function ($q) use ($provinsi) {
                $q->where('provinsi', $provinsi);
            });
        }

        if ($kota) {
            $query->whereHas('perusahaan', function ($q) use ($kota) {
                $q->where('kota', $kota);
            });
        }

            $results = $query
            ->orderBy('ranking')
            ->get();

            $tipeIndustriList = Perusahaan::select('tipe_industri')
                ->whereNotNull('tipe_industri')
                ->distinct()
                ->orderBy('tipe_industri')
                ->pluck('tipe_industri');

            $benefitList = Perusahaan::select('benefit')
                ->whereNotNull('benefit')
                ->distinct()
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

        return view(
            'mahasiswa.result',
            compact('results', 'tipeIndustriList', 'benefitList','provinsiList', 'kotaList')
        );
    }
}