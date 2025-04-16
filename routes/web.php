<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangInController;
use App\Http\Controllers\BarangOutController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-db', function () {
    $master = DB::connection('mysql')->select('SELECT DATABASE() as db');
    $second = DB::connection('second_mysql')->select('SELECT DATABASE() as db');
    $third = DB::connection('third_mysql')->select('SELECT DATABASE() as db');

    return response()->json([
        'master' => $master[0]->db,
        'second' => $second[0]->db,
        'third' => $third[0]->db,
    ]);
});

// Resource routes untuk Barang, Barang Masuk, Barang Keluar
Route::resource('barang', BarangController::class);
Route::resource('barang-in', BarangInController::class);
Route::resource('barang-out', BarangOutController::class);

// Route untuk Stock (hanya index)
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
