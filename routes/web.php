<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KunciController;
use App\Http\Controllers\ListPeminjamanBarangController;
use App\Http\Controllers\ListPeminjamanRuanganController;
use App\Http\Controllers\StatusPeminjamanController;
use App\Http\Controllers\TambahRuanganController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/ormawa', [OrmawaController::class, 'index'])->name('ormawa');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/detail', function () {
    return view('user.detail');
})->name('user.detail');
Route::get('/user/edit', function () {
    return view('user.edit');
})->name('user.edit');

Route::get('/ormawa/detail', function () {
    return view('ormawa.detail');
})->name('ormawa.detail');

Route::get('/ormawa/form', function () {
    return view('ormawa.form');
})->name('ormawa.form');
Route::get('/ormawa/detail/detailbarang', function () {
    return view('ormawa.detailbarang');
})->name('ormawa.detailbarang');

Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('/role/detail', function () {
    return view('role.detail');
})->name('role.detail');

Route::get('/role/edit', function () {
    return view('role.edit');
})->name('role.edit');


Route::get('/barang', [BarangController::class, 'index'])->name('barang');

Route::get('/barang/detail', function () {
    return view('barang.detail');
})->name('barang.detail');

Route::get('/barang/detail/form', function () {
    return view('barang.formbarang');
})->name('barang.detail.form');

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan');
Route::get('/ruangan/detail', function () {
    return view('ruangan.detail');
})->name('ruangan.detail');

Route::get('/kunci', [KunciController::class, 'index'])->name('kunci');
Route::get('/kunci/detail', function() {
    return view('kunci.detail');
})->name('kunci.detail');

Route::get('/ruangan/detail/form', function () {
    return view('ruangan.formruangan');
})->name('ruangan.detail.form');

Route::get('/listpeminjamanBarang', [ListPeminjamanBarangController::class, 'index'])->name('listpeminjamanbarang');
Route::get('/listpeminjamanBarang/detail', function () {
    return view('listpeminjaman.barang.detail');
})->name('listpeminjamanbarang.detail');

Route::get('/listpeminjamanRuangan', [ListPeminjamanRuanganController::class, 'index'])->name('listpeminjamanruangan');
Route::get('/listpeminjamanRuangan/detail', function () {
    return view('listpeminjaman.ruangan.detail');
})->name('listpeminjamanruangan.detail');

Route::get('/statuspeminjaman', [StatusPeminjamanController::class, 'index'])->name('statuspeminjaman');
Route::get('/tambahruangan', [TambahRuanganController::class, 'index'])->name('tambahruangan');
Route::get('/tambahruangan/form', function () {
    return view('tambahruangan.form ');
})->name('tambahruangan.form');

Route::get('/listpeminjamanBarang/form', function () {
    return view('listpeminjaman.barang.form');
})->name('listpeminjamanbarang.form');