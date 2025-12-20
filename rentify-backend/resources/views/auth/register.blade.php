@extends('layouts.auth')

@section('title', 'Rentify - Daftar Akun')

@section('content')
<div class="bg-white w-full max-w-5xl flex rounded-lg shadow-lg overflow-hidden">

    {{-- KIRI --}}
    <div class="hidden md:flex md:w-1/2 relative register-bg">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center p-10 text-white">
            <h1 class="text-4xl font-bold mb-4">Rentify</h1>
            <p class="text-sm leading-relaxed opacity-90">
                Di Rentify, kami percaya bahwa perjalanan yang nyaman dimulai dari kendaraan yang tepat.
                Karena itu, kami menghadirkan platform penyewaan mobil, motor, dan sepeda yang mudah digunakan,
                aman, dan terpercaya.
            </p>
        </div>
    </div>

    {{-- STEP 1 --}}
    <div class="w-full md:w-1/2 p-8" id="step1">
        <a href="#" class="text-sm text-blue-600 hover:underline">&lt; Kembali</a>
        <p class="text-xs text-gray-500 text-right">Step 1 dari 2</p>

        <h2 class="text-2xl font-bold text-gray-800 mt-4 mb-1">Daftarkan akunmu</h2>
        <p class="text-sm text-gray-500 mb-6">Isi data dirimu di bawah ini</p>

        <form id="registerForm" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Nama depan</label>
                    <input id="firstName" type="text" placeholder="Nama depanmu"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Nama belakang</label>
                    <input id="lastName" type="text" placeholder="Nama belakangmu"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Email</label>
                <input id="email" type="email" placeholder="Email kamu"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Nomor HP</label>
                <input id="phone" type="tel" placeholder="+62 812-3456-7890"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-700 mb-1">Password</label>
                <input id="password" type="password" placeholder="Password kamu"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <p class="text-xs text-gray-500">
                Dengan mendaftar di sini, berarti kamu setuju dengan
                <a href="#" class="text-blue-600 hover:underline">Syarat & Ketentuan</a> dan
                <a href="#" class="text-blue-600 hover:underline">Kebijakan Privasi</a>.
            </p>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Lanjutkan
            </button>

            <p id="errorMsg1" class="text-red-500 text-sm text-center hidden">
                ⚠️ Semua kolom wajib diisi!
            </p>

            <p class="text-sm text-center text-gray-500 mt-6">
                Sudah punya akun?
                <a href="#" class="text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>

    {{-- STEP 2 --}}
    <div class="w-full md:w-1/2 p-8 hidden" id="step2">
        <a href="#" onclick="backToStep1()" class="text-sm text-blue-600 hover:underline">&lt; Kembali</a>
        <p class="text-xs text-gray-500 text-right">Step 2 dari 2</p>

        <h2 class="text-2xl font-bold text-gray-800 mt-4 mb-2">Cek Emailmu</h2>
        <p class="text-sm text-gray-500 mb-6">
            Kami telah mengirimkan kode konfirmasi ke
            <span class="font-medium text-gray-800" id="userEmail">emailkamu@gmail.com</span>.<br>
            Pastikan kamu memasukkan kode yang benar.
        </p>

        <div class="flex justify-center space-x-3 mb-6">
            @for ($i = 0; $i < 6; $i++)
                <input maxlength="1"
                    class="w-10 h-10 text-center border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @endfor
        </div>

        <button onclick="verifyEmail()"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
            Verifikasi
        </button>

        <p class="text-sm text-center text-gray-500 mt-6">
            Belum menerima kode?
            <a href="#" class="text-blue-600 hover:underline">Kirim ulang</a>
        </p>
    </div>

</div>
@endsection

@section('scripts')
<script>
    const form = document.getElementById('registerForm');
    const errorMsg = document.getElementById('errorMsg1');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const userEmail = document.getElementById('userEmail');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const fields = ['firstName', 'lastName', 'email', 'phone', 'password']
            .map(id => document.getElementById(id).value.trim());

        if (fields.some(v => !v)) {
            errorMsg.classList.remove('hidden');
            return;
        }

        errorMsg.classList.add('hidden');
        userEmail.textContent = fields[2];
        step1.classList.add('hidden');
        step2.classList.remove('hidden');
    });

    function backToStep1() {
        step2.classList.add('hidden');
        step1.classList.remove('hidden');
    }

    function verifyEmail() {
        alert('Verifikasi berhasil! Akunmu telah dibuat.');
    }
</script>
@endsection
