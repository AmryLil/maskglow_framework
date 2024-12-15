<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;  // Mengimpor model CategoryProduct
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryProductController extends Controller
{
    public function index()
    {
        $categories = CategoryProduct::all();
        return view('categories', compact('categories'));
    }

    public function kategori_dashboard()
    {
        $categories = CategoryProduct::all();
        return view('dashboard.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.kategori.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'path_img'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fileName = null;
        if ($request->hasFile('path_img')) {
            $image    = $request->file('path_img');
            $fileName = $image->store('images', 'public');
        }

        CategoryProduct::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'path_img'  => $fileName
        ]);

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori berhasil disimpan!');
    }

    public function show($id)
    {
        $category = CategoryProduct::with('products')->findOrFail($id);
        return view('productbycategory', compact('category'));
    }

    public function edit($id)
    {
        $category = CategoryProduct::findOrFail($id);
        return view('dashboard.kategori.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'path_img'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = CategoryProduct::findOrFail($id);

        if ($request->hasFile('path_img')) {
            if ($category->path_img && !filter_var($category->path_img, FILTER_VALIDATE_URL)) {
                if (Storage::exists('public/' . $category->path_img)) {
                    Storage::delete('public/' . $category->path_img);
                }
            }

            $path               = $request->file('path_img')->store('images', 'public');
            $category->path_img = $path;
        }
        $category->nama      = $request->nama;
        $category->deskripsi = $request->deskripsi;

        $category->save();

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.kategori.index')->with('success', 'Category product deleted successfully.');
    }
}
