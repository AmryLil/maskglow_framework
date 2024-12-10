@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <main class="mt-[80px] relative w-full">
        <!-- Banner Section -->

        <div id="gallery" class="relative w-full" data-carousel="slide">
            <div class="relative pb-10 h-[70vh] object-cover overflow-hidden rounded-lg w-full">
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner1.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner2.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner3.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner4.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
            </div>
        </div>

        <div class="px-32">
            <!-- Featured Items Section -->
            <div class="flex justify-center items-center mb-7">
                <div class="h-0.5 bg-black w-full mt-10"></div>
                <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">PRODUK TERLARIS</h2>
                <div class="h-0.5 bg-black w-full mt-10"></div>
            </div>

            @php
                // Data dummy produk
                $productsLaris = [
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

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ($productsLaris as $product)
                    <x-shop.card-product :path="route('product.show', $product['id'])" :title="$product['nama']" :price="number_format($product['harga'], 0, ',', '.') . ' IDR'" :image="$product['path_img']" />
                @endforeach
            </div>

            <!-- Another Products Section -->
            <div class="flex justify-center items-center">
                <div class="h-0.5 bg-black w-full mt-10"></div>
                <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">PRODUK LAINNYA</h2>
                <div class="h-0.5 bg-black w-full mt-10"></div>
            </div>

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
                    [
                        'id' => 4,
                        'nama' => 'Soothing Toner',
                        'harga' => 100000,
                        'path_img' =>
                            'https://images.unsplash.com/photo-1585652757173-57de5e9fab42?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2VydW18ZW58MHx8MHx8fDA%3D',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-5">
                @foreach ($products as $product)
                    <x-shop.card-product :path="route('product.show', $product['id'])" :title="$product['nama']" :price="number_format($product['harga'], 0, ',', '.') . ' IDR'" :image="$product['path_img']" />
                @endforeach
                @foreach ($products as $product)
                    <x-shop.card-product :path="route('product.show', $product['id'])" :title="$product['nama']" :price="number_format($product['harga'], 0, ',', '.') . ' IDR'" :image="$product['path_img']" />
                @endforeach
                @foreach ($products as $product)
                    <x-shop.card-product :path="route('product.show', $product['id'])" :title="$product['nama']" :price="number_format($product['harga'], 0, ',', '.') . ' IDR'" :image="$product['path_img']" />
                @endforeach
            </div>
        </div>
    </main>
@endsection
