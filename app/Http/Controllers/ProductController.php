<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        return view('shop');
    }

    // Menampilkan produk terbaik
    public function Best4Product()
    {
        return view('index');
    }

    // Menampilkan halaman produk di dashboard
    public function showProduct()
    {
        return view('dashboard.produk.product', [
            'title' => 'Daftar Produk',
        ]);
    }

    // Menampilkan form untuk menambahkan produk
    public function create()
    {
        return view('dashboard.produk.add');
    }

    // Menampilkan detail produk
    public function show($id)
    {
        return view('products.show');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        return view('dashboard.produk.update');
    }

    // Menampilkan halaman produk berdasarkan filter
    public function filter(Request $request)
    {
        return view('dashboard.produk.product', [
            'title' => 'Dashboard Produk',
        ]);
    }

    // Menampilkan halaman untuk generate PDF
    public function generatePdf($filter)
    {
        return view('dashboard.produk.pdf');
    }
}
