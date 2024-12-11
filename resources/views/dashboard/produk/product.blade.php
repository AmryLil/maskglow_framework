@extends('layouts.dashboard-layout')

{{-- @section('title', $title) --}}

@section('content')
    <!-- Dashboard Header -->
    <div class="shadow rounded-lg pt-20 w-full">
        <div class="flex justify-between items-center mb-2 bg-slate-50 p-2">
            <div
                class="flex bg-slate-900 text-xl text-slate-50 justify-between items-center rounded font-semibold w-full p-4 py-2 rounded-xl">
                <div>Kelola Semua Data Produk</div>
                <a href="{{ route('products.add') }}">
                    <button class="btn btn-outline h-2 my-4 bg-slate-50 text-slate-900">Tambah Produk</button>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto bg-slate-50 p-2">
            <table class="table-auto w-full text-left text-sm">
                <thead class="font-bold text-base bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Deskripsi</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Dummy -->
                    <tr>
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">Produk 1</td>
                        <td class="px-4 py-2">Deskripsi singkat produk 1...</td>
                        <td class="px-4 py-2">Kategori 1</td>
                        <td class="px-4 py-2">Rp 100.000</td>
                        <td class="px-4 py-2">10</td>
                        <td class="px-4 py-2">
                            <ul class="flex gap-2">
                                <li>
                                    <a href="#" class="text-yellow-500">
                                        Edit
                                    </a>
                                </li>
                                <li>

                                    <button type="submit" class="text-red-500">
                                        Hapus
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2">Produk 2</td>
                        <td class="px-4 py-2">Deskripsi singkat produk 2...</td>
                        <td class="px-4 py-2">Kategori 2</td>
                        <td class="px-4 py-2">Rp 200.000</td>
                        <td class="px-4 py-2">15</td>
                        <td class="px-4 py-2">
                            <ul class="flex gap-2">
                                <li>
                                    <a href="#" class="text-yellow-500">
                                        Edit
                                    </a>
                                </li>
                                <li>

                                    <button type="submit" class="text-red-500">
                                        Hapus
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- Add more dummy rows here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Confirmation Dialog for Delete -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus barang ini?');
        }
    </script>
@endsection
