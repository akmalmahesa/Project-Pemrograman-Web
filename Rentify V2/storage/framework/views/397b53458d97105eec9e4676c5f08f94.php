

<?php $__env->startSection('title', 'Detail Pesanan #' . $booking->id); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto px-6 py-12">
    
    <!-- Header with Back Button -->
    <div class="flex items-center gap-4 mb-8">
        <a href="<?php echo e(route('home')); ?>" class="text-blue-600 hover:text-blue-800 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <h1 class="text-4xl font-bold text-gray-900">Detail Pesanan Sewa</h1>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column - Vehicle & Booking Info -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Status Card -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-blue-100 text-sm">Nomor Pesanan</p>
                        <p class="text-4xl font-bold">#<?php echo e($booking->id); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-100 text-sm">Status Pesanan</p>
                        <div class="flex items-center justify-end gap-2 mt-2">
                            <?php if($booking->status === 'active'): ?>
                                <span class="inline-flex items-center px-4 py-2 bg-yellow-400 text-yellow-900 rounded-full font-semibold">
                                    <i class="fas fa-hourglass-half mr-2"></i>Sedang Berlangsung
                                </span>
                            <?php elseif($booking->status === 'completed'): ?>
                                <span class="inline-flex items-center px-4 py-2 bg-green-400 text-green-900 rounded-full font-semibold">
                                    <i class="fas fa-check-circle mr-2"></i>Selesai
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-4 py-2 bg-gray-400 text-gray-900 rounded-full font-semibold">
                                    <i class="fas fa-ban mr-2"></i><?php echo e(ucfirst($booking->status)); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vehicle Image & Info -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Image Container -->
                <div class="bg-gray-300 h-96 w-full flex items-center justify-center">
                    <?php if($booking->vehicle->image): ?>
                        <img src="<?php echo e(asset('assets/' . $booking->vehicle->image)); ?>" 
                             alt="<?php echo e($booking->vehicle->name); ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="text-center">
                            <i class="fas fa-car text-8xl text-gray-400 mb-4"></i>
                            <p class="text-gray-500 text-lg">Tidak ada gambar</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Vehicle Details -->
                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-4xl font-bold text-gray-900"><?php echo e($booking->vehicle->name); ?></h2>
                            <p class="text-gray-600 text-xl mt-2">
                                <i class="fas fa-tag mr-2 text-blue-600"></i><?php echo e(ucfirst($booking->vehicle->type)); ?>

                            </p>
                        </div>
                        <?php if($booking->vehicle->rating): ?>
                            <div class="bg-yellow-50 rounded-lg p-4 text-center">
                                <p class="text-4xl font-bold text-yellow-500"><?php echo e($booking->vehicle->rating); ?></p>
                                <p class="text-yellow-700 font-semibold">⭐ Rating</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Specifications -->
                    <div class="grid grid-cols-2 gap-4 py-6 border-y border-gray-200">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-gray-600 text-sm font-medium">Transmisi</p>
                            <p class="text-lg font-semibold text-gray-900 mt-2">
                                <i class="fas fa-cogs mr-2 text-blue-600"></i><?php echo e(ucfirst($booking->vehicle->transmission ?? 'Manual')); ?>

                            </p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-gray-600 text-sm font-medium">Harga Per Hari</p>
                            <p class="text-lg font-semibold text-green-600 mt-2">
                                Rp<?php echo e(number_format($booking->vehicle->price_per_day, 0, ',', '.')); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rental Timeline -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Timeline Penyewaan</h3>
                
                <div class="space-y-6">
                    <!-- Tanggal Mulai -->
                    <div class="flex gap-6 pb-6 border-b border-gray-200">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-600 text-sm font-medium">Tanggal Jemput</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">
                                <?php echo e(\Carbon\Carbon::parse($booking->start_date)->format('d F Y')); ?>

                            </p>
                            <p class="text-gray-600 mt-1">
                                <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>
                                Lokasi Jemput: <strong><?php echo e($booking->pickup_location); ?></strong>
                            </p>
                        </div>
                    </div>

                    <!-- Durasi -->
                    <div class="flex gap-6 pb-6 border-b border-gray-200">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                <i class="fas fa-clock text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-600 text-sm font-medium">Durasi Sewa</p>
                            <p class="text-2xl font-bold text-blue-600 mt-1"><?php echo e($booking->total_days); ?> Hari</p>
                            <p class="text-gray-600 mt-1">
                                <i class="fas fa-hourglass-half mr-2"></i>
                                <?php if($booking->status === 'active'): ?>
                                    Sewa sedang berlangsung
                                <?php else: ?>
                                    Sewa telah selesai
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Tanggal Kembali -->
                    <div class="flex gap-6">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-orange-100">
                                <i class="fas fa-calendar-times text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-600 text-sm font-medium">Tanggal Pengembalian</p>
                            <p class="text-2xl font-bold text-gray-900 mt-1">
                                <?php echo e(\Carbon\Carbon::parse($booking->end_date)->format('d F Y')); ?>

                            </p>
                            <p class="text-gray-600 mt-1">
                                <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>
                                Lokasi Pengembalian: <strong><?php echo e($booking->return_location); ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Summary -->
        <div class="space-y-6">
            
            <!-- Price Summary -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 shadow-lg border border-green-200">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Ringkasan Harga</h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between pb-4 border-b border-green-200">
                        <span class="text-gray-700">
                            <i class="fas fa-tag mr-2 text-blue-600"></i>Harga Per Hari
                        </span>
                        <span class="font-semibold text-gray-900">
                            Rp<?php echo e(number_format($booking->vehicle->price_per_day, 0, ',', '.')); ?>

                        </span>
                    </div>

                    <div class="flex justify-between pb-4 border-b border-green-200">
                        <span class="text-gray-700">
                            <i class="fas fa-calendar mr-2 text-blue-600"></i>Jumlah Hari
                        </span>
                        <span class="font-semibold text-gray-900"><?php echo e($booking->total_days); ?> hari</span>
                    </div>

                    <div class="flex justify-between pt-4 text-lg">
                        <span class="font-bold text-gray-900">Total Harga:</span>
                        <span class="text-3xl font-bold text-green-600">
                            Rp<?php echo e(number_format($booking->total_price, 0, ',', '.')); ?>

                        </span>
                    </div>
                </div>
            </div>

            <!-- Important Information -->
            <div class="bg-blue-50 rounded-2xl p-6 shadow-lg border border-blue-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Penting</h3>
                
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-blue-600 mt-1"></i>
                        <span>Pesanan Anda telah dikonfirmasi dan pembayaran diterima</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-blue-600 mt-1"></i>
                        <span>Silakan tiba 15 menit sebelum waktu jemput</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-blue-600 mt-1"></i>
                        <span>Bawa dokumen identitas asli dan SIM saat penjemputan</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-blue-600 mt-1"></i>
                        <span>Kendaraan harus dikembalikan tepat waktu</span>
                    </li>
                </ul>
            </div>

            <!-- Booking Created Date -->
            <div class="bg-gray-50 rounded-2xl p-6 shadow-lg border border-gray-200">
                <p class="text-gray-600 text-sm">Tanggal Pemesanan</p>
                <p class="text-xl font-bold text-gray-900 mt-2">
                    <?php echo e(\Carbon\Carbon::parse($booking->created_at)->format('d F Y H:i')); ?>

                </p>
            </div>

            <!-- Contact Support -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Hubungi Kami</h3>
                <div class="space-y-3">
                    <a href="tel:+62xxxx" class="flex items-center gap-3 text-blue-600 hover:text-blue-800 transition">
                        <i class="fas fa-phone"></i>
                        <span>+62 (0)xxx xxxx xxxx</span>
                    </a>
                    <a href="mailto:support@rentify.com" class="flex items-center gap-3 text-blue-600 hover:text-blue-800 transition">
                        <i class="fas fa-envelope"></i>
                        <span>support@rentify.com</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/rental/booking-status.blade.php ENDPATH**/ ?>