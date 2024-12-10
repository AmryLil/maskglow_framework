@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mt-10 p-6 bg-white rounded-lg shadow-md pt-20">
        <h2 class="text-2xl font-semibold mb-6">Edit Product</h2>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Edit Produk -->
        <form action="{{ route('products.update', 123) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div class="mb-4">
                <label for="nama_222290" class="block text-gray-700 font-semibold">Product Name</label>
                <input type="text" name="nama_222290" id="nama_222290"
                    class="mt-1 w-full p-2 border border-gray-300 rounded" value="Sample Product Name" required>
                @error('nama_222290')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi_222290" class="block text-gray-700 font-semibold">Description</label>
                <textarea name="deskripsi_222290" id="deskripsi_222290" class="mt-1 w-full p-2 border border-gray-300 rounded"
                    rows="4" required>Sample product description with details about the features and benefits of this product. It provides essential information for the customers.</textarea>
                @error('deskripsi_222290')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Harga -->
            <div class="mb-4">
                <label for="harga_222290" class="block text-gray-700 font-semibold">Price</label>
                <input type="number" name="harga_222290" id="harga_222290"
                    class="mt-1 w-full p-2 border border-gray-300 rounded" value="25000" required>
                @error('harga_222290')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Jumlah Produk -->
            <div class="mb-4">
                <label for="jumlah_222290" class="block text-gray-700 font-semibold">Stock Quantity</label>
                <input type="number" name="jumlah_222290" id="jumlah_222290"
                    class="mt-1 w-full p-2 border border-gray-300 rounded" value="100" required>
                @error('jumlah_222290')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="kategori_id_222290" class="block text-gray-700 font-semibold">Category</label>
                <select name="kategori_id_222290" id="kategori_id_222290"
                    class="mt-1 w-full p-2 border border-gray-300 rounded" required>
                    <option value="">Pilih Kategori</option>
                    <option value="1" selected>Elektronik</option>
                    <option value="2">Alat Tulis</option>
                    <option value="3">Furnitur</option>
                    <option value="4">Olahraga</option>
                </select>
                @error('kategori_id_222290')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Gambar Produk -->
            <div class="mb-4">
                <label for="path_img_222290" class="block text-gray-700 font-semibold">Product Image</label>
                <input type="file" name="path_img_222290" id="path_img_222290"
                    class="mt-1 w-full border border-gray-300 rounded p-2">
                <img src="https://via.placeholder.com/150" alt="Current Image" class="mt-2 h-24">
                @error('path_img_222290')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
