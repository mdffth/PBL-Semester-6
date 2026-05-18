<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Perusahaan;
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

Route::get('/', function () {

    return view('admin.login');

});


Route::post('/login', function (Request $request) {

    $email = $request->email;
    $password = $request->password;

    // dummy login sementara
    if ($email == 'admin@gmail.com' && $password == '123456') {

        return redirect('/detail-perusahaan/1');

    }

    return back()->with('error', 'Email atau Password salah');

})->name('login');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::prefix('dashboard')
        ->name('dashboard.')
        ->group(function () {

        // halaman dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('index');

        // tambah perusahaan
        Route::get('/create', [DashboardController::class, 'create'])
            ->name('create');

        // simpan perusahaan
        Route::post('/store', [DashboardController::class, 'store'])
            ->name('store');

        // edit perusahaan
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

        // toggle status
        Route::patch('/toggle_status/{id}', [DashboardController::class, 'toggleStatus'])
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

    // ambil data perusahaan berdasarkan id
    $perusahaan = Perusahaan::findOrFail($id);

    // kirim data ke blade
    return view('mahasiswa.detail_perusahaan', compact('perusahaan'));

})->name('detail.perusahaan');


/*
|--------------------------------------------------------------------------
| CONTROLLER MAHASISWA
|--------------------------------------------------------------------------
*/

Route::controller(MahasiswaController::class)->group(function () {

    Route::get('/mahasiswa-form', 'formPage');

});