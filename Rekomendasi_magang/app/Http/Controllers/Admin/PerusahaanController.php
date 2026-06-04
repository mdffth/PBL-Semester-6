<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Models\Skill;
use App\Models\Technology;
use App\Models\MinatBidang;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR PERUSAHAAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $perusahaan = Perusahaan::paginate(10);
        return view('admin.daftar_perusahaan', compact('perusahaan'));
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

            'name' => 'required|string|max:255',

            'tipe_industri' => 'required|string|max:255',

            'profile_perusahaan' => 'nullable|string',

            'job_description' => 'nullable|string',

            'status_magang' => 'required|in:Active,Nonactive',

            'duration_months' => 'nullable|integer|min:1|max:12',

            'min_ipk' => 'nullable|numeric|min:0|max:4',

            'kota' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'skill_id' => 'required|array',

            'technology_id' => 'required|array',

            'minat_id' => 'required|array',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {

            $logoPath = $request->file('logo')
                ->store('logo_perusahaan', 'public');
        }

        $perusahaan = Perusahaan::create([

            'name' => $request->name,

            'tipe_industri' => $request->tipe_industri,

            'profile_perusahaan' => $request->profile_perusahaan,

            'posisi_magang' => '-',

            'job_description' => $request->job_description,

            'status_magang' => $request->status_magang,

            'duration_months' => $request->duration_months,

            'min_ipk' => $request->min_ipk,

            'kota' => $request->kota,

            'logo' => $logoPath,
        ]);

        $perusahaan->skills()->sync(
            $request->skill_id ?? []
        );

        $perusahaan->technologies()->sync(
            $request->technology_id ?? []
        );

        $perusahaan->minatBidang()->sync(
            $request->minat_id ?? []
        );

        return redirect()
            ->route('perusahaan.index')
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
            $perusahaan->status_magang === 'Active'
            ? 'Nonactive'
            : 'Active';

        $perusahaan->save();

        return response()->json([
            'success' => true,
            'status' => $perusahaan->status_magang
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $perusahaan = Perusahaan::with([
            'technologies',
            'skills',
            'minatBidang'
        ])->findOrFail($id);

        $technologies = Technology::all();

        $skills = Skill::all();

        $minatBidang = MinatBidang::all();

        $selectedTools = $perusahaan->technologies->map(
            fn($t) => [
                'id' => $t->id,
                'name' => $t->name
            ]
        );

        $selectedSkills = $perusahaan->skills->map(
            fn($s) => [
                'id' => $s->id,
                'name' => $s->name
            ]
        );

        $selectedMinat = $perusahaan->minatBidang->map(
            fn($m) => [
                'id' => $m->id,
                'name' => $m->name
            ]
        );

        return view('Admin.tambah_perusahaan', compact(
            'perusahaan',
            'technologies',
            'skills',
            'minatBidang',
            'selectedTools',
            'selectedSkills',
            'selectedMinat'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tipe_industri' => 'required|string|max:255',

            'benefit' => 'required|in:Paid,Unpaid',

            'profile_perusahaan' => 'nullable|string',

            'job_description' => 'nullable|string',

            'duration_months' => 'nullable|integer|min:1|max:12',

            'min_ipk' => 'nullable|numeric|min:0|max:4',

            'kota' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'skill_id' => 'nullable|array',

            'technology_id' => 'nullable|array',

            'minat_id' => 'nullable|array',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        if ($request->hasFile('logo')) {

            $perusahaan->logo = $request->file('logo')
                ->store('logo_perusahaan', 'public');
        }

        $perusahaan->update([
            'name' => $request->name,

            'tipe_industri' => $request->tipe_industri,

            'profile_perusahaan' => $request->profile_perusahaan,

            'posisi_magang' => '-',

            'benefit' => $request->benefit,

            'min_ipk' => $request->min_ipk,

            'kota' => $request->kota,

            'duration_months' => $request->duration_months
                ?? $perusahaan->duration_months,

            'job_description' => $request->job_description
                ?? $perusahaan->job_description,
        ]);

        $perusahaan->skills()->sync(
            $request->skill_id ?? []
        );

        $perusahaan->technologies()->sync(
            $request->technology_id ?? []
        );

        $perusahaan->minatBidang()->sync(
            $request->minat_id ?? []
        );

        return redirect()
            ->route('perusahaan.index', [
                'page' => $request->page
            ])
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PERUSAHAAN
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $perusahaan = Perusahaan::with([
            'skills',
            'technologies',
            'minatBidang'
        ])->findOrFail($id);

        return view(
            'Admin.detail_perusahaan',
            compact('perusahaan')
        );
    }

public function destroy($id)
{
    $perusahaan = Perusahaan::findOrFail($id);

    $perusahaan->skills()->detach();
    $perusahaan->technologies()->detach();
    $perusahaan->minatBidang()->detach();

    $perusahaan->delete();

    return redirect()
        ->route('perusahaan.index')
        ->with('success', 'Data perusahaan berhasil dihapus');
}    
}