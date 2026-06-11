<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Landing Page
    public function landing()
    {
        $perusahaanList = Perusahaan::limit(6)->get();
        $totalPerusahaan = Perusahaan::count();
        $ulasan = Ulasan::where('is_active', true)
            ->latest()
            ->get();

        return view('welcome', compact('perusahaanList', 'totalPerusahaan', 'ulasan'));
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
            $query->where('benefit', $request->benefit);
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

    //ulasan landing page

    /**
     * Menyimpan testimoni baru ke database.
     */
public function store(Request $request)
{
    $exists = Ulasan::where('name', $request->name)
        ->where('position', $request->position)
        ->exists();

    if ($exists) {
        return response()->json([
            'success' => false,
            'message' => 'Anda sudah pernah mengirim ulasan dengan nama dan jabatan tersebut.'
        ], 422);
    }

    $ulasan = Ulasan::create([
        'name'      => $request->name,
        'position'  => $request->position,
        'rating'    => $request->rating,
        'review'    => $request->review,
        'is_active' => true,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Terima kasih atas ulasan Anda. Masukan yang diberikan akan membantu mahasiswa menemukan tempat magang yang lebih sesuai.',
        'data' => $ulasan
    ]);
}
    /**
     * Menampilkan detail satu testimoni tertentu.
     */
    public function show($id)
    {
        $ulasan = Ulasan::find($id);

        if (!$ulasan) {
            return response()->json([
                'success' => false,
                'message' => 'Testimoni tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail testimoni ditemukan.',
            'data'    => $ulasan
        ], 200);
    }

    /**
     * Memperbarui data testimoni atau mengubah status aktif/non-aktif.
     */
    public function update(Request $request, $id)
    {
        $ulasan = Ulasan::find($id);

        if (!$ulasan) {
            return response()->json([
                'success' => false,
                'message' => 'Testimoni tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'name'      => 'sometimes|required|string|max:255',
            'position'  => 'sometimes|required|string|max:255',
            'rating'    => 'sometimes|required|integer|min:1|max:5',
            'review'    => 'sometimes|required|string',
            'is_active' => 'sometimes|required|boolean',
        ]);

        $ulasan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Testimoni berhasil diperbarui.',
            'data'    => $ulasan
        ], 200);
    }

    /**
     * Menghapus testimoni dari database.
     */
    public function destroy($id)
    {
        $ulasan = Ulasan::find($id);

        if (!$ulasan) {
            return response()->json([
                'success' => false,
                'message' => 'Testimoni tidak ditemukan.'
            ], 404);
        }

        $ulasan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Testimoni berhasil dihapus.'
        ], 200);
    }
}