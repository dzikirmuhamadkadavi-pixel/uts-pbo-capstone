<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('barang.index');
});

// URI statis didefinisikan sebelum URI dinamis {kode}
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

// URI dinamis dengan parameter {kode}
Route::get('/barang/{kode}', [BarangController::class, 'show'])->name('barang.show');
Route::get('/barang/{kode}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{kode}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{kode}', [BarangController::class, 'destroy'])->name('barang.destroy');
