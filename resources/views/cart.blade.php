@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="px-32 rounded-md mt-20">
        <div class="flex shadow-md">
            <!-- Shopping Cart Section -->
            <div class="w-[65%] bg-white py-10">
                <div class="flex justify-between border-b pb-8 px-10">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">3 Items</h2>
                </div>

                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold px-20 text-gray-900 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Price</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Total</h3>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="flex items-center hover:bg-gray-100 px-6 py-5">
                        <div class="flex w-2/5">
                            <div class="w-20">
                                <img class="h-24" src="https://via.placeholder.com/150" alt="Dummy Product 1">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm text-slate-950">Dummy Product 1</span>
                                <button class="font-bold text-sm text-start rounded text-red-500">Remove</button>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">2</div>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 100,000.00</span>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 200,000.00</span>
                    </div>

                    <div class="flex items-center hover:bg-gray-100 px-6 py-5">
                        <div class="flex w-2/5">
                            <div class="w-20">
                                <img class="h-24" src="https://via.placeholder.com/150" alt="Dummy Product 2">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm text-slate-950">Dummy Product 2</span>
                                <button class="font-bold text-sm text-start rounded text-red-500">Remove</button>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">1</div>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 150,000.00</span>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 150,000.00</span>
                    </div>

                    <div class="flex items-center hover:bg-gray-100 px-6 py-5">
                        <div class="flex w-2/5">
                            <div class="w-20">
                                <img class="h-24" src="https://via.placeholder.com/150" alt="Dummy Product 3">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm text-slate-950">Dummy Product 3</span>
                                <button class="font-bold text-sm text-start rounded text-red-500">Remove</button>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">3</div>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 50,000.00</span>
                        <span class="text-center w-1/5 font-semibold text-sm">Rp 150,000.00</span>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div id="summary" class="w-[35%] px-8 py-10 bg-white">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items 3</span>
                </div>

                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>Rp 500,000.00</span>
                    </div>
                    <button
                        class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
