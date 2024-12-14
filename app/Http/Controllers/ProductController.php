<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showProduct()
    {
        $products = Product::with('category')->get();

        return view('dashboard.produk.product', [
            'title'    => 'Daftar Produk',
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = CategoryProduct::all();  // Ambil semua kategori untuk pilihan
        return view('dashboard.produk.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_222290'        => 'required|string|max:255',
            'deskripsi_222290'   => 'required|string',
            'harga_222290'       => 'required|numeric',
            'kategori_id_222290' => 'required|integer|exists:kategori_produk_222290,id_222290',
            'path_img_222290'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_222290'      => 'required|numeric',
        ]);
        $fileName = null;
        if ($request->hasFile('path_img_222290')) {
            $image = $request->file('path_img_222290');

            $fileName = $image->store('images', 'public');
        }

        $productData = [
            'nama_222290'        => $request->nama_222290,
            'deskripsi_222290'   => $request->deskripsi_222290,
            'harga_222290'       => $request->harga_222290,
            'kategori_id_222290' => $request->kategori_id_222290,
            'jumlah_222290'      => $request->jumlah_222290,
            'path_img_222290'    => $fileName,
            'created_at'         => now(),
        ];

        try {
            Product::create($productData);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan produk:', ['error' => $e->getMessage()]);
            return back()->withErrors('Gagal menyimpan produk. Silakan coba lagi.');
        }
        return redirect()->route('dashboard.products')->with('success', 'Produk berhasil disimpan!');
    }

    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = CategoryProduct::all();
        return view('dashboard.produk.update', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_222290'        => 'required|string|max:255',
            'deskripsi_222290'   => 'required|string',
            'harga_222290'       => 'required|numeric',
            'kategori_id_222290' => 'required|exists:kategori_produk_222290,id_222290',
            'path_img_222290'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_222290'      => 'required|numeric'
        ]);

        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Produk tidak ditemukan:', ['id' => $id, 'error' => $e->getMessage()]);
            return back()->withErrors('Produk tidak ditemukan.');
        }

        if ($request->hasFile('path_img_222290')) {
            // Hapus gambar lama jika ada
            if ($product->path_img_222290 && Storage::exists('public/' . $product->path_img_222290)) {
                Storage::delete('public/' . $product->path_img_222290);
            }

            // Simpan gambar baru
            $path                     = $request->file('path_img_222290')->store('images', 'public');
            $product->path_img_222290 = $path;
        }

        $product->nama_222290        = $validatedData['nama_222290'];
        $product->deskripsi_222290   = $validatedData['deskripsi_222290'];
        $product->harga_222290       = $validatedData['harga_222290'];
        $product->kategori_id_222290 = $validatedData['kategori_id_222290'];
        $product->jumlah_222290      = $validatedData['jumlah_222290'];

        try {
            $product->save();
            Log::info('Produk berhasil diperbarui:', $product->toArray());
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan produk:', ['error' => $e->getMessage()]);
            return back()->withErrors('Gagal menyimpan produk. Silakan coba lagi.');
        }
        // Redirect setelah berhasil
        return redirect()->route('dashboard.products', ['filter' => 'semua'])->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('dashboard.products', ['filter' => 'semua'])->with('success', 'Product deleted successfully.');
    }
}
