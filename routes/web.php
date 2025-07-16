<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::get('/notifikasi', [App\Http\Controllers\NotifikasiController::class, 'index'])->name('notifikasi.index');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
