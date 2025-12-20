@extends('layouts.main')

@section('title', 'Rentify - Rental & Sewa Kendaraan')

@section('content')
<div class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">

    {{-- HERO --}}
    <section class="pt-32 pb-20 text-center max-w-7xl mx-auto px-6">
        <h1 class="text-4xl font-bold mb-4">Rentify</h1>
        <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Di Rentify, kami percaya bahwa perjalanan yang nyaman dimulai dari kendaraan yang tepat.
            Karena itu, kami menghadirkan platform penyewaan mobil, motor, dan sepeda yang mudah digunakan,
            aman, dan terpercaya.
        </p>

        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('kendaraan.index') }}"
               class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Lihat Kendaraan
            </a>

            @guest
                <a href="{{ route('login') }}"
                   class="px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
                    Login
                </a>
            @endguest
        </div>
    </section>

    {{-- FEATURE GRID (DESAIN ASLI TETAP) --}}
    <section class="max-w-7xl mx-auto px-6 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Feature Card --}}
            <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('assets/icon-car.png') }}" class="w-12 mb-4">
                <h3 class="font-semibold text-lg mb-2">Banyak Pilihan</h3>
                <p class="text-sm text-gray-600">
                    Tersedia mobil, motor, dan sepeda sesuai kebutuhanmu.
                </p>
            </div>

            <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('assets/icon-booking.png') }}" class="w-12 mb-4">
                <h3 class="font-semibold text-lg mb-2">Booking Mudah</h3>
                <p class="text-sm text-gray-600">
                    Pesan kendaraan hanya dengan beberapa klik.
                </p>
            </div>

            <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('assets/icon-support.png') }}" class="w-12 mb-4">
                <h3 class="font-semibold text-lg mb-2">Support 24/7</h3>
                <p class="text-sm text-gray-600">
                    Tim kami siap membantu kapan pun kamu butuh.
                </p>
            </div>

            <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('assets/icon-assurance.png') }}" class="w-12 mb-4">
                <h3 class="font-semibold text-lg mb-2">Aman & Terpercaya</h3>
                <p class="text-sm text-gray-600">
                    Kendaraan terawat & transaksi aman.
                </p>
            </div>

        </div>
    </section>

</div>
@endsection
