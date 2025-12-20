@extends('layouts.main')

@section('title', 'Detail Kendaraan | Rentify')

@section('content')

    {{-- HERO --}}
    <section class="detail-hero pt-28 pb-16"></section>

    <main class="max-w-6xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-2 gap-10">

        {{-- KIRI --}}
        <div>
            <h1 class="text-3xl font-bold mb-3">
                {{ $nama ?? 'Nama Kendaraan' }}
            </h1>

            <p class="text-2xl font-bold text-blue-600 mb-5">
                Rp{{ $harga ?? '-' }} / hari
            </p>

            <img
                src="{{ asset('assets/civic.png') }}"
                class="w-full rounded-xl shadow mb-4"
                alt="{{ $nama ?? 'Kendaraan' }}">

            <div class="flex gap-3">
                <img src="{{ asset('assets/dtcivic1.jpg') }}"
                    class="w-28 h-20 object-cover rounded-lg cursor-pointer hover:opacity-80">
                <img src="{{ asset('assets/dtcivic2.jpg') }}"
                    class="w-28 h-20 object-cover rounded-lg cursor-pointer hover:opacity-80">
                <img src="{{ asset('assets/dtcivic3.webp') }}"
                    class="w-28 h-20 object-cover rounded-lg cursor-pointer hover:opacity-80">
            </div>
        </div>

        {{-- KANAN --}}
        <div>
            <h2 class="text-xl font-semibold mb-4">Spesifikasi</h2>

            <div class="grid grid-cols-2 gap-4 text-sm">

                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">Transmisi</p>
                    <p>{{ $transmisi ?? 'N/A' }}</p>
                </div>

                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">Bahan Bakar</p>
                    <p>Bensin</p>
                </div>

                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">Pintu</p>
                    <p>4</p>
                </div>

                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">Air Conditioner</p>
                    <p>Ya</p>
                </div>

                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">Kursi</p>
                    <p>5</p>
                </div>

                <div class="p-4 border rounded-lg">
                    <p class="font-semibold">Jarak</p>
                    <p>10 Km</p>
                </div>
            </div>

            <a href="#"
                class="mt-8 inline-block w-full text-center bg-blue-600 text-white rounded-lg py-3 font-semibold hover:bg-blue-700 transition">
                Sewa Sekarang
            </a>

            <h3 class="text-lg font-semibold mt-10 mb-3">Perlengkapan:</h3>
            <ul class="grid grid-cols-2 text-sm gap-y-2">
                <li>• ABS</li>
                <li>• P3K</li>
                <li>• Air Bags</li>
                <li>• Kabel Jumper</li>
                <li>• Kunci Setir</li>
            </ul>
        </div>
    </main>

    {{-- KENDARAAN LAIN --}}
    <section class="max-w-6xl mx-auto px-6 py-14">
        <h2 class="text-2xl font-bold mb-8">Mobil Lainnya</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($vehicles as $vehicle)
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">

                    <img
                        src="{{ asset('assets/' . $vehicle['image']) }}"
                        class="rounded-lg w-full h-40 object-cover mb-3"
                        alt="{{ $vehicle['name'] }}">

                    <h3 class="font-semibold text-lg">{{ $vehicle['name'] }}</h3>

                    <p class="text-sm text-gray-600">
                        {{ $vehicle['type'] }} • {{ $vehicle['trans'] }} • AC
                    </p>

                    <p class="mt-2 font-bold text-blue-600">
                        Rp{{ $vehicle['price'] }} /hari
                    </p>

                    <a href="#"
                        class="w-full mt-3 block text-center bg-blue-600 text-white rounded-lg py-2 hover:bg-blue-700 transition">
                        Sewa
                    </a>
                </div>
            @endforeach

        </div>
    </section>
@endsection
