<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php echo $__env->yieldContent('title', 'Rentify - Rental & Sewa Kendaraan'); ?></title>

    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.7s ease-out;
        }

        .fade-up.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="bg-white text-gray-800">

    
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="<?php if(request()->routeIs('kendaraan.index', 'kendaraan.detail')): ?> bg-gray-50 <?php endif; ?>">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const fadeElements = document.querySelectorAll(".fade-up");

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            fadeElements.forEach(el => observer.observe(el));
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\rentify\backend\resources\views/layouts/main.blade.php ENDPATH**/ ?>