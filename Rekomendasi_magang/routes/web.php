<?php

use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('admin.login');
});

Route::get('/detail-perusahaan', function () {
    return view('mahasiswa.detail_perusahaan');
});
//form page
// Route::get('/form-page', [RecommendationController::class, 'getdata']);
// Route::post('/form-page', [RecommendationController::class, 'process'])->name('recommendation.process');
Route::controller(RecommendationController::class)->group(function () {
    Route::get('/form-page',                  'getdata')->name('recommendation.index');
    Route::post('/process',          'process')->name('recommendation.process');
    Route::get('/result/{uuid}',     'result')->name('recommendation.result');
});


//Login
Route::post('/login', function (Request $request) {

    $email = $request->email;
    $password = $request->password;

    if ($email == 'admin@gmail.com' && $password == '123456') {
        return redirect('/detail-perusahaan');
    }

    return back()->with('error', 'Email atau Password salah');
})->name('login');