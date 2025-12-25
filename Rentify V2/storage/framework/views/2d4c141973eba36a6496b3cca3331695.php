

<?php $__env->startSection('title', 'Pembayaran Berhasil'); ?>

<?php $__env->startSection('rental_content'); ?>
<div class="max-w-5xl mx-auto">
    
    <!-- Success Header -->
    <div class="text-center mb-10">
        <div class="bg-gradient-to-br from-green-400 to-green-600 text-white w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6 shadow-lg">
            <i class="fas fa-check text-4xl"></i>
        </div>
        
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Pembayaran Berhasil!</h1>
        <p class="text-lg text-gray-600">Pesanan Anda telah dikonfirmasi</p>
    </div>

    <!-- Booking Code & Details -->
    <div class="bg-white shadow-lg rounded-2xl p-8 mb-8 border-l-4 border-green-500">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div>
                <p class="text-gray-500 text-sm font-medium">Kode Booking</p>
                <p class="text-2xl font-bold text-blue-600">#<?php echo e($booking->id); ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Status</p>
                <p class="text-lg font-semibold text-green-600">
                    <i class="fas fa-check-circle mr-2"></i><?php echo e(ucfirst($booking->status)); ?>

                </p>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Durasi</p>
                <p class="text-lg font-semibold"><?php echo e($booking->total_days); ?> hari</p>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Harga</p>
                <p class="text-2xl font-bold text-green-600">Rp<?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></p>
            </div>
        </div>
    </div>

    <!-- Vehicle Details Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Vehicle Image & Basic Info -->
        <div class="lg:col-span-2">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Detail Kendaraan</h2>
            
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <!-- Vehicle Image -->
                <div class="bg-gray-300 h-80 flex items-center justify-center">
                    <?php if($booking->vehicle->image): ?>
                        <img src="<?php echo e(asset('assets/' . $booking->vehicle->image)); ?>" 
                             alt="<?php echo e($booking->vehicle->name); ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <i class="fas fa-car text-6xl text-gray-400"></i>
                    <?php endif; ?>
                </div>

                <!-- Vehicle Info -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-3xl font-bold text-gray-900"><?php echo e($booking->vehicle->name); ?></h3>
                            <p class="text-gray-600 text-lg mt-1">
                                <i class="fas fa-tag mr-2"></i><?php echo e(ucfirst($booking->vehicle->type)); ?>

                            </p>
                        </div>
                        <?php if($booking->vehicle->rating): ?>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-yellow-500"><?php echo e($booking->vehicle->rating); ?></p>
                                <p class="text-gray-500 text-sm">⭐ Rating</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Specifications Grid -->
                    <div class="grid grid-cols-2 gap-4 py-4 border-t border-b border-gray-200">
                        <div>
                            <p class="text-gray-600 text-sm">Transmisi</p>
                            <p class="font-semibold text-gray-900">
                                <i class="fas fa-cogs mr-2"></i><?php echo e(ucfirst($booking->vehicle->transmission ?? 'Manual')); ?>

                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Harga/Hari</p>
                            <p class="font-semibold text-blue-600">
                                Rp<?php echo e(number_format($booking->vehicle->price_per_day, 0, ',', '.')); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rental Details Sidebar -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Rincian Sewa</h2>
            
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 space-y-4">
                
                <!-- Tanggal & Lokasi -->
                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex items-start mb-3">
                        <i class="fas fa-calendar-check text-blue-600 mr-3 mt-1 text-lg"></i>
                        <div>
                            <p class="text-gray-600 text-sm">Tanggal Mulai</p>
                            <p class="font-semibold text-gray-900">
                                <?php echo e(\Carbon\Carbon::parse($booking->start_date)->format('d M Y')); ?>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex items-start mb-3">
                        <i class="fas fa-calendar-times text-red-600 mr-3 mt-1 text-lg"></i>
                        <div>
                            <p class="text-gray-600 text-sm">Tanggal Kembali</p>
                            <p class="font-semibold text-gray-900">
                                <?php echo e(\Carbon\Carbon::parse($booking->end_date)->format('d M Y')); ?>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-green-600 mr-3 mt-1 text-lg"></i>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm">Lokasi Jemput</p>
                            <p class="font-semibold text-gray-900 text-sm"><?php echo e($booking->pickup_location); ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-orange-600 mr-3 mt-1 text-lg"></i>
                        <div class="flex-1">
                            <p class="text-gray-600 text-sm">Lokasi Pengembalian</p>
                            <p class="font-semibold text-gray-900 text-sm"><?php echo e($booking->return_location); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Harga/Hari:</span>
                        <span class="font-semibold">Rp<?php echo e(number_format($booking->vehicle->price_per_day, 0, ',', '.')); ?></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Jumlah Hari:</span>
                        <span class="font-semibold"><?php echo e($booking->total_days); ?> hari</span>
                    </div>
                    <div class="flex justify-between mb-2 text-sm">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="font-semibold">Rp<?php echo e(number_format($booking->vehicle->price_per_day * $booking->total_days, 0, ',', '.')); ?></span>
                    </div>
                    <?php if($booking->delivery_fee > 0): ?>
                        <div class="flex justify-between mb-3 text-sm">
                            <span class="text-gray-600">Biaya Pengiriman:</span>
                            <span class="font-semibold text-green-600">Rp<?php echo e(number_format($booking->delivery_fee, 0, ',', '.')); ?></span>
                        </div>
                    <?php else: ?>
                        <div class="flex justify-between mb-3 text-sm">
                            <span class="text-gray-600">Biaya Pengiriman:</span>
                            <span class="font-semibold">Gratis</span>
                        </div>
                    <?php endif; ?>
                    <div class="border-t pt-3 flex justify-between">
                        <span class="font-bold text-gray-900">Total Harga:</span>
                        <span class="text-2xl font-bold text-green-600">Rp<?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></span>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mt-6">
                <p class="text-yellow-800 text-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Catatan Penting:</strong> Silakan cek email Anda untuk detail lengkap pesanan.
                </p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col md:flex-row gap-4 mt-12 justify-center">
        <a href="<?php echo e(route('rental.status', $booking->id)); ?>" 
           class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition flex items-center justify-center gap-2 shadow-md">
            <i class="fas fa-eye"></i> Lihat Status Pesanan
        </a>
        
        <a href="<?php echo e(route('home')); ?>"
           class="px-8 py-3 bg-gray-200 hover:bg-gray-300 text-gray-900 font-semibold rounded-lg transition flex items-center justify-center gap-2">
            <i class="fas fa-home"></i> Kembali ke Beranda
        </a>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.rental', ['step' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/rental/confirmation.blade.php ENDPATH**/ ?>