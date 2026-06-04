<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Perusahaan;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PerusahaanController;


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

/*
|--------------------------------------------------------------------------
| AUTH / LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'loginForm'])
    ->name('login.form');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/landing', [MahasiswaController::class, 'landing'])
    ->name('landing');

Route::get('/rekomendasi', [MahasiswaController::class, 'rekomendasi'])
    ->name('rekomendasi');


/*
|--------------------------------------------------------------------------
| RECOMMENDATION
|--------------------------------------------------------------------------
*/

Route::controller(RecommendationController::class)->group(function () {

    Route::get('/form-page', 'getdata')
        ->name('recommendation.index');

    Route::post('/process', 'process')
        ->name('recommendation.process');

    Route::get('/hasil-rekomendasi', 'result')
        ->name('recommendation.result');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::prefix('dashboard')
        ->name('dashboard.')
        ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('index');

    });

    /*
    |--------------------------------------------------------------------------
    | PERUSAHAAN
    |--------------------------------------------------------------------------
    */

    Route::prefix('perusahaan')
        ->name('perusahaan.')
        ->group(function () {

        // daftar perusahaan
        Route::get('/', [PerusahaanController::class, 'index'])
            ->name('index');

        // tambah perusahaan
        Route::get('/create', [PerusahaanController::class, 'create'])
            ->name('create');

        Route::post('/store', [PerusahaanController::class, 'store'])
            ->name('store');

        // edit perusahaan
        Route::get('/{id}/edit', [PerusahaanController::class, 'edit'])
            ->name('edit');

        Route::put('/{id}/update', [PerusahaanController::class, 'update'])
            ->name('update');

        // detail perusahaan
        Route::get('/{id}/detail', [PerusahaanController::class, 'show'])
            ->name('show');

        // hapus perusahaan
        Route::delete('/{id}/delete', [PerusahaanController::class, 'destroy'])
            ->name('destroy');

        // toggle status
        Route::post(
            '/toggle_status/{id}',
            [PerusahaanController::class, 'toggleStatus']
        )->name('toggleStatus');

    });

});


/*
|--------------------------------------------------------------------------
| HALAMAN MAHASISWA
|--------------------------------------------------------------------------
*/

Route::get('/detail-perusahaan/{id}', function ($id) {

    $perusahaan = Perusahaan::findOrFail($id);

    return view(
        'mahasiswa.detail_perusahaan',
        compact('perusahaan')
    );

})->name('detail.perusahaan');


/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::controller(MahasiswaController::class)->group(function () {

    Route::get('/mahasiswa-form', 'formPage');

});
