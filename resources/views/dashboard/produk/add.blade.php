<!-- resources/views/dashboard/produk/add.blade.php -->
@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto pt-20">
        <h1 class="text-2xl font-semibold mb-4">Tambah Produk</h1>

        <form>
            @csrf
            <div class="mb-4">
                <label for="nama_222290" class="block">Nama Produk</label>
                <input type="text" name="nama_222290" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi_222290" class="block">Deskripsi</label>
                <textarea name="deskripsi_222290" class="border p-2 w-full" required></textarea>
            </div>

            <div class="mb-4">
                <label for="harga_222290" class="block">Harga</label>
                <input type="number" name="harga_222290" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_222290" class="block ">Jumlah Produk</label>
                <input type="number" name="jumlah_222290" id="jumlah_222290" class="border p-2 w-full   " required>
            </div>
            <div class="mb-4">
                <label for="kategori_id_222290" class="block text-sm font-semibold">Kategori Skincare</label>
                <select name="kategori_id_222290" class="border p-2 w-full rounded-lg" required>
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


            <div class="mb-4">
                <label for="path_img_222290" class="block">Gambar Produk</label>
                <input type="file" name="path_img_222290" class="border p-2 w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Simpan Produk</button>
        </form>
    </div>
@endsection
