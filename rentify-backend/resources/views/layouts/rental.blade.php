<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Proses Sewa') - Rentify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 font-sans">

    <nav class="bg-white shadow-sm fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Rentify</h1>
            <ul class="hidden md:flex gap-8 text-gray-700">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
                <li><a href="{{ route('home') }}#tentang" class="hover:text-blue-600">Tentang</a></li>
                <li><a href="{{ route('kendaraan.index') }}" class="hover:text-blue-600">Kendaraan</a></li>
                <li><a href="{{ route('home') }}#testimoni" class="hover:text-blue-600">Testimoni</a></li>
            </ul>
            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Sign In</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Sign Up</a>
            </div>
        </div>
    </nav>

    <div class="mt-20 relative">
        <img src="{{ asset('assets/carbg.jpg') }}" alt="Rentify Checkout" class="w-full h-64 object-cover">
        <h2
            class="absolute inset-0 flex items-center justify-center text-4xl font-bold text-white bg-black bg-opacity-40">
            Sewa Kendaraan
        </h2>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex items-center justify-center gap-6 mb-12">
            @php
                $currentStep = $step ?? 1;
                $steps = [
                    1 => ['name' => 'Lokasi & Waktu', 'route' => 'rental.location'],
                    2 => ['name' => 'Detail', 'route' => 'rental.detail'],
                    3 => ['name' => 'Checkout', 'route' => 'rental.checkout'],
                    4 => ['name' => 'Konfirmasi', 'route' => 'rental.confirmation'],
                ];
            @endphp

            @foreach ($steps as $number => $s)
                @if ($number < 4)
                    <div class="flex flex-col items-center @if($currentStep > $number) opacity-50 @endif">
                        <div class="w-10 h-10 flex items-center justify-center 
                            @if($currentStep == $number) bg-blue-600 text-white font-semibold @else bg-gray-200 text-gray-600 @endif rounded-full">
                            {{ $number }}
                        </div>
                        <p class="text-sm mt-2 @if($currentStep == $number) font-semibold text-blue-600 @endif">{{ $s['name'] }}</p>
                    </div>
                    @if ($number < 3)
                        <div class="h-[2px] w-16 bg-gray-300"></div>
                    @endif
                @else
                    {{-- Step 4 (Konfirmasi) memiliki tampilan ikon centang --}}
                    <div class="h-[2px] w-16 bg-gray-300"></div>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 flex items-center justify-center 
                            @if($currentStep == 4) bg-green-500 text-white @else bg-gray-200 text-gray-600 @endif rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <p class="text-sm mt-2 font-semibold @if($currentStep == 4) text-green-600 @endif">{{ $s['name'] }}</p>
                    </div>
                @endif
            @endforeach
        </div>

        @yield('rental_content')

    </div>

    @include('partials.footer')

    @yield('scripts')
</body>

</html>