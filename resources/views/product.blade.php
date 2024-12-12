@extends('layouts.app')


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

        <!-- Payment Modal -->
        <div id="payment-modal"
            class="fixed z-50 inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center overflow-auto">
            <div class="bg-white rounded-lg w-1/3 p-5">
                <h2 class="text-xl font-bold mb-4">Transfer Bank</h2>
                <p>Silakan transfer jumlah total ke rekening bank berikut:</p>
                <div class="my-4">
                    <strong>Nama Bank: BCA</strong><br>
                    <strong>No. Rekening: 1234567890</strong><br>
                    <strong>Nama Pemilik Rekening: PT. Dummy</strong>
                </div>

                <div class="border-t my-4 py-2">
                    <h3 class="font-semibold">Barang yang Dibeli:</h3>
                    <ul class="list-disc list-inside">
                        <li>Produk Dummy</li>
                    </ul>
                </div>

                <div class="flex justify-between font-bold mt-4">
                    <span>Total:</span>
                    <span>Rp 100.000</span>
                </div>

                <form id="upload-receipt-form" enctype="multipart/form-data" class="mt-4">
                    <label class="block mb-2">Unggah Bukti Pembayaran:</label>
                    <input type="file" name="receipt" id="receipt" class="border p-2 w-full" accept="image/*" required
                        onchange="previewReceipt()">
                </form>

                <div id="receipt-preview" class="mt-4 hidden">
                    <h3 class="font-semibold mb-2">Pratinjau Bukti Pembayaran:</h3>
                    <img id="receipt-image" src="" alt="Bukti Pembayaran" class="w-full rounded shadow-lg">
                </div>

                <div class="flex justify-end mt-5">
                    <button onclick="closePaymentModal()"
                        class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded mr-2">Tutup</button>
                    <button onclick="alert('Bukti pembayaran berhasil dikirim!')"
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Toggle Modal
        function toggleModal(modalId, show = true) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden', !show);
        }

        function showPaymentModal() {
            toggleModal('payment-modal', true);
        }

        function closePaymentModal() {
            toggleModal('payment-modal', false);
        }

        // Receipt Preview
        function previewReceipt() {
            const receiptInput = document.getElementById('receipt');
            const receiptPreview = document.getElementById('receipt-preview');
            const receiptImage = document.getElementById('receipt-image');

            if (receiptInput.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    receiptImage.src = e.target.result;
                    receiptPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(receiptInput.files[0]);
            } else {
                receiptPreview.classList.add('hidden');
            }
        }
    </script>
@endsection
