@extends('layouts.rental', ['step' => 1])

@section('title', 'Lokasi & Waktu Sewa')

@section('rental_content')
    <div class="max-w-4xl mx-auto bg-white shadow rounded-2xl p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pilih Lokasi & Waktu</h3>
        
        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Lokasi Pengantaran --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Lokasi Pengantaran</label>
                    <input type="text" placeholder="Alamat Lengkap Pengantaran"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                {{-- Tanggal & Waktu Pengantaran --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Tanggal & Waktu Pengantaran</label>
                    <input type="datetime-local" value="2025-07-07T07:00"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Lokasi Pengembalian --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Lokasi Pengembalian</label>
                    <input type="text" placeholder="Alamat Lengkap Pengembalian"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                {{-- Tanggal & Waktu Pengembalian --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Tanggal & Waktu Pengembalian</label>
                    <input type="datetime-local" value="2025-07-08T19:00"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <div class="flex justify-between pt-4">
                <a href="{{ route('kendaraan.detail') }}"
                    class="px-6 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Kembali ke Detail Mobil
                </a>
                <a href="{{ route('rental.detail') }}"
                    class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                    Lanjut ke Detail Pembayaran
                </a>
            </div>
        </form>
    </div>
@endsection