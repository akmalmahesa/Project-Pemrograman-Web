

<?php $__env->startSection('title', $vehicle->name . ' | Rentify'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero -->
<section class="relative">
    <div class="h-56 sm:h-72 md:h-96 bg-cover bg-center" style="background-image: url('<?php echo e(asset('assets/kendaraanbg.jpg')); ?>')">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-transparent to-black/30"></div>
    </div>
</section>

<!-- Main content -->
<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left: Gallery & Details -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
                    <div class="md:col-span-2">
                        <img id="mainGallery" src="<?php echo e(asset('assets/'.($vehicle->image ?? 'default-car.png'))); ?>" alt="<?php echo e($vehicle->name); ?>" class="w-full h-72 md:h-96 object-cover rounded-lg">
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-semibold"><?php echo e($vehicle->name); ?></h2>
                                <p class="text-sm text-gray-500"><?php echo e(ucfirst($vehicle->type)); ?></p>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-gray-500">Rating</div>
                                <div class="font-semibold"><?php echo e(number_format($vehicle->rating ?? 4.0,1)); ?> ⭐</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm text-gray-500">Deskripsi</h3>
                            <p class="text-gray-700 mt-2"><?php echo e($vehicle->description ?? 'Tidak ada deskripsi tersedia.'); ?></p>
                        </div>

                        <div>
                            <h3 class="text-sm text-gray-500">Spesifikasi singkat</h3>
                            <ul class="mt-2 text-gray-700 grid grid-cols-2 gap-2 text-sm">
                                <li>Transmisi: <strong><?php echo e(ucfirst($vehicle->transmission ?? 'Automatic')); ?></strong></li>
                                <li>Kursi: <strong>5</strong></li>
                                <li>AC: <strong>Ya</strong></li>
                                <li>Jarak tempuh: <strong>10000 km</strong></li>
                            </ul>
                        </div>

                        <div class="mt-2">
                            <h3 class="text-sm text-gray-500">Fitur</h3>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-sm"><?php echo e($f); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Cars -->
            <div class="mt-8">
                <h3 class="text-2xl font-semibold mb-4">Mobil Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $otherCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('kendaraan.detail', $other->id)); ?>" class="block bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                            <div class="h-44 overflow-hidden">
                                <img src="<?php echo e(asset('assets/'.$other->image)); ?>" alt="<?php echo e($other->name); ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold"><?php echo e($other->name); ?></h4>
                                <p class="text-sm text-gray-500"><?php echo e(ucfirst($other->type)); ?></p>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="text-sm text-gray-600"><?php echo e(ucfirst($other->transmission ?? 'Automatic')); ?></div>
                                    <div class="font-bold text-blue-600">Rp<?php echo e(number_format($other->price_per_day,0,',','.')); ?></div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Right: Sticky Summary -->
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow p-6 sticky top-28">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-2xl font-bold"><?php echo e($vehicle->name); ?></h2>
                        <p class="text-gray-500 mt-1"><?php echo e(ucfirst($vehicle->type)); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Per Hari</p>
                        <p class="text-2xl font-bold text-green-600">Rp<?php echo e(number_format($vehicle->price_per_day,0,',','.')); ?></p>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($vehicle->status === 'available'): ?>
                            <a href="<?php echo e(route('rental.location', $vehicle->id)); ?>" class="block w-full text-center bg-blue-600 text-white px-4 py-3 rounded-lg font-semibold">Sewa Sekarang</a>
                        <?php else: ?>
                            <button disabled class="block w-full text-center bg-gray-300 text-gray-700 px-4 py-3 rounded-lg">Sedang Disewa</button>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="block w-full text-center bg-blue-600 text-white px-4 py-3 rounded-lg">Login untuk Sewa</a>
                    <?php endif; ?>

                    <div class="flex gap-3">
                        <button class="flex-1 bg-blue-50 text-blue-700 px-4 py-2 rounded-lg">Plat: <?php echo e($vehicle->plate_number ?? 'N/A'); ?></button>
                    </div>
                </div>

                <div class="mt-6 text-sm text-gray-600">
                    <p><strong>Status:</strong> <?php echo e(ucfirst($vehicle->status)); ?></p>
                    <p class="mt-2"><strong>Tanggal Terdaftar:</strong> <?php echo e(\Carbon\Carbon::parse($vehicle->created_at)->format('d M Y')); ?></p>
                </div>
            </div>
        </aside>

    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/kendaraan/detail.blade.php ENDPATH**/ ?>