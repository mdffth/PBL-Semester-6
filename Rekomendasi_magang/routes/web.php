<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('admin.login');
});

Route::post('/login', function (Request $request) {
    // ambil input
    $email = $request->email;
    $password = $request->password;

    // sementara (dummy login)
    if ($email == 'admin@gmail.com' && $password == '123456') {
        return "Login berhasil";
    }

    return back()->with('error', 'Email atau password salah');
})->name('login');