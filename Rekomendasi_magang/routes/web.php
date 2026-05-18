<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->group(function () {

    // ================= DASHBOARD =================
    Route::prefix('dashboard')->name('dashboard.')// ->middleware('authorize:ADM') 
            ->group(function () {

        // halaman dashboard
        Route::get('/',[DashboardController::class, 'index'])->name('index');

        // tambah perusahaan
        Route::get('/create',[DashboardController::class, 'create'])->name('create');

        // simpan perusahaan
        Route::post('/store',[DashboardController::class, 'store'])->name('store');

        // edit perusahaan
        Route::get('/{id}/edit',[DashboardController::class, 'edit'])->name('edit');

        // update perusahaan
        Route::put('/{id}/update',[DashboardController::class, 'update'])->name('update');

        // hapus perusahaan
        Route::delete('/{id}/delete',[DashboardController::class, 'destroy'])->name('destroy');

        // detail perusahaan
        Route::get('/{id}/detail',[DashboardController::class, 'show'])->name('show');

        // toggle status paid/unpaid
        Route::patch('/toggle_status/{id}', [DashboardController::class, 'toggleStatus']
            )->name('toggle_status');

    });

});
