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
        $validatedData = $request->validate([
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required|numeric|exists:kategori_produk,id',
            'path_img'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah'      => 'required|numeric',
        ]);
        $fileName = null;
        if ($request->hasFile('path_img')) {
            $image = $request->file('path_img');

            $fileName = $image->store('images', 'public');
        }

        $productData = [
            'nama'        => $request->nama,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'kategori_id' => $request->kategori_id,
            'jumlah'      => $request->jumlah,
            'path_img'    => $fileName,
            'created_at'  => now(),
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
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required|exists:kategori_produk,id',
            'path_img'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah'      => 'required|numeric'
        ]);

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

        $product->nama        = $validatedData['nama'];
        $product->deskripsi   = $validatedData['deskripsi'];
        $product->harga       = $validatedData['harga'];
        $product->kategori_id = $validatedData['kategori_id'];
        $product->jumlah      = $validatedData['jumlah'];

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
