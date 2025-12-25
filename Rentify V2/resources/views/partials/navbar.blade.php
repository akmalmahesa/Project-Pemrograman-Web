<header class="fixed w-full bg-white/80 backdrop-blur-md z-50 shadow-sm">
    <nav class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
            Rentify.
        </a>

        {{-- MENU --}}
        <ul class="hidden md:flex space-x-8 font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="{{ route('home') }}#tentang" class="hover:text-blue-600">Tentang</a></li>

           <li class="relative">
                <button
                    class="hover:text-blue-600 focus:outline-none"
                    onclick="document.getElementById('dropdown-kendaraan').classList.toggle('hidden')">
                    Kendaraan
                </button>

                <ul id="dropdown-kendaraan"
                    class="absolute hidden bg-white shadow-lg mt-3 rounded-lg p-3 space-y-2 min-w-[140px] z-50">
                    <li>
                        <a href="{{ route('kendaraan.index', ['type' => 'Mobil']) }}"
                        class="block hover:text-blue-600">
                        Mobil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kendaraan.index', ['type' => 'Motor']) }}"
                        class="block hover:text-blue-600">
                        Motor
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kendaraan.index', ['type' => 'Sepeda']) }}"
                        class="block hover:text-blue-600">
                        Sepeda
                        </a>
                    </li>
                </ul>
            </li>


            <li><a href="{{ route('home') }}#faq" class="hover:text-blue-600">FAQ</a></li>
            <li><a href="{{ route('home') }}#contact" class="hover:text-blue-600">Kontak</a></li>
        </ul>

        {{-- AUTH ACTION --}}
        <div class="hidden md:flex items-center space-x-4">

            {{-- JIKA BELUM LOGIN --}}
            @guest
                <a href="{{ route('login') }}"
                   class="px-4 py-2 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Daftar
                </a>
            @endguest

            {{-- JIKA SUDAH LOGIN --}}
            @auth
                <span class="text-gray-700 font-medium">
                    Halo, {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </nav>
</header>