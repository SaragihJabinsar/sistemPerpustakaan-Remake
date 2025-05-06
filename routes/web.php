<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', function () {
    if (!session()->has('username')) return redirect()->route('login');
    return view('index');
})->name('beranda');

// Login & Register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route tetap didefinisikan (biar tidak error)
Route::resource('anggota', AnggotaController::class);
Route::get('/anggota/download', [AnggotaController::class, 'download'])->name('anggota.download');

Route::resource('buku', BukuController::class);
Route::get('/buku/download', [BukuController::class, 'download'])->name('buku.download');

Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/download', [TransaksiController::class, 'download'])->name('transaksi.download');
