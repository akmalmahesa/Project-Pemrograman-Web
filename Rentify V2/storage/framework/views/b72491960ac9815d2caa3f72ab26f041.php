<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Proses Sewa'); ?> - Rentify</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 font-sans">

  
<nav class="bg-white shadow-sm fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        
        <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold text-blue-600">
            Rentify
        </a>

        
        <ul class="hidden md:flex gap-8 text-gray-700">
            <li><a href="<?php echo e(route('home')); ?>" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="<?php echo e(route('home')); ?>#tentang" class="hover:text-blue-600">Tentang</a></li>
            <li><a href="<?php echo e(route('kendaraan.index')); ?>" class="hover:text-blue-600">Kendaraan</a></li>
            <li><a href="<?php echo e(route('home')); ?>#testimoni" class="hover:text-blue-600">Testimoni</a></li>
        </ul>

        
        <div class="flex items-center gap-6 text-gray-700">
            <?php if(auth()->guard()->check()): ?>
                <span class="hidden md:inline">
                    Halo, <strong><?php echo e(auth()->user()->name); ?></strong>
                </span>

                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button
                        type="submit"
                        class="hover:text-red-600 transition text-sm">
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="hover:text-blue-600">Sign In</a>
                <a href="<?php echo e(route('register')); ?>"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Sign Up
                </a>
            <?php endif; ?>
        </div>

    </div>
</nav>
    
    <div class="mt-20 relative">
        <img src="<?php echo e(asset('assets/carbg.jpg')); ?>" alt="Rentify Checkout"
            class="w-full h-64 object-cover">
        <h2
            class="absolute inset-0 flex items-center justify-center text-4xl font-bold text-white bg-black bg-opacity-40">
            Sewa Kendaraan
        </h2>
    </div>

    
    <div class="max-w-6xl mx-auto px-6 py-10">

        
        <div class="flex items-center justify-center gap-6 mb-12">
            <?php
                $currentStep = $step ?? 1;
            ?>

            
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    <?php echo e($currentStep == 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600'); ?>">
                    1
                </div>
                <p class="text-sm mt-2 <?php echo e($currentStep == 1 ? 'font-semibold text-blue-600' : ''); ?>">
                    Lokasi & Waktu
                </p>
            </div>

            <div class="h-[2px] w-16 bg-gray-300"></div>

            
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    <?php echo e($currentStep == 2 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600'); ?>">
                    2
                </div>
                <p class="text-sm mt-2 <?php echo e($currentStep == 2 ? 'font-semibold text-blue-600' : ''); ?>">
                    Detail
                </p>
            </div>

            <div class="h-[2px] w-16 bg-gray-300"></div>

            
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    <?php echo e($currentStep == 3 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-600'); ?>">
                    3
                </div>
                <p class="text-sm mt-2 <?php echo e($currentStep == 3 ? 'font-semibold text-blue-600' : ''); ?>">
                    Checkout
                </p>
            </div>

            <div class="h-[2px] w-16 bg-gray-300"></div>

            
            <div class="flex flex-col items-center">
                <div
                    class="w-10 h-10 flex items-center justify-center rounded-full
                    <?php echo e($currentStep == 4 ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-600'); ?>">
                    ✓
                </div>
                <p class="text-sm mt-2 <?php echo e($currentStep == 4 ? 'font-semibold text-green-600' : ''); ?>">
                    Konfirmasi
                </p>
            </div>
        </div>

        
        <?php echo $__env->yieldContent('rental_content'); ?>

    </div>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
<?php /**PATH C:\Nnesa\webRentify\resources\views/layouts/rental.blade.php ENDPATH**/ ?>