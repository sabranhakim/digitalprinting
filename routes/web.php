<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pastikan hanya admin yang bisa akses, jika perlu tambahkan middleware:
Route::middleware(['auth'])->group(function () {

    // Index: Tampilkan daftar produk
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    // Create: Form tambah product
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    // Store: Simpan data product baru
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');

    // Edit: Form edit product
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

    // Update: Simpan hasil edit
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

    // Delete: Hapus product
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', function () {
        return view('checkout.success');
    })->name('checkout.success');
});




require __DIR__.'/auth.php';
