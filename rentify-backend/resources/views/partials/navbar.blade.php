<header class="fixed w-full bg-white/80 backdrop-blur-md z-50 shadow-sm">
    <nav class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Rentify.</a>

        <ul class="hidden md:flex space-x-8 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="{{ route('home') }}#tentang" class="hover:text-blue-600">Tentang</a></li>
            <li class="relative group">
                <a href="{{ route('kendaraan.index') }}" class="hover:text-blue-600">Kendaraan</a>
                <ul class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg p-3 space-y-2">
                    <li><a href="{{ route('kendaraan.index', ['type' => 'Mobil']) }}" target="_blank" class="block hover:text-blue-600">Mobil</a></li>
                    <li><a href="{{ route('kendaraan.index', ['type' => 'Motor']) }}" target="_blank" class="block hover:text-blue-600">Motor</a></li>
                    <li><a href="{{ route('kendaraan.index', ['type' => 'Sepeda']) }}" target="_blank" class="block hover:text-blue-600">Sepeda</a></li>
                </ul>
            </li>
            <li><a href="{{ route('home') }}#faq" class="hover:text-blue-600">FAQ</a></li>
            <li><a href="{{ route('home') }}#contact" class="hover:text-blue-600">Kontak</a></li>
        </ul>
        <div class="hidden md:flex space-x-4">
            <a href="{{ route('login') }}"
                class="px-4 py-2 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition">Login</a>
            <a href="{{ route('register') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Daftar</a>
        </div>
    </nav>
</header>