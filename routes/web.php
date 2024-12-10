<?php

use App\Http\Controllers\{
    CartController,
    CategoryProductController,
    LoginController,
    PaymentController,
    ProductController,
    ProductDetailsController,
    SignupController,
    TransaksiController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', [ProductController::class, 'Best4Product']);

// Route untuk login
Route::get('/login', [LoginController::class,  'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route untuk signup
Route::get('/signup', [SignupController::class,  'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

// Route untuk shop
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::view('/about', 'about_us')->name('about');

// Route kategori produk
Route::get('/kategori', [CategoryProductController::class,      'index'])->name('categories');
Route::get('/kategori/{id}', [CategoryProductController::class, 'show'])->name('categories.show');
Route::get('/product/{id}', [ProductDetailsController::class,   'showProductDetails'])->name('product.show');

// Route untuk cek login status
Route::get('/check-login', function () {
    return response()->json(['is_logged_in' => Auth::check()]);
})->name('check.login');

// Route untuk cart
Route::get('/cart', function () {
    return view('cart');
});
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/view', [CartController::class,             'showCart'])->name('cart.view');
Route::delete('/cart/{productId}', [CartController::class,   'removeFromCart'])->name('cart.remove');

// Route untuk transaksi
Route::get('/transaksion', [TransaksiController::class,                     'index'])->name('transaksi.index');
Route::get('/dashboard/transaksion/{filter?}', [TransaksiController::class, 'showAll'])->name('transaksi.showAll');
Route::get('/dashboard/tranaksi/laporan', [TransaksiController::class,      'showAllLaporan'])
    ->name('transaksi.showAllLaporan');
Route::get('/dashboard/transaksion/export-pdf/{filter?}', [TransaksiController::class, 'generatePdf'])->name('transaksi.exportPdf');

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('status', 'Anda berhasil logout');
})->name('logout');

// Route pembayaran
Route::get('/transaksi', [PaymentController::class,                    'index']);
Route::get('/transaksi/{id}', [PaymentController::class,               'show']);
Route::post('/transaksi', [PaymentController::class,                   'store']);
Route::post('/submit-payment-proof', [PaymentController::class,        'store']);
Route::post('/checkout/single/{productId}', [PaymentController::class, 'checkoutSingleProduct'])->name('checkout.single');

// Route dashboard (tanpa middleware)
Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
});

// Route produk
Route::get('/dashboard/products/filter', [ProductController::class,      'filter'])->name('dashboard.products.filter');
Route::get('dashboard/products/pdf/{filter}', [ProductController::class, 'generatePdf'])->name('dashboard.products.generatePdf');
Route::get('/dashboard/produk/create', [ProductController::class,        'create'])->name('products.add');
Route::post('/dashboard/produk', [ProductController::class,              'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class,                  'show'])->name('products.show');
Route::get('/dashboard/produk/{id}/edit', [ProductController::class,     'edit'])->name('products.edit');
Route::put('/dashboard/produk/{id}', [ProductController::class,          'update'])->name('products.update');
Route::delete('/dashboard/produk/{id}', [ProductController::class,       'destroy'])->name('products.destroy');

// Route transaksi
Route::put('/transaksi/{id}', [PaymentController::class,    'update']);
Route::delete('/transaksi/{id}', [PaymentController::class, 'destroy'])->name('transaksi.destroy');

// Route kategori produk di dashboard
Route::get('/dashboard/kategori', [CategoryProductController::class,                     'kategori_dashboard'])->name('dashboard.kategori.index');
Route::get('/dashboard/categories', [CategoryProductController::class,                   'index'])->name('dashboard.category_products.index');
Route::get('/dashboard/categories/tambah', [CategoryProductController::class,            'create'])->name('dashboard.category_products.create');
Route::post('/dashboard/categories', [CategoryProductController::class,                  'store'])->name('dashboard.category_products.store');
Route::get('/dashboard/categories/{id}/edit', [CategoryProductController::class,         'edit'])->name('dashboard.category_products.edit');
Route::put('/dashboard/categories/{id}', [CategoryProductController::class,              'update'])->name('dashboard.category_products.update');
Route::delete('/dashboard/categories/{id}', [CategoryProductController::class,           'destroy'])->name('dashboard.category_products.destroy');
Route::get('/dashboard/kategori/produk/generate-pdf', [CategoryProductController::class, 'generatePdf'])->name('kategori.generatePdf');
