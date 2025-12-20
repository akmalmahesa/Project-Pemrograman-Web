@extends('layouts.main')

@section('title', 'Kendaraan | Rentify')

@section('content')

    {{-- HERO / SEARCH --}}
    <section
        class="kendaraan-hero-bg bg-cover bg-center h-72 flex items-center justify-center pt-20">
        <div
            class="bg-white/30 backdrop-blur-md border border-white/40 rounded-2xl p-6 flex flex-col md:flex-row gap-4 items-center w-11/12 md:w-3/4 shadow-lg">
            <input type="text" id="searchInput" placeholder="Cari kendaraan atau lokasi sewa..."
                class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 outline-none">
            <select id="vehicleType" class="px-4 py-3 rounded-lg border border-gray-300">
                <option value="">Semua</option>
                <option value="Mobil">Mobil</option>
                <option value="Motor">Motor</option>
                <option value="Sepeda">Sepeda</option>
            </select>
            <button id="searchBtn"
                class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Cari
            </button>
        </div>
    </section>

    {{-- MAIN --}}
    <main class="max-w-7xl mx-auto px-6 mt-10 flex flex-col md:flex-row gap-8">

        {{-- SIDEBAR --}}
        <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-bold mb-4">Kamu Mau Nyari Apa?</h2>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium mb-2">Jenis Kendaraan</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>Semua</option>
                        <option>Mobil</option>
                        <option>Motor</option>
                        <option>Sepeda</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Merk</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>Semua</option>
                        <option>Honda</option>
                        <option>Toyota</option>
                        <option>Mitsubishi</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Kapasitas</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>2 Orang</option>
                        <option>4 Orang</option>
                        <option>6 Orang</option>
                        <option>8 Orang</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Harga per Hari</label>
                    <input type="range" min="100000" max="1000000" class="w-full" />
                    <div class="flex justify-between text-sm text-gray-600 mt-1">
                        <span>Rp100k</span><span>Rp1jt</span>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Rating</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>Semua</option>
                        <option>⭐ 5</option>
                        <option>⭐ 4 ke atas</option>
                        <option>⭐ 3 ke atas</option>
                    </select>
                </div>

                <button
                    class="w-full mt-4 bg-yellow-400 text-white py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                    Filter Results
                </button>
                <button
                    class="w-full mt-2 border border-red-400 text-red-500 py-2 rounded-lg hover:bg-red-50 transition">
                    Clear All
                </button>
            </div>
        </aside>

        {{-- LIST KENDARAAN --}}
        <section class="flex-1">

            <div class="flex justify-between items-center mb-6">
                <p class="text-sm text-gray-700">
                    Menampilkan <strong>{{ $vehicles->count() }}</strong> Kendaraan
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($vehicles as $vehicle)
                    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">

                        <img
                            src="{{ $vehicle->image
                                ? asset('assets/' . $vehicle->image)
                                : asset('assets/default-car.png') }}"
                            class="rounded-lg w-full h-40 object-cover mb-3"
                            alt="{{ $vehicle->name }}">

                        <h3 class="font-semibold text-lg">{{ $vehicle->name }}</h3>

                        <p class="text-sm text-gray-600">
                            {{ $vehicle->type }} • {{ $vehicle->transmission ?? 'Automatic' }} • AC
                        </p>

                        <p class="mt-2 font-bold text-blue-600">
                            Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} /hari
                        </p>

                        <a href="#"
                            class="w-full mt-3 block text-center bg-blue-600 text-white rounded-lg py-2 hover:bg-blue-700 transition">
                            Sewa
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada kendaraan tersedia.</p>
                @endforelse

            </div>
        </section>

    </main>
@endsection

@section('scripts')
<script>
    document.getElementById("searchBtn").addEventListener("click", function () {
        const type = document.getElementById("vehicleType").value;
        const keyword = document.getElementById("searchInput").value.trim();

        if (!keyword) {
            alert("Masukkan kata kunci pencarian terlebih dahulu!");
            return;
        }

        // sementara UI-only (route nanti)
        console.log("Search:", { type, keyword });
    });
</script>
@endsection
