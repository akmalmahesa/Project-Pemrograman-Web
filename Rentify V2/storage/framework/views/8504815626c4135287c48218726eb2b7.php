

<?php $__env->startSection('title', 'Kendaraan | Rentify'); ?>

<?php $__env->startSection('content'); ?>


<section class="kendaraan-hero-bg bg-cover bg-center h-72 flex items-center justify-center pt-20">
    <form method="GET"
          action="<?php echo e(route('kendaraan.index')); ?>"
          class="bg-white/30 backdrop-blur-md border border-white/40 rounded-2xl p-6
                 flex flex-col md:flex-row gap-4 items-center
                 w-11/12 md:w-3/4 shadow-lg">

        
        <input
            type="text"
            name="q"
            value="<?php echo e(request('q')); ?>"
            placeholder="Cari kendaraan..."
            class="flex-1 px-4 py-3 rounded-lg border border-gray-300
                   focus:ring-2 focus:ring-blue-400 outline-none">

        
        <select name="type" class="px-4 py-3 rounded-lg border border-gray-300">
            <option value="">Semua</option>
            <option value="Mobil" <?php echo e(request('type')=='Mobil' ? 'selected' : ''); ?>>Mobil</option>
            <option value="Motor" <?php echo e(request('type')=='Motor' ? 'selected' : ''); ?>>Motor</option>
            <option value="Sepeda" <?php echo e(request('type')=='Sepeda' ? 'selected' : ''); ?>>Sepeda</option>
        </select>

        
        <input type="hidden" name="max_price" value="<?php echo e(request('max_price')); ?>">
        <input type="hidden" name="rating" value="<?php echo e(request('rating')); ?>">

        <button type="submit"
            class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
            Cari
        </button>
    </form>
</section>


<main class="max-w-7xl mx-auto px-6 mt-10 flex flex-col md:flex-row gap-8">

    
    <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-md p-6">
        <h2 class="text-lg font-bold mb-4">Filter</h2>

        <form method="GET" action="<?php echo e(route('kendaraan.index')); ?>" class="space-y-5">

            
            <input type="hidden" name="q" value="<?php echo e(request('q')); ?>">

            
            <div>
                <label class="block text-sm font-medium mb-2">Jenis Kendaraan</label>
                <select name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="">Semua</option>
                    <option value="Mobil" <?php echo e(request('type')=='Mobil' ? 'selected' : ''); ?>>Mobil</option>
                    <option value="Motor" <?php echo e(request('type')=='Motor' ? 'selected' : ''); ?>>Motor</option>
                    <option value="Sepeda" <?php echo e(request('type')=='Sepeda' ? 'selected' : ''); ?>>Sepeda</option>
                </select>
            </div>

            
            <div>
                <label class="block text-sm font-medium mb-2">Rating</label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating" value="5" <?php echo e(request('rating')=='5'?'checked':''); ?>>
                        <span>★★★★★</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating" value="4" <?php echo e(request('rating')=='4'?'checked':''); ?>>
                        <span>★★★★☆</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="rating" value="3" <?php echo e(request('rating')=='3'?'checked':''); ?>>
                        <span>★★★☆☆</span>
                    </label>
                </div>
            </div>

            
            <div>
                <label class="block text-sm font-medium mb-2">Harga Maksimal</label>
                <input type="range"
                       name="max_price"
                       min="100000"
                       max="5000000"
                       value="<?php echo e(request('max_price')); ?>"
                       class="w-full">
                <div class="flex justify-between text-xs text-gray-500">
                    <span>100K</span><span>5JT</span>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 text-white py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                Terapkan Filter
            </button>

            <a href="<?php echo e(route('kendaraan.index')); ?>"
                class="block text-center w-full border border-red-400 text-red-500 py-2 rounded-lg hover:bg-red-50 transition">
                Reset
            </a>
        </form>
    </aside>

    
    <section class="flex-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php $__empty_1 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition relative">

                    
                    <?php if($vehicle->status === 'rented'): ?>
                        <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-3 py-1 rounded-full">
                            Disewa
                        </span>
                    <?php else: ?>
                        <span class="absolute top-3 right-3 bg-green-500 text-white text-xs px-3 py-1 rounded-full">
                            Tersedia
                        </span>
                    <?php endif; ?>

                    <img
                        src="<?php echo e($vehicle->image ? asset('assets/'.$vehicle->image) : asset('assets/default-car.png')); ?>"
                        class="rounded-lg w-full h-40 object-cover mb-3">

                    <h3 class="font-semibold text-lg"><?php echo e($vehicle->name); ?></h3>

                    <p class="text-sm text-gray-600 mt-1">
                        <?php echo e($vehicle->type); ?> • <?php echo e($vehicle->transmission ?? 'Automatic'); ?>

                    </p>

                    <p class="mt-2 font-bold text-blue-600">
                        Rp<?php echo e(number_format($vehicle->price_per_day, 0, ',', '.')); ?> / hari
                    </p>

                    
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($vehicle->status === 'available'): ?>
                            <a href="<?php echo e(route('rental.location', $vehicle->id)); ?>"
                                class="block mt-3 text-center bg-blue-600 text-white py-2 rounded-lg">
                                Sewa
                            </a>
                        <?php else: ?>
                            <button disabled
                                class="block mt-3 w-full bg-gray-300 text-gray-600 py-2 rounded-lg cursor-not-allowed">
                                Sedang Disewa
                            </button>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="block mt-3 text-center bg-gray-300 text-gray-700 py-2 rounded-lg">
                            Login untuk Sewa
                        </a>
                    <?php endif; ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-500">Belum ada kendaraan.</p>
            <?php endif; ?>

        </div>
    </section>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rentify\backend\resources\views/kendaraan/index.blade.php ENDPATH**/ ?>