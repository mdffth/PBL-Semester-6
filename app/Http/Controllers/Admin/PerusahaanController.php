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
    public function index(Request $request)
    {
        $perusahaan = Perusahaan::latest()->paginate(10);

        $totalPerusahaan = Perusahaan::count();

        $lowonganAktif = Perusahaan::where(
            'status_magang',
            'Active'
        )->count();

        $lowonganTutup = Perusahaan::where(
            'status_magang',
            'Nonactive'
        )->count();

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

        return view('Admin.daftar_perusahaan', compact(
            'perusahaan',
            'totalPerusahaan',
            'lowonganAktif',
            'lowonganTutup'
        ));
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

        return view('Admin.tambah_perusahaan', compact(
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

            'benefit' => 'required|in:Paid, Unpaid',

            'duration_months' => 'nullable|integer|min:1|max:12',

            'min_ipk' => 'nullable|numeric|min:0|max:4',

            'kota' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'skill_id' => 'required|array',

            'technology_id' => 'required|array',

            'provinsi' => 'nullable|string|max:255',

            'alamat' => 'nullable|string|max:255',

            'minat_id' => 'required|array',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/perusahaan'), $fileName);

            $logoPath = 'img/perusahaan/' . $fileName;
        }

        $perusahaan = Perusahaan::create([

            'name' => $request->name,

            'tipe_industri' => $request->tipe_industri,

            'profile_perusahaan' => $request->profile_perusahaan,

            'posisi_magang' => '-',

            'job_description' => $request->job_description,

            'benefit' => $request->benefit,

            'duration_months' => $request->duration_months,

            'min_ipk' => $request->min_ipk,

            'kota' => $request->kota,

            'provinsi' => $request->provinsi,

            'alamat' => $request->alamat,

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

            'provinsi' => 'nullable|string|max:255',

            'alamat' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'skill_id' => 'nullable|array',

            'technology_id' => 'nullable|array',

            'minat_id' => 'nullable|array',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        $logoPath = $perusahaan->logo;

        if ($request->hasFile('logo')) {
            // 2. HAPUS LOGO LAMA DARI FOLDER (Jika file lamanya ada)
            if ($perusahaan->logo && file_exists(public_path($perusahaan->logo))) {
                unlink(public_path($perusahaan->logo));
            }

            // 3. PROSES UPLOAD LOGO BARU
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/perusahaan'), $fileName);

            // Set path baru untuk disimpan ke database
            $logoPath = 'img/perusahaan/' . $fileName;
        }

        $perusahaan->update([
            'name' => $request->name,

            'tipe_industri' => $request->tipe_industri,

            'profile_perusahaan' => $request->profile_perusahaan,

            'posisi_magang' => '-',

            'benefit' => $request->benefit,

            'min_ipk' => $request->min_ipk,

            'kota' => $request->kota,

            'duration_months' => $request->duration_months ?? $perusahaan->duration_months,

            'job_description' => $request->job_description ?? $perusahaan->job_description,

            'provinsi' => $request->provinsi,

            'alamat' => $request->alamat,

            'logo' => $logoPath,
        ]);

        $perusahaan->skills()->sync($request->skill_id ?? []);
        $perusahaan->technologies()->sync($request->technology_id ?? []);
        $perusahaan->minatBidang()->sync($request->minat_id ?? []);

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
