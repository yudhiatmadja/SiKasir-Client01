<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Authenticated users
Route::middleware('auth')->group(function () {
    // Transaksi & Produk
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}/confirm', [TransaksiController::class, 'show_confirm'])->name('transaksi.confirm');
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::get('/transaksi/{transaksi}/delete', [TransaksiController::class, 'destroy']);
    Route::post('/transaksi/{transaksi}', [TransaksiController::class, 'update']);
    Route::get('/transaksi/search', [TransaksiController::class, 'search_transaksi']);
    Route::get('/produk/search', [TransaksiController::class, 'search_produk']);

    Route::resource('produk', ProdukController::class);
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{admin}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');

});


// Owner routes
Route::middleware(['auth', 'owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [OwnerController::class, 'laporan'])->name('laporan');
    Route::get('/grafik', [OwnerController::class, 'grafik'])->name('grafik');
    Route::get('/stok', [OwnerController::class, 'stok'])->name('stok');
    Route::get('/riwayat', [OwnerController::class, 'riwayat'])->name('riwayat');
    Route::get('/riwayat/filter', [OwnerController::class, 'riwayat_filter']);
    Route::get('/riwayat/export', [TransaksiController::class, 'export_excel']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
