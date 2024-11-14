<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('data')->group( function() {
    Route::get('/barang', [BarangController::class, 'listBarang'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'tambahBarang'])->name('barang.tambah');
    Route::post('/barang', [BarangController::class, 'simpanBarang'])->name('barang.simpan');    
    Route::get('/barang/{idbarang}/detail', [BarangController::class, 'detailBarang'])->name('barang.detail');
    Route::get('/barang/{idbarang}/edit', [BarangController::class, 'editBarang'])->name('barang.edit');
    Route::put('barang/{idbarang}', [BarangController::class, 'updateBarang'])->name('barang.update');
    Route::delete('/barang/{idbarang}', [BarangController::class, 'hapusBarang'])->name('barang.hapus');
});