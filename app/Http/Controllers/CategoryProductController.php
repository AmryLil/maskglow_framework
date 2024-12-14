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
            'nama_222290'      => 'required|string|max:255',
            'deskripsi_222290' => 'nullable|string',
            'path_img_222290'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fileName = null;
        if ($request->hasFile('path_img_222290')) {
            $image    = $request->file('path_img_222290');
            $fileName = $image->store('images', 'public');
        }

        CategoryProduct::create([
            'nama_222290'      => $request->nama_222290,
            'deskripsi_222290' => $request->deskripsi_222290,
            'path_img_222290'  => $fileName
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
            'nama_222290'      => 'required|string|max:255',
            'deskripsi_222290' => 'nullable|string',
            'path_img_222290'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = CategoryProduct::findOrFail($id);

        if ($request->hasFile('path_img_222290')) {
            if ($category->path_img_222290 && !filter_var($category->path_img_222290, FILTER_VALIDATE_URL)) {
                if (Storage::exists('public/' . $category->path_img_222290)) {
                    Storage::delete('public/' . $category->path_img_222290);
                }
            }

            $path                      = $request->file('path_img_222290')->store('images', 'public');
            $category->path_img_222290 = $path;
        }
        $category->nama_222290      = $request->nama_222290;
        $category->deskripsi_222290 = $request->deskripsi_222290;

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
