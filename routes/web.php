<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HaloController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::view('/coba', 'coba');
Route::get('/halo', [HaloController::class, 'index']);
Route::get('/halo/{nama}', [HaloController::class, 'sapa']);

Route::redirect('/', '/alat');
Route::redirect('/dashboard', '/alat')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('alat', AlatController::class);
    Route::resource('peminjaman', PeminjamanController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::resource('buku', BukuController::class);
});

require __DIR__ . '/auth.php';