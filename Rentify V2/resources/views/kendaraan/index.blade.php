@extends('layouts.main')

@section('title', 'Kendaraan | Rentify')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-cover bg-center h-56 sm:h-72 md:h-96" style="background-image: url('{{ asset('assets/kendaraanbg.jpg') }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-transparent to-black/30"></div>
</section>

{{-- ================= SEARCH ================= --}}
<div class="max-w-7xl mx-auto px-6 -mt-20 relative z-10">
    <form method="GET"
          action="{{ route('kendaraan.index') }}"
          class="bg-white rounded-2xl shadow-lg p-6
                 flex flex-col md:flex-row gap-4 items-center">

        {{-- SEARCH --}}
        <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            placeholder="Cari kendaraan..."
            class="flex-1 px-4 py-3 rounded-lg border border-gray-300
                   focus:ring-2 focus:ring-blue-400 outline-none">

        {{-- TYPE --}}
        <select name="type" class="px-4 py-3 rounded-lg border border-gray-300">
            <option value="">Semua</option>
            <option value="Mobil" {{ request('type')=='Mobil' ? 'selected' : '' }}>Mobil</option>
            <option value="Motor" {{ request('type')=='Motor' ? 'selected' : '' }}>Motor</option>
            <option value="Sepeda" {{ request('type')=='Sepeda' ? 'selected' : '' }}>Sepeda</option>
        </select>

        {{-- PERTAHANKAN FILTER --}}
        <input type="hidden" name="max_price" value="{{ request('max_price') }}">
        <input type="hidden" name="rating" value="{{ request('rating') }}">

        <button type="submit"
            class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
            Cari
        </button>
    </form>
</div>

{{-- ================= MAIN ================= --}}
<main class="max-w-7xl mx-auto px-6 mt-10 flex flex-col md:flex-row gap-8">

    {{-- ================= SIDEBAR FILTER ================= --}}
    <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-md p-6">
        <div class="filter-panel">
        <h2 class="text-lg font-bold mb-4">Filter</h2>

        <form method="GET" action="{{ route('kendaraan.index') }}" class="space-y-5">

            {{-- PERTAHANKAN SEARCH --}}
            <input type="hidden" name="q" value="{{ request('q') }}">

            {{-- TYPE --}}
            <div>
                <label class="block text-sm font-medium mb-2">Jenis Kendaraan</label>
                <select name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="">Semua</option>
                    <option value="Mobil" {{ request('type')=='Mobil' ? 'selected' : '' }}>Mobil</option>
                    <option value="Motor" {{ request('type')=='Motor' ? 'selected' : '' }}>Motor</option>
                    <option value="Sepeda" {{ request('type')=='Sepeda' ? 'selected' : '' }}>Sepeda</option>
                </select>
            </div>

            {{-- RATING --}}
            <div>
                <label class="block text-sm font-medium mb-2">Rating</label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating" value="5" {{ request('rating')=='5'?'checked':'' }}>
                        <span>★★★★★</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating" value="4" {{ request('rating')=='4'?'checked':'' }}>
                        <span>★★★★☆</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating" value="3" {{ request('rating')=='3'?'checked':'' }}>
                        <span>★★★☆☆</span>
                    </label>
                </div>
            </div>

            {{-- PRICE --}}
            <div>
                <label class="block text-sm font-medium mb-2">Harga Maksimal</label>
                <div class="flex items-center gap-3">
                    <input id="priceRange" type="range"
                           name="max_price"
                           min="100000"
                           max="5000000"
                           value="{{ request('max_price', 5000000) }}"
                           class="w-full progressive">
                    <div id="priceValue" class="text-sm text-gray-700 w-24 text-right">Rp{{ number_format(request('max_price', 5000000),0,',','.') }}</div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-2">
                    <span>100K</span><span>5JT</span>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 text-white py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                Terapkan Filter
            </button>

            <a href="{{ route('kendaraan.index') }}"
                class="block text-center w-full border border-red-400 text-red-500 py-2 rounded-lg hover:bg-red-50 transition">
                Reset
            </a>
        </form>
        </div>
    </aside>

    {{-- ================= LIST KENDARAAN ================= --}}
    <section class="flex-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($vehicles as $vehicle)
                <div class="bg-white p-5 rounded-xl shadow transition card-container">

                    {{-- BADGE STATUS --}}
                            <div class="mb-3 relative">
                                <div class="img-rect rounded-lg bg-gray-200 overflow-hidden">
                                    @if($vehicle->image)
                                        <img src="{{ asset('assets/'.$vehicle->image) }}"
                                             alt="{{ $vehicle->name }}"
                                             class="img-absolute">
                                    @else
                                        <img src="{{ asset('assets/default-car.png') }}"
                                             alt="{{ $vehicle->name }}"
                                             class="img-absolute">
                                    @endif

                                    {{-- STATUS BADGE (top-right) --}}
                                    @if($vehicle->status === 'rented')
                                        <span class="card-badge bg-red-600 text-white text-xs px-3 py-1 rounded-full">Disewa</span>
                                    @else
                                        <span class="card-badge bg-green-600 text-white text-xs px-3 py-1 rounded-full">Tersedia</span>
                                    @endif

                                    {{-- RATING PILL (bottom-left) --}}
                                    <div class="img-overlay bg-white/90 text-sm rounded-full px-3 py-1 flex items-center gap-2">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="font-semibold text-gray-700">{{ number_format($vehicle->rating ?? 4.5,1) }}</span>
                                    </div>
                                    {{-- HOVER OVERLAY (center) --}}
                                    <div class="card-overlay">
                                        <div class="actions flex flex-col md:flex-row gap-3">
                                            <a href="{{ route('kendaraan.detail', $vehicle->id) }}" class="action-btn ghost">Lihat</a>

                                            @auth
                                                @if ($vehicle->status === 'available')
                                                    <a href="{{ route('rental.location', $vehicle->id) }}" class="action-btn primary">Sewa Sekarang</a>
                                                @else
                                                    <button disabled class="action-btn" style="background:#9CA3AF;color:white;border-radius:.5rem;">Tidak Tersedia</button>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" class="action-btn primary">Login untuk Sewa</a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <h3 class="font-semibold text-lg">{{ $vehicle->name }}</h3>

                    <p class="text-sm text-gray-600 mt-1">
                        {{ $vehicle->type }} • {{ $vehicle->transmission ?? 'Automatic' }}
                    </p>

                    <p class="mt-2 font-bold text-blue-600">
                        Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} / hari
                    </p>

                    {{-- TOMBOL SEWA --}}
                    @auth
                        @if ($vehicle->status === 'available')
                            <a href="{{ route('rental.location', $vehicle->id) }}"
                                class="block mt-3 text-center bg-blue-600 text-white py-2 rounded-lg">
                                Sewa
                            </a>
                        @else
                            <button disabled
                                class="block mt-3 w-full bg-gray-300 text-gray-600 py-2 rounded-lg cursor-not-allowed">
                                Sedang Disewa
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="block mt-3 text-center bg-gray-300 text-gray-700 py-2 rounded-lg">
                            Login untuk Sewa
                        </a>
                    @endauth

                </div>
            @empty
                <p class="text-gray-500">Belum ada kendaraan.</p>
            @endforelse

        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    // Progressive range fill & value display for price filter
    (function(){
        const range = document.getElementById('priceRange');
        const value = document.getElementById('priceValue');
        if(!range) return;

        function updateRangeFill(){
            const min = parseInt(range.min,10);
            const max = parseInt(range.max,10);
            const val = parseInt(range.value,10);
            const pct = (val - min) / (max - min) * 100;
            range.style.background = `linear-gradient(90deg, #3B82F6 ${pct}%, #e6e6e6 ${pct}%)`;
            value.textContent = 'Rp' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        range.addEventListener('input', updateRangeFill);
        range.addEventListener('change', function(){
            // optionally auto-submit the form when change completes
            // this.closest('form').submit();
        });

        updateRangeFill();
    })();
</script>
@endpush
