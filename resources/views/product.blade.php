@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full mt-20 px-32">
        <div class="bg-white p-2 rounded-lg shadow-md gap-2">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh]">
                    <img src="https://images.unsplash.com/photo-1623607915241-a3151d59a9c8?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Product Image" class="object-cover h-full">
                </div>

                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-2 justify-between px-6">
                    <div class="text-start mt-2">
                        <h1 class="text-4xl font-bold">Produk Dummy</h1>
                        <p class="text-xl text-gray-900 font-light mt-2">Kategori Dummy</p>
                        <div class="h-0.5 w-full bg-slate-900 mt-3"></div>
                    </div>

                    <!-- Product Specs -->
                    <div>
                        <div class="mt-6 text-base">
                            <p class="text-xl text-gray-900 font-light">Description</p>
                            <p class="text-lg">Ini adalah deskripsi produk dummy.</p>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="text-lg font-semibold">Quantity</div>
                            <input id="qty" type="number" value="1" min="1"
                                class="border p-2 text-center w-16 text-base font-semibold rounded" />
                        </div>
                        <div class="mt-6 text-base">
                            <p class="text-xl text-gray-900 font-light">Jumlah</p>
                            <p class="text-lg font-bold">10 Barang</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <div class="mt-3 text-start mb-6">
                            <p class="text-5xl font-bold">Rp 100.000</p>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="mt-2 mb-2 flex justify-center w-full gap-2">
                            <button id="co" onclick="showPaymentModal()"
                                class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-900 w-[80%]">
                                Checkout Now
                            </button>
                            <button id="add-to-cart" class="w-[20%] bg-black justify-center flex rounded-md">
                                <img src="{{ asset('images/carts.png') }}" alt="" class="h-12">
                            </button>
                        </div>

                        <!-- Modal -->
                        <dialog id="my_modal_3" class="modal">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="text-lg font-bold">Keranjang Info</h3>
                                <p class="py-4">Produk Berhasil Ditambahkan</p>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
