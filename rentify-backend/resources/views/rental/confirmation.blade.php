@extends('layouts.rental', ['step' => 4])

@section('title', 'Konfirmasi Pesanan')

@section('rental_content')
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-10">
            <div class="w-14 h-14 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white"
                    class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Terima kasih! Pesananmu Telah Diterima</h3>
            <p class="text-gray-600">Nomor Pesanan : <span class="text-orange-500 font-semibold">#123456</span></p>
        </div>

        <div class="bg-white shadow rounded-2xl p-6 grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('assets/civic.png') }}" alt="Honda Civic" class="w-24 rounded-lg">
                    <div>
                        <h4 class="font-semibold text-gray-800">Honda Civic</h4>
                        <p class="text-sm text-gray-500">Lokasi: Setiabudi, Jakarta Selatan</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg p-4 mb-4">
                    <h5 class="font-semibold text-gray-700 mb-3">Harga Mobil</h5>
                    <div class="text-sm space-y-1">
                        <div class="flex justify-between"><span>Tarif Sewa (1 day)</span><span>Rp800k</span></div>
                        <div class="flex justify-between"><span>Ongkos Pengiriman</span><span>Rp50k</span></div>
                        <div class="border-t border-gray-200 my-2"></div>
                        <div class="flex justify-between font-semibold"><span>Total</span><span>Rp850k</span></div>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-700 mb-3">Info Pembayaran</h5>
                    <p class="text-sm text-gray-700">Maal Watterson</p>
                    <p class="text-sm text-gray-700">2 Penumpang, 1 Anak</p>
                    <p class="text-sm text-gray-700">Jl. Sultan Syahrir, Pd Aren, Tangerang Selatan</p>
                    <p class="text-sm text-gray-700">+62 877-7777</p>
                    <p class="text-sm text-gray-700">nnesa@gmail.com</p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-700 mb-3">Lokasi & Waktu</h5>
                    <p class="text-sm"><span class="font-semibold">Penyewaan:</span> Delivery</p>
                    <p class="text-sm"><span class="font-semibold">Tipe Rental:</span> Perhari</p>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600 font-semibold">Lokasi & Waktu Pengantaran</p>
                        <p class="text-sm text-gray-700">Jl. Sultan Syahrir, Pd Aren, Tangerang Selatan</p>
                        <p class="text-sm text-gray-500">07/07/2025 - 07:00</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 font-semibold">Lokasi & Waktu Pengembalian</p>
                        <p class="text-sm text-gray-700">Setiabudi, Jakarta Selatan</p>
                        <p class="text-sm text-gray-500">07/08/2025 - 19:00</p>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-700 mb-3">Detail Pembayaran</h5>
                    <p class="text-sm"><span class="font-semibold">Metode Pembayaran:</span> Kartu Debit</p>
                    <p class="text-sm"><span class="font-semibold">Transaction ID:</span> <a href="#"
                            class="text-blue-600 hover:underline">#124564564564</a></p>
                </div>
            </div>
        </div>

        <div class="flex justify-center gap-4 mt-10">
            <button onclick="window.print()" class="px-6 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
                Print
            </button>
            <a href="{{ route('home') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection