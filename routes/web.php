<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KunciController;


Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/ormawa', [OrmawaController::class, 'index'])->name('ormawa');
Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/ormawa/detail', function () {
    return view('ormawa.detail');
})->name('ormawa.detail');

Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('/barang', [BarangController::class, 'index'])->name('barang');

Route::get('/barang/detail', function () {
    return view('barang.detail');
})->name('barang.detail');

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan');
Route::get('/ruangan/detail', function () {
    return view('ruangan.detail');
})->name('ruangan.detail');

Route::get('/kunci', [KunciController::class, 'index'])->name('kunci');

