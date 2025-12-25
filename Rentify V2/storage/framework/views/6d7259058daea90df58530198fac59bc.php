

<?php $__env->startSection('title', 'Vehicles Management'); ?>

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
                    <a href="<?php echo e(route('admin.vehicles.list')); ?>" class="text-blue-400">Vehicles</a>
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
            <h2 class="text-3xl font-bold">Vehicles Management</h2>
            <a href="<?php echo e(route('admin.vehicles.create')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                + Add Vehicle
            </a>
        </div>

        <!-- Vehicles Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left">Vehicle ID</th>
                        <th class="px-6 py-4 text-left">Brand & Model</th>
                        <th class="px-6 py-4 text-left">Plate Number</th>
                        <th class="px-6 py-4 text-left">Year</th>
                        <th class="px-6 py-4 text-left">Price/Day</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-semibold">#<?php echo e($vehicle->id); ?></td>
                            <td class="px-6 py-4"><?php echo e($vehicle->brand); ?> <?php echo e($vehicle->model); ?></td>
                            <td class="px-6 py-4 font-mono text-sm"><?php echo e($vehicle->plate_number); ?></td>
                            <td class="px-6 py-4"><?php echo e($vehicle->year); ?></td>
                            <td class="px-6 py-4 font-semibold">Rp <?php echo e(number_format($vehicle->price_per_day, 0, ',', '.')); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    <?php if($vehicle->status === 'available'): ?> bg-green-100 text-green-800
                                    <?php elseif($vehicle->status === 'rented'): ?> bg-yellow-100 text-yellow-800
                                    <?php else: ?> bg-red-100 text-red-800
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($vehicle->status)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="<?php echo e(route('admin.vehicles.edit', $vehicle->id)); ?>" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                <form method="POST" action="<?php echo e(route('admin.vehicles.delete', $vehicle->id)); ?>" class="inline" onsubmit="return confirm('Are you sure?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No vehicles found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            <?php echo e($vehicles->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/admin/vehicles/index.blade.php ENDPATH**/ ?>