<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Landing Page (halaman utama)
Route::get('/', [MahasiswaController::class, 'landing'])->name('landing');

// Page Rekomendasi + Filter
Route::get('/rekomendasi', [MahasiswaController::class, 'rekomendasi'])->name('rekomendasi');