<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Proses Sewa') - Rentify</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 font-sans">

  {{-- ================= NAVBAR ================= --}}
<nav class="bg-white shadow-sm fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
            Rentify
        </a>

        {{-- MENU (SAMA DENGAN LAYOUTS.MAIN) --}}
        <ul class="hidden md:flex gap-8 text-gray-700">
            <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="{{ route('home') }}#tentang" class="hover:text-blue-600">Tentang</a></li>
            <li><a href="{{ route('kendaraan.index') }}" class="hover:text-blue-600">Kendaraan</a></li>
            <li><a href="{{ route('home') }}#testimoni" class="hover:text-blue-600">Testimoni</a></li>
        </ul>

        {{-- AUTH (DISESUAIKAN, TIDAK NORAK) --}}
        <div class="flex items-center gap-6 text-gray-700">
            @auth
                <span class="hidden md:inline">
                    Halo, <strong>{{ auth()->user()->name }}</strong>
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="hover:text-red-600 transition text-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-600">Sign In</a>
                <a href="{{ route('register') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Sign Up
                </a>
            @endauth
        </div>

    </div>
</nav>
    {{-- ================= HERO ================= --}}
    <div class="mt-20 relative">
        <img src="{{ asset('assets/carbg.jpg') }}" alt="Rentify Checkout"
            class="w-full h-64 object-cover">
        <h2
            class="absolute inset-0 flex items-center justify-center text-4xl font-bold text-white bg-black bg-opacity-40">
            Sewa Kendaraan
        </h2>
    </div>

    {{-- ================= CONTENT ================= --}}
    <div class="max-w-6xl mx-auto px-6 py-10">

        {{-- STEP INDICATOR --}}
        <div class="flex items-center justify-center gap-6 mb-12">
            @php
                $currentStep = $step ?? 1;
            @endphp

            {{-- STEP 1 --}}
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    {{ $currentStep == 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }}">
                    1
                </div>
                <p class="text-sm mt-2 {{ $currentStep == 1 ? 'font-semibold text-blue-600' : '' }}">
                    Lokasi & Waktu
                </p>
            </div>

            <div class="h-[2px] w-16 bg-gray-300"></div>

            {{-- STEP 2 --}}
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    {{ $currentStep == 2 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }}">
                    2
                </div>
                <p class="text-sm mt-2 {{ $currentStep == 2 ? 'font-semibold text-blue-600' : '' }}">
                    Detail
                </p>
            </div>

            <div class="h-[2px] w-16 bg-gray-300"></div>

            {{-- STEP 3 --}}
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    {{ $currentStep == 3 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600' }}">
                    3
                </div>
                <p class="text-sm mt-2 {{ $currentStep == 3 ? 'font-semibold text-blue-600' : '' }}">
                    Checkout
                </p>
            </div>

            <div class="h-[2px] w-16 bg-gray-300"></div>

            {{-- STEP 4 --}}
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    {{ $currentStep == 4 ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-600' }}">
                    ✓
                </div>
                <p class="text-sm mt-2 {{ $currentStep == 4 ? 'font-semibold text-green-600' : '' }}">
                    Konfirmasi
                </p>
            </div>
        </div>

        {{-- PAGE CONTENT --}}
        @yield('rental_content')

    </div>

    @include('partials.footer')

    @yield('scripts')

</body>

</html>
