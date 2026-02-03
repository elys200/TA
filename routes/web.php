<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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
use App\Http\Controllers\ApprovalBarangController;
use App\Http\Controllers\ApprovalRuanganController;

// Login & Registrasi//
Route::get('/', function () {
    return view('login');
});

//Register//
Route::post('/register', [RegisterController::class, 'register'])->name('register');


//Dashboard//
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


//Ruangan//
Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan');
Route::get('/ruangan/detail', function () { 
    return view('ruangan.detail');
})->name('ruangan.detail');

//form borang ruangan//
Route::get('/ruangan/detail/form', function () { 
    return view('ruangan.formruangan');
})->name('ruangan.detail.form');

//Barang//
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/detail', function () {
    return view('barang.detail');
})->name('barang.detail');

// Form Pemborangan Barang//
Route::get('/listpeminjamanBarang/form', function () {
    return view('listpeminjaman.barang.form');
})->name('listpeminjamanbarang.form');

//List Peminjaman//
Route::get('/listpeminjamanbarang', [ListPeminjamanBarangController::class, 'index'])->name('listpeminjamanbarang');


//Status Peminjaman//
  //Barang//
  Route::get('/statuspeminjamanbarang', [StatusPeminjamanController::class, 'index'])->name('statuspeminjamanbarang');
  Route::get('/statuspeminjamanbarang/detailbarang', function () {
    return view('statuspeminjaman.statuspeminjamanbarang.detailpeminjamanbarang');
  })->name('statuspeminjaman.detailbarang');

  //Ruangan//
  Route::get('/statuspeminjamanruangan', function () {
    return view('statuspeminjaman.statuspeminjamanruangan.statuspeminjamanruangan');
  })->name('statuspeminjamanruangan');
  Route::get('/statuspeminjamanruangan/detailruangan', function () {
    return view('statuspeminjaman.statuspeminjamanruangan.detailpeminjamanruangan');
  })->name('statuspeminjamanruangan.detailruangan');

//

// Ormawa//
Route::get('/ormawa', [OrmawaController::class, 'index'])->name('ormawa');
Route::get('/ormawa/detail', function () {
    return view('ormawa.detail');
})->name('ormawa.detail');
Route::get('/ormawa/form', function () {
    return view('ormawa.form');
})->name('ormawa.form');
Route::get('/ormawa/detail/detailbarang', function () {
    return view('ormawa.detailbarang');
})->name('ormawa.detailbarang');


//User//
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

//Role//
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('/role/detail', function () {
    return view('role.detail');
})->name('role.detail');

Route::get('/role/edit', function () {
    return view('role.edit');
})->name('role.edit');


//Kunci//
Route::get('/kunci', [KunciController::class, 'index'])->name('kunci');
Route::get('/kunci/detail', function() {
    return view('kunci.detail');
})->name('kunci.detail');

//approval//
 //Barang//
 Route::get('/approvalbarang', [ApprovalBarangController::class, 'index'])->name('approvalbarang');
 Route::get('/approvalbarang/detail', function () {
    return view('approval.detailapprovalbarang');
  })->name('approvalbarang.detail');

 //Ruangan//
 Route::get('/approvalruangan', [ApprovalRuanganController::class, 'index'])->name('approvalruangan');
 Route::get('/approvalruangan/detail', function () {
    return view('approval.detailapprovalruangan');
  })->name('approvalruangan.detail');
//

//Kelola Ruangan//
Route::get('/tambahruangan', [TambahRuanganController::class, 'index'])->name('tambahruangan');
Route::get('/tambahruangan/form', function () {
    return view('tambahruangan.form ');
})->name('tambahruangan.form');












