@extends('layouts.auth')

@section('title', 'Rentify - Login')

@section('content')
<div class="bg-white w-full max-w-5xl flex rounded-lg shadow-lg overflow-hidden">

    {{-- KIRI --}}
    <div class="hidden md:flex md:w-1/2 login-bg">
        <div class="bg-black bg-opacity-40 flex flex-col justify-center p-10 text-white">
            <h1 class="text-3xl font-bold mb-3">Rentify</h1>
            <p class="text-sm leading-relaxed">
                Di Rentify, kami percaya bahwa perjalanan yang nyaman dimulai dari kendaraan yang tepat.
                Karena itu, kami menghadirkan platform penyewaan mobil, motor, dan sepeda yang mudah digunakan,
                aman, dan terpercaya.
            </p>
        </div>
    </div>

    {{-- KANAN --}}
    <div class="w-full md:w-1/2 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Selamat datang!</h2>
        <p class="text-sm text-gray-500 mb-4">Login untuk melanjutkan</p>

        <form id="loginForm" method="POST" action="#">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm mb-2">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email kamu"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm mb-2">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password kamu"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" class="mr-2" name="remember">
                    Ingat saya
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Lupa password?</a>
            </div>

            <button
                type="submit"
                class="block w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <div class="my-6 flex items-center">
            <hr class="flex-grow border-gray-300">
            <span class="mx-2 text-gray-500 text-sm">atau lanjutkan dengan</span>
            <hr class="flex-grow border-gray-300">
        </div>

        <div class="flex justify-center space-x-4">
            <button class="border border-gray-300 p-2 rounded-md hover:bg-gray-100 transition">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg"
                    class="w-6 h-6" alt="Facebook">
            </button>
            <button class="border border-gray-300 p-2 rounded-md hover:bg-gray-100 transition">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg"
                    class="w-6 h-6" alt="Google">
            </button>
            <button class="border border-gray-300 p-2 rounded-md hover:bg-gray-100 transition">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg"
                    class="w-6 h-6" alt="LinkedIn">
            </button>
        </div>

        <p class="text-sm text-center text-gray-500 mt-6">
            Belum punya akun?
            <a href="#" class="text-blue-600 hover:underline">Sign up</a>
        </p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!email || !password) {
            e.preventDefault();
            alert('Harap isi semua kolom sebelum melanjutkan!');
        }
    });
</script>
@endsection
