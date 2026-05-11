<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
        return redirect('/detail-perusahaan');
    }

    return back()->with('error', 'Email atau Password salah');
})->name('login');