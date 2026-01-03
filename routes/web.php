<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KunciController;
use App\Http\Controllers\ListPeminjamanController;
>>>>>>> 9bd6a6c253dc217b84215e0d8e93944a19820e40


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

Route::get('/barang/detail/form', function () {
    return view('barang.formbarang');
})->name('barang.detail.form');

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan');
Route::get('/ruangan/detail', function () {
    return view('ruangan.detail');
})->name('ruangan.detail');

Route::get('/kunci', [KunciController::class, 'index'])->name('kunci');

=======
Route::get('/ruangan/detail/form', function () {
    return view('ruangan.formruangan');
})->name('ruangan.detail.form');

Route::get('/listpeminjaman', [ListPeminjamanController::class, 'index'])->name('listpeminjaman');
Route::get('/listpeminjaman/detail', function () {
    return view('listpeminjaman.detail');
})->name('listpeminjaman.detail');
