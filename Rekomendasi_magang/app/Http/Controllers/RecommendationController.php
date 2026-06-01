<?php

namespace App\Http\Controllers;

use App\Models\MinatBidang;
use App\Models\RecommendationResult;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\UserInput;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RecommendationController extends Controller
{
    public function getdata()
    {
        $technologies = Technology::all();
        $skills = Skill::all();
        $minat_bidang = MinatBidang::all();

        return view('mahasiswa.form_page', compact('technologies', 'skills', 'minat_bidang'));
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

        // if ($code !== 0) {

        //     $user->delete();

        //     return back()
        //         ->withInput()
        //         ->withErrors([
        //             'ml_error' => 'Terjadi kesalahan saat memproses rekomendasi.'
        //         ]);
        // }

        return redirect()->route(
            'recommendation.result',
            ['uuid' => $uuid]
        );
    }

    public function result(string $uuid)
    {
        $user = UserInput::with([
            'skills',
            'technologies',
            'minatBidang',
        ])->where('session_uuid', $uuid)->firstOrFail();

        $results = RecommendationResult::with('perusahaan')
            ->where('user_input_id', $user->id)
            ->orderBy('ranking')
            ->get();

        if ($results->isEmpty()) {
            return redirect()->route('recommendation.index')
                ->withErrors(['ml_error' => 'Tidak ada hasil rekomendasi. Silahkan coba lagi']);
        }

        return view('mahasiswa.result', compact('user', 'results'));
    }
}
