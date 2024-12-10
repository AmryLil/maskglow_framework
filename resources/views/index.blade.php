{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="py-12 pt-28 h-screen bg-gray-100">
        <div class="px-32 flex items-center justify-between">
            <div class="max-w-lg">
                <h1 class="text-9xl text-gray-800">Glow <span class="block text-6xl">Kilau Alami, Cinta Kulitmu!</span></h1>
                <p class="mt-4 text-gray-900">
                    Dapatkan kulit bercahaya dan sehat dengan rangkaian produk skincare alami dan efektif kami, dirancang
                    khusus untuk kebutuhan kulit Anda.
                </p>
                <a href="/shop" class="inline-block mt-6 bg-black text-white py-3 px-6 rounded-lg hover:bg-gray-800">Get
                    Started</a>
                <div class="flex mt-8 space-x-8">
                    <div>
                        <h3 class="text-3xl font-bold">+120</h3>
                        <p class="text-gray-900">Produk</p>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold">+10</h3>
                        <p class="text-gray-900">Kategori</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="w-[500px] h-[450px] overflow-hidden shadow-lg border_custom">
                    <img src={{ asset('images/banner/banner2.png') }} alt="Skincare Model"
                        class="w-full h-full object-cover shadow-lg shadow-slate-900">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->

    <section class="py-12">
        <div class="px-32 w-full h-full">
            <h1 class="text-center text-4xl font-bold">Kategori Produk Kami</h1>
            <h2 class="text-center text-xl font-light mb-6 mt-2">Produk kami diperuntukkan untuk semua orang</h2>
            <div class="flex w-full h-[75vh] gap-2">
                <div class="w-1/2 h-full">
                    <div class="relative group">
                        <img src="{{ asset('images/ktr2.jpg') }}" alt="Skincare"
                            class="w-full h-[76.5vh] object-cover rounded-lg">
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                            <span class="text-white font-bold text-lg">Serum</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-1/2 gap-2">
                    <div class="flex gap-2 w-full h-1/2">
                        <div class="relative group w-1/2">
                            <img src="{{ asset('images/ktr1.jpg') }}" alt="Bodycare"
                                class="w-full h-full object-cover rounded-lg">
                            <div
                                class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                <span class="text-white font-bold text-lg">Sunscreen</span>
                            </div>
                        </div>
                        <div class="relative group w-1/2">
                            <img src="{{ asset('images/ktr4.jpg') }}" alt="Accessories"
                                class="w-full h-full object-cover rounded-lg">
                            <div
                                class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                <span class="text-white font-bold text-lg">Toner</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full relative group h-1/2">
                        <img src="{{ asset('images/ktr3.jpg') }}" alt="Haircare"
                            class="w-full h-full object-cover rounded-lg">
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                            <span class="text-white font-bold text-lg">Cleanser</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bestsellers Section -->
    <section class="py-12 px-32">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold">Produk Terlaris</h2>
            <h2 class="text-center text-xl font-light mb-6 mt-2 mx-52">
                Temukan produk terlaris kami yang telah menjadi favorit pelanggan, memberikan hasil terbaik untuk kulit
                Anda!
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @php
                    // Data dummy produk
                    $products = [
                        [
                            'id' => 1,
                            'nama' => 'Brightening Serum',
                            'harga' => 150000,
                            'path_img' =>
                                'https://images.unsplash.com/photo-1591135108731-615592cf231b?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8dG9uZXJ8ZW58MHx8MHx8fDA%3D',
                        ],
                        [
                            'id' => 2,
                            'nama' => 'Hydrating Cleanser',
                            'harga' => 120000,
                            'path_img' =>
                                'https://images.unsplash.com/photo-1698906821397-b25264d46a83?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8c3Vuc2NyZWVufGVufDB8fDB8fHww',
                        ],
                        [
                            'id' => 3,
                            'nama' => 'UV Protection Sunscreen',
                            'harga' => 180000,
                            'path_img' =>
                                'https://images.unsplash.com/photo-1561383621-d109918107aa?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGV5ZSUyMGNyZWFtfGVufDB8fDB8fHww',
                        ],
                        [
                            'id' => 4,
                            'nama' => 'Soothing Toner',
                            'harga' => 100000,
                            'path_img' =>
                                'https://images.unsplash.com/photo-1585652757173-57de5e9fab42?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2VydW18ZW58MHx8MHx8fDA%3D',
                        ],
                    ];
                @endphp

                @foreach ($products as $product)
                    <x-shop.card-product :path="route('product.show', $product['id'])" :title="$product['nama']" :price="number_format($product['harga'], 0, ',', '.') . ' IDR'" :image="$product['path_img']"
                        class="w-8 h-full" />
                @endforeach
            </div>
        </div>
    </section>

@endsection
