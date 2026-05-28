<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;

// ================= ROUTE UMUM / MAHASISWA =================
Route::get('/', function () {
    return view('admin.login');
});

Route::get('/detail-perusahaan', function () {
    return view('mahasiswa.detail_perusahaan');
});

Route::get('/form-page', function () {
    return view('mahasiswa.form_page');
});

Route::post('/login', function (Request $request) {
    $email = $request->email;
    $password = $request->password;

    if ($email == 'admin@gmail.com' && $password == '123456') {
        // TIPS: Jika login admin sukses, diarahkan ke dashboard admin
        return redirect()->route('dashboard.index');
    }

    return back()->with('error', 'Email atau Password salah');
})->name('login');

// ================= ROUTE ADMIN DASHBOARD =================
Route::prefix('admin')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // halaman dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        // tambah perusahaan
        Route::get('/create', [DashboardController::class, 'create'])->name('create');
        // simpan perusahaan
        Route::post('/store', [DashboardController::class, 'store'])->name('store');
        // edit perusahaan
        Route::get('/{id}/edit', [DashboardController::class, 'edit'])->name('edit');
        // update perusahaan
        Route::put('/{id}/update', [DashboardController::class, 'update'])->name('update');
        // hapus perusahaan
        Route::delete('/{id}/delete', [DashboardController::class, 'destroy'])->name('destroy');
        // detail perusahaan
        Route::get('/{id}/detail', [DashboardController::class, 'show'])->name('show');
        //Toggle status
        Route::post('/toggle_status/{id}', [DashboardController::class, 'toggleStatus'])->name('toggle_status');
    });

});