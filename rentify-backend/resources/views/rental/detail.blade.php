@extends('layouts.rental', ['step' => 2])

@section('title', 'Detail Pembayaran')

@section('rental_content')
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white shadow rounded-2xl p-6">
            
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Info Pembayaran</h3>

            <form class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">Nama Depan <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Masukkan Nama Depan"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Nama Akhir <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Masukkan Nama Akhir"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Jumlah Penumpang</label>
                        <select
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option>2 Dewasa, 1 Anak</option>
                            <option>3 Dewasa</option>
                            <option>4 Dewasa</option>
                            <option>5 Orang</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Driver</label>
                        <select
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option>Self Drive</option>
                            <option>Dengan Driver</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Alamat</label>
                        <input type="text" placeholder="Masukkan Alamat"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Provinsi</label>
                        <input type="text" placeholder="Provinsi"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Kota</label>
                        <input type="text" placeholder="Kota"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Kecamatan</label>
                        <input type="text" placeholder="Kecamatan"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Nomor Telepon</label>
                        <input type="text" placeholder="Masukkan Nomor Telepon"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Email</label>
                        <input type="email" placeholder="Masukkan Email"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Informasi Tambahan</label>
                        <textarea rows="2" placeholder="Masukkan Informasi Tambahan"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </div>
                </div>

                <div class="flex items-center gap-2 mt-4">
                    <input type="checkbox" id="agree" class="accent-blue-600">
                    <label for="agree" class="text-sm text-gray-600">
                        Saya Telah Membaca Syarat & Ketentuan dan Kebijakan Privasi
                    </label>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('rental.location') }}"
                        class="px-6 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                        Kembali ke Lokasi
                    </a>
                    <a href="{{ route('rental.checkout') }}"
                        class="px-6 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600">
                        Lanjut ke Pembayaran
                    </a>
                </div>
            </form>

        </div>

        <div class="bg-white shadow rounded-2xl p-6 h-fit">
            <h3 class="font-semibold text-gray-800 mb-4">Detail Sewa</h3>
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('assets/civic.png') }}" alt="Honda Civic" class="w-24 rounded-lg">
                <div>
                    <h4 class="font-semibold text-gray-800">Honda Civic</h4>
                    <p class="text-sm text-gray-500">Setiabudi, Jakarta Selatan</p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Detail Mobil</a>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4 text-sm space-y-1 mb-6">
                <div class="flex justify-between"><span>Tarif Sewa (1 day)</span><span>Rp800k</span></div>
                <div class="flex justify-between"><span>Ongkos Pengiriman</span><span>Rp50k</span></div>
                <div class="border-t border-gray-200"></div>
                <div class="flex justify-between font-semibold text-gray-800"><span>Total Harga</span><span>Rp850k</span></div>
            </div>

            <h4 class="font-semibold text-gray-800 mb-2">Lokasi & Waktu</h4>
            <p class="text-sm text-gray-600">Tipe Rental: Delivery</p>
            <p class="text-sm text-gray-600">Tipe Booking: Perhari</p>
            <p class="text-sm text-gray-600 mt-2">Lokasi Pengantaran:</p>
            <p class="text-sm text-gray-500">Jl. Sultan Syahri, Pd Aren, Tangerang Selatan</p>
            <p class="text-sm text-gray-500">07/07/2025 - 07:00</p>
            <p class="text-sm text-gray-600 mt-2">Lokasi Pengembalian:</p>
            <p class="text-sm text-gray-500">Setiabudi, Jakarta Selatan</p>
            <p class="text-sm text-gray-500">07/08/2025 - 19:00</p>

            <div class="mt-6">
                <h4 class="font-semibold text-gray-800 mb-2">Kupon</h4>
                <div class="flex gap-2">
                    <input type="text" placeholder="KUPONRENTIFY"
                        class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <button class="px-4 bg-green-500 text-white rounded-lg text-sm hover:bg-green-600">Gunakan</button>
                </div>
                <p class="text-sm text-green-600 mt-2">Kupon telah menghemat Rp50k</p>
            </div>

            <div class="mt-6 border-t border-gray-200 pt-4 flex justify-between font-semibold text-lg text-gray-800">
                <span>Total Harga</span>
                <span>Rp800k</span>
            </div>

        </div>
    </div>
@endsection