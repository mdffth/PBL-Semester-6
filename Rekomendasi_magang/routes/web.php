<?php

use Illuminate\Support\Facades\Route;

use App\Models\Perusahaan;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\Admin\DashboardController;

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

    Route::get('/result/{uuid}', 'result')
        ->name('recommendation.result');

});


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

        Route::get('/', [DashboardController::class, 'index'])
            ->name('index');

        /*
        |--------------------------------------------------------------------------
        | CRUD PERUSAHAAN
        |--------------------------------------------------------------------------
        */

        Route::get('/create', [DashboardController::class, 'create'])
            ->name('create');

        Route::post('/store', [DashboardController::class, 'store'])
            ->name('store');

        Route::get('/{id}/edit', [DashboardController::class, 'edit'])
            ->name('edit');

        Route::put('/{id}/update', [DashboardController::class, 'update'])
            ->name('update');

        Route::delete('/{id}/delete', [DashboardController::class, 'destroy'])
            ->name('destroy');

        Route::get('/{id}/detail', [DashboardController::class, 'show'])
            ->name('show');

        /*
        |--------------------------------------------------------------------------
        | TOGGLE STATUS
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