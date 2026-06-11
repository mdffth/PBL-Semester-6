<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function loginForm()
    {
        return view('Admin.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {

        Log::info(
            'LOGIN_SUCCESS ip=' . $request->ip() .
            ' email=' . $request->email
        );

        $request->session()->regenerate();

        return redirect()->route('dashboard.index');
    }

    Log::warning(
        'LOGIN_FAILED ip=' . $request->ip() .
        ' email=' . $request->email
    );

    return back()->with('error', 'Email atau password salah');
}

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}