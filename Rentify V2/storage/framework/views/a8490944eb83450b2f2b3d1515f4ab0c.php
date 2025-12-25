

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-100">
    <!-- Admin Navbar -->
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold">Rentify Admin</h1>
                <div class="flex space-x-4">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-blue-400 transition">Dashboard</a>
                    <a href="<?php echo e(route('admin.orders.list')); ?>" class="hover:text-blue-400 transition">Orders</a>
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

        <h2 class="text-3xl font-bold mb-8">Admin Dashboard</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Total Bookings</div>
                <div class="text-4xl font-bold text-blue-600"><?php echo e($totalBookings); ?></div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Pending Orders</div>
                <div class="text-4xl font-bold text-yellow-600"><?php echo e($pendingBookings); ?></div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Total Vehicles</div>
                <div class="text-4xl font-bold text-green-600"><?php echo e($totalVehicles); ?></div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Total Users</div>
                <div class="text-4xl font-bold text-purple-600"><?php echo e($totalUsers); ?></div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="<?php echo e(route('admin.orders.list')); ?>" class="block p-4 border border-gray-200 rounded-lg hover:bg-blue-50 transition">
                    <div class="font-semibold text-blue-600">View All Orders</div>
                    <p class="text-sm text-gray-600">Accept or reject pending bookings</p>
                </a>
                <a href="<?php echo e(route('admin.vehicles.list')); ?>" class="block p-4 border border-gray-200 rounded-lg hover:bg-green-50 transition">
                    <div class="font-semibold text-green-600">Manage Vehicles</div>
                    <p class="text-sm text-gray-600">Add, edit or delete vehicles</p>
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>