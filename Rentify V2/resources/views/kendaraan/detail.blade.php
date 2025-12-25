@extends('layouts.main')

@section('title', $vehicle->name . ' | Rentify')

@section('content')

<!-- Hero -->
<section class="relative">
    <div class="h-56 sm:h-72 md:h-96 bg-cover bg-center" style="background-image: url('{{ asset('assets/kendaraanbg.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-transparent to-black/30"></div>
    </div>
</section>

<!-- Main content -->
<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left: Gallery & Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
                    <div class="md:col-span-2">
                        <img id="mainGallery" src="{{ asset('assets/'.($vehicle->image ?? 'default-car.png')) }}" alt="{{ $vehicle->name }}" class="w-full h-72 md:h-96 object-cover rounded-lg">
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-semibold">{{ $vehicle->name }}</h2>
                                <p class="text-sm text-gray-500">{{ ucfirst($vehicle->type) }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-gray-500">Rating</div>
                                <div class="font-semibold">{{ number_format($vehicle->rating ?? 4.0,1) }} ⭐</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm text-gray-500">Deskripsi</h3>
                            <p class="text-gray-700 mt-2">{{ $vehicle->description ?? 'Tidak ada deskripsi tersedia.' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm text-gray-500">Spesifikasi singkat</h3>
                            <ul class="mt-2 text-gray-700 grid grid-cols-2 gap-2 text-sm">
                                <li>Transmisi: <strong>{{ ucfirst($vehicle->transmission ?? 'Automatic') }}</strong></li>
                                <li>Kursi: <strong>5</strong></li>
                                <li>AC: <strong>Ya</strong></li>
                                <li>Jarak tempuh: <strong>10000 km</strong></li>
                            </ul>
                        </div>

                        <div class="mt-2">
                            <h3 class="text-sm text-gray-500">Fitur</h3>
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($features as $f)
                                    <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-sm">{{ $f }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Cars -->
            <div class="mt-8">
                <h3 class="text-2xl font-semibold mb-4">Mobil Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($otherCars as $other)
                        <a href="{{ route('kendaraan.detail', $other->id) }}" class="block bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                            <div class="h-44 overflow-hidden">
                                <img src="{{ asset('assets/'.$other->image) }}" alt="{{ $other->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold">{{ $other->name }}</h4>
                                <p class="text-sm text-gray-500">{{ ucfirst($other->type) }}</p>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="text-sm text-gray-600">{{ ucfirst($other->transmission ?? 'Automatic') }}</div>
                                    <div class="font-bold text-blue-600">Rp{{ number_format($other->price_per_day,0,',','.') }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right: Sticky Summary -->
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow p-6 sticky top-28">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-2xl font-bold">{{ $vehicle->name }}</h2>
                        <p class="text-gray-500 mt-1">{{ ucfirst($vehicle->type) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Per Hari</p>
                        <p class="text-2xl font-bold text-green-600">Rp{{ number_format($vehicle->price_per_day,0,',','.') }}</p>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    @auth
                        @if($vehicle->status === 'available')
                            <a href="{{ route('rental.location', $vehicle->id) }}" class="block w-full text-center bg-blue-600 text-white px-4 py-3 rounded-lg font-semibold">Sewa Sekarang</a>
                        @else
                            <button disabled class="block w-full text-center bg-gray-300 text-gray-700 px-4 py-3 rounded-lg">Sedang Disewa</button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block w-full text-center bg-blue-600 text-white px-4 py-3 rounded-lg">Login untuk Sewa</a>
                    @endauth

                    <div class="flex gap-3">
                        <button class="flex-1 bg-blue-50 text-blue-700 px-4 py-2 rounded-lg">Plat: {{ $vehicle->plate_number ?? 'N/A' }}</button>
                    </div>
                </div>

                <div class="mt-6 text-sm text-gray-600">
                    <p><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</p>
                    <p class="mt-2"><strong>Tanggal Terdaftar:</strong> {{ \Carbon\Carbon::parse($vehicle->created_at)->format('d M Y') }}</p>
                </div>
            </div>
        </aside>

    </div>
</div>



@endsection
