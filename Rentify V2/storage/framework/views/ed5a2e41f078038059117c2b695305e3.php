

<?php $__env->startSection('title', 'Orders Management'); ?>

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
        <?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Orders Management</h2>
        </div>

        <!-- Orders Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left">Booking ID</th>
                        <th class="px-6 py-4 text-left">Customer</th>
                        <th class="px-6 py-4 text-left">Vehicle</th>
                        <th class="px-6 py-4 text-left">Start Date</th>
                        <th class="px-6 py-4 text-left">End Date</th>
                        <th class="px-6 py-4 text-left">Total</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-semibold">#<?php echo e($booking->id); ?></td>
                            <td class="px-6 py-4"><?php echo e($booking->user->name); ?></td>
                            <td class="px-6 py-4"><?php echo e($booking->vehicle->brand); ?> <?php echo e($booking->vehicle->model); ?></td>
                            <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($booking->start_date)->format('d M Y H:i')); ?></td>
                            <td class="px-6 py-4"><?php echo e(\Carbon\Carbon::parse($booking->end_date)->format('d M Y H:i')); ?></td>
                            <td class="px-6 py-4 font-semibold">Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    <?php if($booking->status === 'pending'): ?> bg-yellow-100 text-yellow-800
                                    <?php elseif($booking->status === 'accepted'): ?> bg-green-100 text-green-800
                                    <?php elseif($booking->status === 'rejected'): ?> bg-red-100 text-red-800
                                    <?php else: ?> bg-blue-100 text-blue-800
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($booking->status)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?php echo e(route('admin.orders.detail', $booking->id)); ?>" class="text-blue-600 hover:text-blue-800 font-semibold">View</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No orders found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            <?php echo e($bookings->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>