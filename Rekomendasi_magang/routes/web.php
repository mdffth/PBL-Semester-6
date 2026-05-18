<?php

use Illuminate\Support\Facades\Route;

use App\Models\Perusahaan;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
| InternPath - Sistem Rekomendasi Magang
|--------------------------------------------------------------------------
*/


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
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

    Route::prefix('dashboard')
        ->name('dashboard.')
        ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        // halaman dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('index');

        /*
        |--------------------------------------------------------------------------
        | CRUD PERUSAHAAN
        |--------------------------------------------------------------------------
        */

        // form tambah perusahaan
        Route::get('/create', [DashboardController::class, 'create'])
            ->name('create');

        // simpan perusahaan
        Route::post('/store', [DashboardController::class, 'store'])
            ->name('store');

        // form edit perusahaan
        Route::get('/{id}/edit', [DashboardController::class, 'edit'])
            ->name('edit');

        // update perusahaan
        Route::put('/{id}/update', [DashboardController::class, 'update'])
            ->name('update');

        // hapus perusahaan
        Route::delete('/{id}/delete', [DashboardController::class, 'destroy'])
            ->name('destroy');

        // detail perusahaan
        Route::get('/{id}/detail', [DashboardController::class, 'show'])
            ->name('show');

        /*
        |--------------------------------------------------------------------------
        | TOGGLE STATUS MAGANG
        |--------------------------------------------------------------------------
        */

        Route::patch('/toggle_status/{id}',
            [DashboardController::class, 'toggleStatus'])
            ->name('toggle_status');

    });

});


/*
|--------------------------------------------------------------------------
| HALAMAN MAHASISWA
|--------------------------------------------------------------------------
*/

# form rekomendasi magang
Route::get('/form-page', function () {

    return view('mahasiswa.form_page');

})->name('form.page');


# detail perusahaan
Route::get('/detail-perusahaan/{id}', function ($id) {

    /*
    |--------------------------------------------------------------------------
    | AMBIL DATA PERUSAHAAN
    |--------------------------------------------------------------------------
    */

    $perusahaan = Perusahaan::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | KIRIM KE VIEW
    |--------------------------------------------------------------------------
    */

    return view(
        'mahasiswa.detail_perusahaan',
        compact('perusahaan')
    );

})->name('detail.perusahaan');


/*
|--------------------------------------------------------------------------
| CONTROLLER MAHASISWA
|--------------------------------------------------------------------------
*/

Route::controller(MahasiswaController::class)->group(function () {

    Route::get('/mahasiswa-form', 'formPage');

});