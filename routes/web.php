<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BarangController;


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
