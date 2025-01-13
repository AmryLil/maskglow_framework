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
    public function index(Request $request)
    {
        // Mengambil semua produk dengan paginasi (15 per halaman)
        $products = Product::paginate(15);

        // Cek apakah request memiliki parameter 'page'
        if ($request->has('page')) {
            return view('list_product', compact('products'));
        }

        // Hanya mengambil produk terlaris jika halaman shop ditampilkan
        $productsLaris = Product::skip(4)->take(4)->get();
        return view('shop', compact('products', 'productsLaris'));
    }

    public function Best4Product(Request $request)
    {
        $products = Product::limit(4)->get();
        return view('index', compact('products'));
    }

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
        try {
            // Validasi form
            $validated = $request->validate([
                'nama'        => 'required|string|max:255',
                'deskripsi'   => 'required|string',
                'harga'       => 'required|numeric',
                'kategori_id' => 'required|exists:category_products,id',
                'jumlah'      => 'required|integer',
                'path_img'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $fileName = null;
            if ($request->hasFile('path_img')) {
                $image    = $request->file('path_img');
                $fileName = $image->store('images', 'public');
            }

            // Menggabungkan data produk dengan gambar (jika ada)
            $productData = array_merge($validated, [
                'path_img'   => $fileName,
                'created_at' => now(),
            ]);

            Product::create($productData);

            return redirect()->route('dashboard.products')->with('success', 'Produk berhasil disimpan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            abort(500, 'Data tidak valid: ' . implode(', ', $e->errors()));
        } catch (\Exception $e) {
            // Tangani error lainnya
            Log::error('Gagal menyimpan produk:', ['error' => $e->getMessage()]);
            abort(500, 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = CategoryProduct::all();
        return view('dashboard.produk.update', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Produk tidak ditemukan:', ['id' => $id, 'error' => $e->getMessage()]);
            return back()->withErrors('Produk tidak ditemukan.');
        }

        if ($request->hasFile('path_img')) {
            // Hapus gambar lama jika ada
            if ($product->path_img && Storage::exists('public/' . $product->path_img)) {
                Storage::delete('public/' . $product->path_img);
            }

            // Simpan gambar baru
            $path              = $request->file('path_img')->store('images', 'public');
            $product->path_img = $path;
        }

        $product->nama        = $request->input('nama');
        $product->deskripsi   = $request->input('deskripsi');
        $product->harga       = $request->input('harga');
        $product->kategori_id = $request->input('kategori_id');
        $product->jumlah      = $request->input('jumlah');

        try {
            $product->save();
            Log::info('Produk berhasil diperbarui:', $product->toArray());
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan produk:', ['error' => $e->getMessage()]);
            abort(500, 'Gagal menyimpan produk.');

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
