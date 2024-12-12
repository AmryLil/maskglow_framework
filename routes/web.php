<?php

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
Route::get('/shop', function () {
    return view(view: 'shop');
})->name('shop');

Route::get('/riwayat', function () {
    return view(view: 'riwayat');
})->name('riwayat');

Route::view('/about', 'about_us')->name('about');

// Route kategori produk
Route::get('/kategori', function () {
    return view(view: 'categories');
})->name('categories');
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

Route::get('/dashboard', function () {
    return view(view: 'dashboard.produk.product');
})->name('dashboard.products.filter');

Route::get('/dashboard/produk/create', function () {
    return view(view: 'dashboard.produk.add');
})->name('products.add');

// Route kategori produk di dashboard
Route::get('/dashboard/kategori', function () {
    return view(view: 'dashboard.kategori.index');
})->name('dashboard.kategori.index');

Route::get('/dashboard/kategori/tambah', function () {
    return view(view: 'dashboard.kategori.add');
})->name('dashboard.category_products.create');
