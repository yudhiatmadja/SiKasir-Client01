<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OwnerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', fn() => 'Admin Dashboard');
    Route::get('/owner', fn() => 'Owner Dashboard');

    Route::get('/transaksi', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

    Route::resource('produk', ProdukController::class);
});


Route::middleware(['auth', 'owner'])->prefix('owner')->group(function () {
    Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::get('/laporan', [OwnerController::class, 'laporan'])->name('owner.laporan');
    Route::get('/grafik', [OwnerController::class, 'grafik'])->name('owner.grafik');
    Route::get('/stok', [OwnerController::class, 'stok'])->name('owner.stok');
    Route::get('/riwayat', [OwnerController::class, 'riwayat'])->name('owner.riwayat');
});


