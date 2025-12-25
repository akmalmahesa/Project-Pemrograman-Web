

<?php $__env->startSection('title', 'Rentify - Daftar Akun'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white w-full max-w-5xl flex rounded-xl shadow-lg overflow-hidden">

    
    <div class="hidden md:block md:w-1/2 relative">

        
        <img
            src="<?php echo e(asset('assets/bglogin.jpg')); ?>"
            alt="Register Background"
            class="absolute inset-0 w-full h-full object-cover">

        
        <div class="relative z-10 bg-black/50 h-full flex flex-col justify-center p-10 text-white">
            <h1 class="text-4xl font-bold mb-4">Rentify</h1>
            <p class="text-sm leading-relaxed opacity-90">
                Di Rentify, kami percaya bahwa perjalanan yang nyaman dimulai dari kendaraan yang tepat.
                Karena itu, kami menghadirkan platform penyewaan mobil, motor, dan sepeda yang mudah digunakan,
                aman, dan terpercaya.
            </p>
        </div>
    </div>

    
    <div class="w-full md:w-1/2 p-8">

        <a href="<?php echo e(route('login')); ?>" class="text-sm text-blue-600 hover:underline">&lt; Kembali</a>
        <p class="text-xs text-gray-500 text-right mb-2">Step 1 dari 1</p>

        <h2 class="text-2xl font-bold text-gray-800 mb-1">Daftarkan akunmu</h2>
        <p class="text-sm text-gray-500 mb-6">Isi data dirimu di bawah ini</p>

        
        <?php if($errors->any()): ?>
            <div class="mb-4 text-sm text-red-600">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register.process')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm mb-1">Nama depan</label>
                    <input name="first_name" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm mb-1">Nama belakang</label>
                    <input name="last_name" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Email</label>
                <input name="email" type="email" required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm mb-1">Nomor HP</label>
                <input name="phone" required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div class="relative">
                <label class="block text-sm mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                <button type="button" onclick="togglePassword('password')"
                    class="absolute right-3 top-9 text-sm text-blue-600">
                    Lihat
                </button>
            </div>

            
            <div class="relative">
                <label class="block text-sm mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">

                <button type="button" onclick="togglePassword('password_confirmation')"
                    class="absolute right-3 top-9 text-sm text-blue-600">
                    Lihat
                </button>
            </div>

            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Daftar
            </button>

            <p class="text-sm text-center text-gray-500 mt-6">
                Sudah punya akun?
                <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/auth/register.blade.php ENDPATH**/ ?>