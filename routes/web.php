<?php

use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama

Route::get('/', function () {
    return view(view: 'index');
})->name('index');

// Route untuk login

Route::get('/login', function () {
    return view('login');
})->name('login.form');
Route::get('/signup', function () {
    return view(view: 'signup');
})->name('signup');

// Route untuk signup

// Route untuk shop
// Route::get('/shop', function () {
//     return view(view: 'shop');
// })->name('shop');

Route::get('/shop', [ProductController::class, 'index'])->name('products.index');

Route::get('/riwayat', function () {
    return view(view: 'riwayat');
})->name('riwayat');

Route::view('/about', 'about_us')->name('about');

// Route kategori produk
// Route::get('/kategori', function () {
//     return view(view: 'categories');
// })->name('categories');
Route::get('/kategori', [CategoryProductController::class, 'index'])->name('categories');
Route::get('/kategori/{id}', function () {
    return view(view: 'productbycategory');
})->name('categories.show');

Route::get('/product/{id}', function () {
    return view(view: 'product');
})->name('product.show');

// Route untuk cart
Route::get('/cart', function () {
    return view('cart');
});

// Route untuk transaksi
Route::get('/dashboard/transaksi', function () {
    return view(view: 'dashboard.transaksi.index');
})->name('transaksi.showAll');

Route::get('/dashboard/transaksi/laporan', function () {
    return view(view: 'dashboard.transaksi.laporan');
})->name('transaksi.showAllLaporan');

// Route untuk logout
Route::post('/logout', function () {
    return redirect('/')->with('status', 'Anda berhasil logout');
})->name('logout');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [ProductController::class, 'showProduct'])->name('dashboard.products');
    Route::get('/produk/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produk', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/kategori', [CategoryProductController::class, 'kategori_dashboard'])->name('dashboard.kategori.index');
    Route::get('/categories', [CategoryProductController::class, 'index'])->name('dashboard.category_products.index');
    Route::get('/categories/tambah', [CategoryProductController::class, 'create'])->name('dashboard.category_products.create');
    Route::post('/categories', [CategoryProductController::class, 'store'])->name('dashboard.category_products.store');
    Route::get('/categories/{id}/edit', [CategoryProductController::class, 'edit'])->name('dashboard.category_products.edit');
    Route::put('/categories/{id}', [CategoryProductController::class, 'update'])->name('dashboard.category_products.update');
    Route::delete('/categories/{id}', [CategoryProductController::class, 'destroy'])->name('dashboard.category_products.destroy');
});
