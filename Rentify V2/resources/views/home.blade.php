@extends('layouts.main')

@section('title', 'Rentify - Rental & Sewa Kendaraan')

@section('content')

{{-- HERO --}}
<section class="relative pt-32 pb-24 overflow-hidden">
    {{-- Background Image --}}
    <img
        src="{{ asset('assets/home.jpg') }}"
        alt="Rentify Hero"
        class="absolute inset-0 w-full h-full object-cover -z-10">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/60 -z-10"></div>

    <div class="max-w-6xl mx-auto px-6 text-left">
        <h1 class="text-4xl md:text-5xl font-bold text-white leading-snug fade-up">
            Rental dan Sewa<br>
            <span class="text-blue-400">Mobil, Motor dan Sepeda</span>
        </h1>

        <p class="text-white/90 mt-4 max-w-2xl fade-up">
            Kami menyediakan berbagai pilihan kendaraan untuk mendukung aktivitas Anda dengan harga terjangkau,
            layanan cepat, dan kualitas terbaik.
        </p>

        {{-- SEARCH BAR --}}
        <div
            class="mt-10 flex flex-col md:flex-row items-center justify-between
                   bg-white/30 backdrop-blur-xl border border-white/40
                   rounded-2xl shadow-lg p-5 gap-4 w-full fade-up">

            <input id="searchInput" type="text"
                   placeholder="Cari kendaraan atau lokasi sewa"
                   class="flex-1 bg-white/60 border border-white/40 rounded-lg px-4 py-3
                          placeholder-gray-700 text-gray-900 outline-none focus:ring-2 focus:ring-blue-400">

            <select id="vehicleType"
                    class="bg-white/60 border border-white/40 rounded-lg px-4 py-3 text-gray-900
                           focus:ring-2 focus:ring-blue-400">
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
    </div>
</section>

{{-- TENTANG --}}
<section id="tentang" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        <div class="fade-up">
            <img src="{{ asset('assets/about.jpeg') }}"
                 alt="Tentang Rentify"
                 class="rounded-2xl shadow-md object-cover w-full h-[350px]">
        </div>
        <div class="fade-up">
            <h2 class="text-3xl font-semibold mb-4">Tentang Kami</h2>
            <p class="text-gray-600 mb-4">
                Kami adalah tim yang berkomitmen untuk menyediakan layanan sewa kendaraan yang andal,
                nyaman, dan terjangkau. Setiap kendaraan kami dirawat dengan baik dan selalu dalam kondisi prima.
            </p>
            <a href="#" class="text-blue-600 font-medium hover:underline">Read More →</a>
        </div>
    </div>
</section>

{{-- PROSES --}}
<section class="py-20 bg-blue-50 fade-up">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold mb-3 text-gray-800">Proses Penyewaan</h2>
        <p class="text-gray-600 mb-12">
            Pemesanan sewa kendaraan di <span class="font-semibold text-blue-600">Rentify</span>:
        </p>

        <div class="grid md:grid-cols-3 gap-10">
            @php
                $steps = [
                    ['icon' => 'icon-tanggal.png', 'title' => 'Pilih Tanggal'],
                    ['icon' => 'icon-pickup.png', 'title' => 'Lokasi Pick-Up'],
                    ['icon' => 'icon-booking.png', 'title' => 'Booking'],
                ];
            @endphp

            @foreach ($steps as $step)
                <div class="bg-white rounded-2xl shadow-md p-8 hover:shadow-lg transition">
                    <div class="flex justify-center mb-5">
                        <div class="w-16 h-16 rounded-full bg-blue-600/10 flex items-center justify-center">
                            <img src="{{ asset('assets/' . $step['icon']) }}" class="w-8 h-8">
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-gray-600">
                        Proses mudah dan cepat sesuai kebutuhan Anda.
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- KATEGORI --}}
<section class="py-20 bg-gradient-to-r from-blue-50 to-yellow-50 fade-up">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold mb-10 text-gray-800">Kendaraan yang Kami Sewakan</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 justify-items-center">
            @php
                $cats = [
                    ['icon' => 'icon-car.png', 'name' => 'Mobil'],
                    ['icon' => 'icon-bike.png', 'name' => 'Motor'],
                    ['icon' => 'icon-cycle.png', 'name' => 'Sepeda'],
                ];
            @endphp

            @foreach ($cats as $cat)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition w-[280px] p-6 text-left">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-3xl font-bold text-gray-200">{{ $loop->iteration }}</span>
                        <div class="bg-blue-600 p-3 rounded-lg">
                            <img src="{{ asset('assets/' . $cat['icon']) }}" class="w-6 h-6 invert">
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-800">{{ $cat['name'] }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIAL --}}
@include('partials.testimonials', ['testimonials' => $testimonials ?? []])

{{-- FAQ --}}
<section id="faq" class="py-20 bg-gradient-to-b from-blue-100/50 via-blue-50/80 to-white fade-up">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-3xl font-semibold text-center mb-8 text-gray-800">
            Pertanyaan yang Sering Diajukan
        </h2>

        <div class="space-y-4">
            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Bagaimana cara rental kendaraan di Rentify?</summary>
                <p class="mt-2 text-gray-600">Pilih kendaraan, isi tanggal dan lokasi, lalu konfirmasi pemesanan melalui langkah-langkah yang disediakan pada halaman pemesanan.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Apa saja metode pembayaran yang diterima?</summary>
                <p class="mt-2 text-gray-600">Kami menerima transfer bank, kartu debit/kredit, dan pembayaran digital populer. Metode yang tersedia akan ditampilkan pada halaman checkout.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Apakah saya perlu memberikan deposit?</summary>
                <p class="mt-2 text-gray-600">Tergantung kebijakan kendaraan dan durasi sewa. Beberapa listing mungkin memerlukan deposit yang akan dikembalikan setelah kendaraan dikembalikan dalam kondisi baik.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Bolehkah mengembalikan kendaraan lebih awal atau lebih lambat?</summary>
                <p class="mt-2 text-gray-600">Pengembalian lebih awal biasanya diperbolehkan tanpa pengembalian biaya untuk hari yang tidak digunakan, sedangkan keterlambatan dapat dikenai biaya tambahan. Hubungi layanan pelanggan untuk informasi kasus per kasus.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Apa yang harus dilakukan jika kendaraan mengalami kerusakan saat sewa?</summary>
                <p class="mt-2 text-gray-600">Segera hubungi nomor darurat layanan kami yang tersedia pada konfirmasi pemesanan. Ikuti petunjuk kami untuk klaim asuransi atau perbaikan.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Apakah ada batas jarak atau kilometer?</summary>
                <p class="mt-2 text-gray-600">Beberapa kendaraan memiliki batas kilometer harian; informasi ini tercantum pada halaman detail kendaraan. Biaya tambahan mungkin diterapkan jika melebihi batas.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Bagaimana proses pembatalan dan pengembalian dana?</summary>
                <p class="mt-2 text-gray-600">Kebijakan pembatalan tergantung pada listing. Jika memenuhi syarat untuk pengembalian dana, pengembalian akan diproses sesuai metode pembayaran asli dan waktu pemrosesan bank.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Apakah pengemudi tambahan diizinkan?</summary>
                <p class="mt-2 text-gray-600">Pengemudi tambahan biasanya diizinkan jika terdaftar di kontrak sewa dan memenuhi persyaratan usia serta lisensi. Beberapa listing mengenakan biaya tambahan untuk pengemudi ekstra.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Apakah kendaraan diasuransikan?</summary>
                <p class="mt-2 text-gray-600">Sebagian kendaraan dilindungi oleh asuransi pihak ketiga atau asuransi komprehensif; rincian polis tersedia di halaman detail kendaraan atau melalui layanan pelanggan.</p>
            </details>

            <details class="bg-white/70 p-5 rounded-xl shadow-sm">
                <summary class="font-semibold cursor-pointer">Bagaimana cara menghubungi layanan pelanggan jika saya butuh bantuan?</summary>
                <p class="mt-2 text-gray-600">Anda dapat menghubungi kami melalui halaman Kontak, nomor telepon yang tertera pada konfirmasi pemesanan, atau lewat email support@rentify.com.</p>
            </details>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.getElementById("searchBtn").addEventListener("click", function () {
        const type = document.getElementById("vehicleType").value;
        const keyword = document.getElementById("searchInput").value.trim();

        if (!keyword) {
            alert("Masukkan kata kunci pencarian terlebih dahulu!");
            return;
        }

        window.location.href =
            `{{ route('kendaraan.index') }}?type=${encodeURIComponent(type)}&q=${encodeURIComponent(keyword)}`;
    });
</script>
@endpush
