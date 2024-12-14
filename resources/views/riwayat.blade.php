@extends('layouts.app')


@section('content')
    <div class="p-6 bg-gray-50 min-h-screen px-32">
        <h2 class="text-2xl font-semibold mb-6">Daftar Transaksi Anda</h2>

        <!-- Data dummy -->
        @php
            $transaksiList = [
                [
                    'tanggal_transaksi_222290' => '2022-01-01',
                    'products' => [
                        [
                            'path_img_222290' => 'https://via.placeholder.com/50',
                            'nama_222290' => 'Produk 1',
                            'deskripsi_222290' => 'Deskripsi produk 1',
                            'harga_222290' => 10000,
                        ],
                        [
                            'path_img_222290' => 'https://via.placeholder.com/50',
                            'nama_222290' => 'Produk 2',
                            'deskripsi_222290' => 'Deskripsi produk 2',
                            'harga_222290' => 20000,
                        ],
                    ],
                    'jumlah_222290' => 2,
                    'harga_total_222290' => 30000,
                ],
                [
                    'tanggal_transaksi_222290' => '2022-01-15',
                    'products' => [
                        [
                            'path_img_222290' => 'https://via.placeholder.com/50',
                            'nama_222290' => 'Produk 3',
                            'deskripsi_222290' => 'Deskripsi produk 3',
                            'harga_222290' => 5000,
                        ],
                        [
                            'path_img_222290' => 'https://via.placeholder.com/50',
                            'nama_222290' => 'Produk 4',
                            'deskripsi_222290' => 'Deskripsi produk 4',
                            'harga_222290' => 15000,
                        ],
                    ],
                    'jumlah_222290' => 3,
                    'harga_total_222290' => 45000,
                ],
            ];
        @endphp

        <!-- Looping untuk menampilkan setiap transaksi -->
        @foreach ($transaksiList as $transaksi)
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <div class="flex justify-between items-center mb-2">

                    <p class="text-sm text-gray-500">Tanggal Transaksi:
                        <span
                            class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($transaksi['tanggal_transaksi_222290'])->format('M d, Y') }}</span>
                    </p>
                </div>

                <!-- Bagian Produk -->
                <div class="bg-gray-100 p-4 rounded-lg mt-4">
                    @foreach ($transaksi['products'] as $product)
                        <div class="flex items-center py-2 border-b border-gray-200">
                            <img src="{{ $product['path_img_222290'] ?? 'https://via.placeholder.com/50' }}"
                                alt="{{ $product['nama_222290'] }}" class="w-16 h-16 rounded mr-4">
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold">{{ $product['nama_222290'] }}</h4>
                                <p class="text-sm text-gray-500">{{ $product['deskripsi_222290'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-semibold">Rp {{ number_format($product['harga_222290'], 2) }}</p>
                                <p class="text-sm text-gray-500">Qty: {{ $transaksi['jumlah_222290'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    <p class="text-right font-semibold">Total Harga: Rp
                        {{ number_format($transaksi['harga_total_222290'], 2) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection