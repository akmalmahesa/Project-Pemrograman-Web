@extends('layouts.auth')

@section('title', 'Rentify - Login')

@section('content')
<div class="bg-white w-full max-w-5xl flex rounded-xl shadow-lg overflow-hidden">

    {{-- ================== KIRI (GAMBAR) ================== --}}
    <div class="hidden md:block md:w-1/2 relative">

        {{-- GAMBAR --}}
        <img
            src="{{ asset('assets/bglogin.jpg') }}"
            alt="Login Background"
            class="absolute inset-0 w-full h-full object-cover">

        {{-- OVERLAY --}}
        <div class="relative z-10 bg-black/50 h-full flex flex-col justify-center p-10 text-white">
            <h1 class="text-3xl font-bold mb-3">Rentify</h1>
            <p class="text-sm leading-relaxed">
                Di Rentify, kami percaya bahwa perjalanan yang nyaman dimulai dari kendaraan yang tepat.
                Karena itu, kami menghadirkan platform penyewaan mobil, motor, dan sepeda yang mudah digunakan,
                aman, dan terpercaya.
            </p>
        </div>
    </div>

    {{-- ================== KANAN (FORM LOGIN) ================== --}}
    <div class="w-full md:w-1/2 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat datang!</h2>
        <p class="text-sm text-gray-500 mb-6">Login untuk melanjutkan</p>

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            {{-- EMAIL --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Email kamu">
            </div>

            {{-- PASSWORD --}}
            <div class="mb-4 relative">
                <label class="block text-sm mb-1">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    placeholder="Password kamu">

                {{-- TOGGLE PASSWORD --}}
                <button
                    type="button"
                    onclick="togglePassword()"
                    class="absolute right-3 top-9 text-sm text-blue-600">
                    Lihat
                </button>
            </div>

            {{-- REMEMBER --}}
            <div class="flex justify-between items-center mb-6 text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember">
                    Ingat saya
                </label>
                <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
            </div>

            {{-- SUBMIT --}}
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <p class="text-sm text-center text-gray-500 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
        </p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
@endsection