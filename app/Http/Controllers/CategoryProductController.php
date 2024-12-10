<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        return view('categories');  // Menampilkan view tanpa data dari database
    }

    // Tampilkan kategori pada dashboard
    public function kategori_dashboard()
    {
        return view('dashboard.kategori.index');  // Menampilkan view tanpa data dari database
    }

    // Tampilkan form untuk menambah kategori
    public function create()
    {
        return view('dashboard.kategori.add');  // Menampilkan view untuk tambah kategori
    }

    // Tampilkan kategori tertentu berdasarkan ID
    public function show($id)
    {
        return view('productbycategory');  // Menampilkan view produk berdasarkan kategori
    }

    // Tampilkan form untuk mengedit kategori tertentu
    public function edit($id)
    {
        return view('dashboard.kategori.update');  // Menampilkan view untuk edit kategori
    }

    // Generate PDF kategori produk
    public function generatePdf(Request $request)
    {
        return view('dashboard.kategori.pdf');  // Menampilkan view untuk PDF kategori
    }
}
