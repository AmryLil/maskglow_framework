@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Stat Cards -->
    <div class="shadow-lg rounded-lg pt-20">
        <div class="flex justify-between mb-4 w-full items-center bg-gray-50 p-4">
            <div
                class="flex bg-gray-900 text-xl text-white justify-between items-center rounded font-semibold w-full p-4 py-2 rounded-xl">
                <div>Kelola Data Kategori Disini</div>
                <div class="flex gap-4">
                    <a href="{{ route('dashboard.category_products.create') }}">
                        <button class="btn btn-outline bg-gray-50 text-gray-900 px-4 py-2 rounded-md">Tambah
                            Kategori</button>
                    </a>

                </div>
            </div>
        </div>

        <div class="overflow-x-auto bg-gray-50 p-4">
            <table class="table-auto w-full text-left">
                <!-- Table Header -->
                <thead class="font-semibold text-sm text-gray-700">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Deskripsi</th>
                        <th class="px-4 py-2">Cover</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $categories = [
                            [
                                'id_222290' => 1,
                                'nama_222290' => 'Pelembab',
                                'deskripsi_222290' => 'Pelembab kulit untuk menjaga kelembapan dan kesehatan kulit.',
                                'path_img_222290' => 'https://via.placeholder.com/150',
                            ],
                            [
                                'id_222290' => 2,
                                'nama_222290' => 'Serum',
                                'deskripsi_222290' => 'Serum wajah dengan kandungan aktif untuk perawatan intensif.',
                                'path_img_222290' => 'https://via.placeholder.com/150',
                            ],
                            [
                                'id_222290' => 3,
                                'nama_222290' => 'Toner',
                                'deskripsi_222290' => 'Toner untuk menyeimbangkan pH kulit dan membersihkan kotoran.',
                                'path_img_222290' => 'https://via.placeholder.com/150',
                            ],
                            [
                                'id_222290' => 4,
                                'nama_222290' => 'Sunscreen',
                                'deskripsi_222290' => 'Tabir surya untuk melindungi kulit dari paparan sinar matahari.',
                                'path_img_222290' => 'https://via.placeholder.com/150',
                            ],
                        ];
                    @endphp

                    @foreach ($categories as $index => $category)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm">{{ $category['nama_222290'] }}</td>
                            <td class="px-4 py-2 text-sm">{{ Str::words($category['deskripsi_222290'], 5, '...') }}</td>
                            <td class="px-4 py-2 text-sm">
                                @if ($category['path_img_222290'])
                                    <img src="{{ asset($category['path_img_222290']) }}" alt="Category Image"
                                        class="w-16 h-16 object-cover rounded-md">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm">
                                <div class="flex gap-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">
                                        Edit
                                    </a>

                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
