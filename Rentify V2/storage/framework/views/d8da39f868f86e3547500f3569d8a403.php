<header class="fixed w-full bg-white/80 backdrop-blur-md z-50 shadow-sm">
    <nav class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

        
        <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold text-blue-600">
            Rentify.
        </a>

        
        <ul class="hidden md:flex space-x-8 font-medium">
            <li><a href="<?php echo e(route('home')); ?>" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="<?php echo e(route('home')); ?>#tentang" class="hover:text-blue-600">Tentang</a></li>

           <li class="relative">
                <button
                    class="hover:text-blue-600 focus:outline-none"
                    onclick="document.getElementById('dropdown-kendaraan').classList.toggle('hidden')">
                    Kendaraan
                </button>

                <ul id="dropdown-kendaraan"
                    class="absolute hidden bg-white shadow-lg mt-3 rounded-lg p-3 space-y-2 min-w-[140px] z-50">
                    <li>
                        <a href="<?php echo e(route('kendaraan.index', ['type' => 'Mobil'])); ?>"
                        class="block hover:text-blue-600">
                        Mobil
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('kendaraan.index', ['type' => 'Motor'])); ?>"
                        class="block hover:text-blue-600">
                        Motor
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('kendaraan.index', ['type' => 'Sepeda'])); ?>"
                        class="block hover:text-blue-600">
                        Sepeda
                        </a>
                    </li>
                </ul>
            </li>


            <li><a href="<?php echo e(route('home')); ?>#faq" class="hover:text-blue-600">FAQ</a></li>
            <li><a href="<?php echo e(route('home')); ?>#contact" class="hover:text-blue-600">Kontak</a></li>
        </ul>

        
        <div class="hidden md:flex items-center space-x-4">

            
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>"
                   class="px-4 py-2 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition">
                    Login
                </a>

                <a href="<?php echo e(route('register')); ?>"
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Daftar
                </a>
            <?php endif; ?>

            
            <?php if(auth()->guard()->check()): ?>
                <span class="text-gray-700 font-medium">
                    Halo, <?php echo e(Auth::user()->name); ?>

                </span>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            <?php endif; ?>

        </div>
    </nav>
</header><?php /**PATH C:\Nnesa\webRentify\resources\views/partials/navbar.blade.php ENDPATH**/ ?>