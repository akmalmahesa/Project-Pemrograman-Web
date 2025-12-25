

<?php $__env->startSection('title', 'Order Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-100">
    <!-- Admin Navbar -->
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold">Rentify Admin</h1>
                <div class="flex space-x-4">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-blue-400 transition">Dashboard</a>
                    <a href="<?php echo e(route('admin.orders.list')); ?>" class="text-blue-400">Orders</a>
                    <a href="<?php echo e(route('admin.vehicles.list')); ?>" class="hover:text-blue-400 transition">Vehicles</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span><?php echo e(auth()->user()->name); ?></span>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded transition">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <a href="<?php echo e(route('admin.orders.list')); ?>" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">&larr; Back to Orders</a>

        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold mb-6">Order Details #<?php echo e($booking->id); ?></h2>

            <!-- Customer Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Customer Information</h3>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Name:</span> <?php echo e($booking->user->name); ?></p>
                        <p><span class="font-semibold">Email:</span> <?php echo e($booking->user->email); ?></p>
                        <p><span class="font-semibold">Phone:</span> <?php echo e($booking->user->phone ?? 'N/A'); ?></p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Booking Status</h3>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Status:</span> 
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                <?php if($booking->status === 'pending'): ?> bg-yellow-100 text-yellow-800
                                <?php elseif($booking->status === 'accepted'): ?> bg-green-100 text-green-800
                                <?php elseif($booking->status === 'rejected'): ?> bg-red-100 text-red-800
                                <?php else: ?> bg-blue-100 text-blue-800
                                <?php endif; ?>">
                                <?php echo e(ucfirst($booking->status)); ?>

                            </span>
                        </p>
                        <p><span class="font-semibold">Booking Date:</span> <?php echo e($booking->created_at->format('d M Y H:i')); ?></p>
                    </div>
                </div>
            </div>

            <!-- Vehicle Info -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Vehicle Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <p><span class="font-semibold">Brand:</span> <?php echo e($booking->vehicle->brand); ?></p>
                    <p><span class="font-semibold">Model:</span> <?php echo e($booking->vehicle->model); ?></p>
                    <p><span class="font-semibold">Plate Number:</span> <?php echo e($booking->vehicle->plate_number); ?></p>
                    <p><span class="font-semibold">Year:</span> <?php echo e($booking->vehicle->year); ?></p>
                    <p><span class="font-semibold">Daily Rate:</span> Rp <?php echo e(number_format($booking->vehicle->price_per_day, 0, ',', '.')); ?></p>
                    <p><span class="font-semibold">Status:</span> <?php echo e(ucfirst($booking->vehicle->status)); ?></p>
                </div>
            </div>

            <!-- Rental Period -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Rental Period</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <p><span class="font-semibold">Start Date:</span> <?php echo e(\Carbon\Carbon::parse($booking->start_date)->format('d M Y H:i')); ?></p>
                    <p><span class="font-semibold">End Date:</span> <?php echo e(\Carbon\Carbon::parse($booking->end_date)->format('d M Y H:i')); ?></p>
                </div>
            </div>

            <!-- Pricing Breakdown -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Pricing Breakdown</h3>
                <div class="space-y-2">
                    <p><span class="font-semibold">Base Price:</span> Rp <?php echo e(number_format($booking->base_price ?? 0, 0, ',', '.')); ?></p>
                    <p><span class="font-semibold">Delivery Fee:</span> Rp <?php echo e(number_format($booking->delivery_fee ?? 0, 0, ',', '.')); ?></p>
                    <p><span class="font-semibold">Driver Fee:</span> Rp <?php echo e(number_format($booking->driver_fee ?? 0, 0, ',', '.')); ?></p>
                    <hr class="my-2">
                    <p><span class="font-semibold text-lg">Total Price:</span> <span class="text-lg text-green-600 font-bold">Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></span></p>
                </div>
            </div>

            <!-- Actions -->
            <?php if($booking->status === 'pending'): ?>
                <div class="flex gap-4">
                    <form method="POST" action="<?php echo e(route('admin.orders.accept', $booking->id)); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                            Accept Order
                        </button>
                    </form>
                    <form method="POST" action="<?php echo e(route('admin.orders.reject', $booking->id)); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
                            Reject Order
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <p class="text-gray-600">This order has already been <?php echo e($booking->status); ?>.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/admin/orders/detail.blade.php ENDPATH**/ ?>