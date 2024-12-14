@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto pt-24 px-4">

        <form class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Produk</h1>

            @csrf
            <div class="mb-6">
                <label for="nama_222290" class="block text-lg font-medium text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="nama_222290"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-6">
                <label for="deskripsi_222290" class="block text-lg font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi_222290"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4" required></textarea>
            </div>

            <div class="mb-6">
                <label for="harga_222290" class="block text-lg font-medium text-gray-700 mb-2">Harga</label>
                <input type="number" name="harga_222290"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-6">
                <label for="jumlah_222290" class="block text-lg font-medium text-gray-700 mb-2">Jumlah Produk</label>
                <input type="number" name="jumlah_222290" id="jumlah_222290"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-6">
                <label for="kategori_id_222290" class="block text-lg font-medium text-gray-700 mb-2">Kategori
                    Skincare</label>
                <select name="kategori_id_222290"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">Pilih Kategori</option>
                    <!-- Data dummy kategori skincare -->
                    <option value="1">Pelembap</option>
                    <option value="2">Pembersih</option>
                    <option value="3">Toner</option>
                    <option value="4">Serum</option>
                    <option value="5">Masker Wajah</option>
                    <option value="6">Sunscreen</option>
                    <option value="7">Exfoliant</option>
                    <option value="8">Eye Cream</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="path_img_222290" class="block text-lg font-medium text-gray-700 mb-2">Gambar Produk</label>
                <input type="file" name="path_img_222290"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan
                Produk</button>
        </form>
    </div>
@endsection
