<section class="py-20 bg-gradient-to-b from-white via-blue-50/30 to-blue-100/40 fade-up">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold mb-3 text-gray-800">Apa Kata Client Kami?</h2>
        <div class="w-24 h-1 bg-yellow-400 mx-auto mb-10 rounded-full"></div>

        <?php if(isset($testimonials) && count($testimonials) > 0): ?>
            <?php 
                $defaultClient = $testimonials[0]; // Klien pertama sebagai default
            ?>

            <div id="main-review-card"
                class="bg-white/60 backdrop-blur-xl border border-white/30 shadow-[0_8px_25px_rgba(0,0,0,0.08)]
                rounded-3xl p-10 max-w-3xl mx-auto mb-10 transition hover:shadow-[0_12px_30px_rgba(0,0,0,0.12)]">
                
                <img id="review-image" src="<?php echo e(asset('assets/' . $defaultClient['image'])); ?>" alt="<?php echo e($defaultClient['name']); ?>"
                    class="w-24 h-24 rounded-full mx-auto border-4 border-blue-500 mb-4 object-cover shadow-lg" />
                <h3 id="review-name" class="font-semibold text-lg text-gray-800"><?php echo e($defaultClient['name']); ?></h3>

                <div id="review-rating" class="flex justify-center mt-2 mb-4 text-yellow-400">
                    <?php for($i = 0; $i < $defaultClient['rating']; $i++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 mx-1">
                            <path d="M12 .587l3.668 7.568L24 9.753l-6 5.853L19.335 24 12 19.897 4.665 24 6 15.606 0 9.753l8.332-1.598z" />
                        </svg>
                    <?php endfor; ?>
                </div>

                <p id="review-text" class="text-gray-700 leading-relaxed max-w-2xl mx-auto italic">
                    <?php echo e($defaultClient['review']); ?>

                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // Encode data ke JSON string (agar JS bisa membacanya)
                        $clientData = json_encode([
                            'name' => $client['name'],
                            'date' => $client['date'],
                            'review' => $client['review'],
                            'rating' => $client['rating'],
                            'image' => asset('assets/' . $client['image'])
                        ]);
                    ?>
                    
                    
                    <div class="testimonial-item flex items-center gap-3 rounded-full px-5 py-2 shadow-sm 
                        
                        <?php if($client['id'] == $defaultClient['id']): ?> 
                            active-client bg-gradient-to-r from-yellow-400 to-yellow-300 text-gray-900 shadow-md 
                        <?php else: ?> 
                            bg-white/60 backdrop-blur-lg border border-white/40 hover:shadow-md hover:bg-white/80 
                        <?php endif; ?> 
                        cursor-pointer transition"
                        data-client-id="<?php echo e($client['id']); ?>"
                        data-client-data="<?php echo e(htmlspecialchars($clientData, ENT_QUOTES, 'UTF-8')); ?>">
                        
                        <img src="<?php echo e(asset('assets/' . $client['image'])); ?>" alt="<?php echo e($client['name']); ?>"
                            class="w-10 h-10 rounded-full border border-white shadow-sm" />
                        <div class="text-left">
                            <p class="font-semibold text-sm leading-tight"><?php echo e($client['name']); ?></p>
                            <span class="text-xs <?php if($client['id'] != $defaultClient['id']): ?> text-gray-600 <?php else: ?> opacity-80 <?php endif; ?> testimonial-date"><?php echo e($client['date']); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-gray-500">Belum ada testimoni yang tersedia.</p>
        <?php endif; ?>
    </div>
</section>



<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reviewItems = document.querySelectorAll('.testimonial-item');
            const reviewImage = document.getElementById('review-image');
            const reviewName = document.getElementById('review-name');
            const reviewRating = document.getElementById('review-rating');
            const reviewText = document.getElementById('review-text');

            function updateReview(clientData) {
                // Fungsi untuk mengganti konten review utama
                reviewImage.src = clientData.image;
                reviewImage.alt = clientData.name;
                reviewName.textContent = clientData.name;
                reviewText.textContent = clientData.review;

                // Membangun ulang rating bintang
                reviewRating.innerHTML = '';
                for (let i = 0; i < clientData.rating; i++) {
                    reviewRating.innerHTML += `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 mx-1">
                            <path d="M12 .587l3.668 7.568L24 9.753l-6 5.853L19.335 24 12 19.897 4.665 24 6 15.606 0 9.753l8.332-1.598z" />
                        </svg>
                    `;
                }
            }

            reviewItems.forEach(item => {
                item.addEventListener('click', function() {
                    // console.log("Klien diklik!"); // Gunakan ini untuk debug di console

                    // 1. Ambil Data dan Parse JSON
                    const clientDataString = this.getAttribute('data-client-data');
                    try {
                        const clientData = JSON.parse(clientDataString);
                        
                        // Panggil fungsi update konten
                        updateReview(clientData);

                        // 2. Kelola Styling (Ganti Status Aktif/Non-aktif)
                        reviewItems.forEach(el => {
                            // Reset style non-aktif
                            el.classList.remove('active-client', 'bg-gradient-to-r', 'from-yellow-400', 'to-yellow-300', 'text-gray-900', 'shadow-md');
                            el.classList.add('bg-white/60', 'backdrop-blur-lg', 'border', 'border-white/40', 'hover:shadow-md', 'hover:bg-white/80');
                            el.querySelector('.testimonial-date').classList.add('text-gray-600');
                            el.querySelector('.testimonial-date').classList.remove('opacity-80');
                        });

                        // Set style aktif pada item yang diklik
                        this.classList.add('active-client', 'bg-gradient-to-r', 'from-yellow-400', 'to-yellow-300', 'text-gray-900', 'shadow-md');
                        this.classList.remove('bg-white/60', 'backdrop-blur-lg', 'border', 'border-white/40', 'hover:shadow-md', 'hover:bg-white/80');
                        this.querySelector('.testimonial-date').classList.remove('text-gray-600');
                        this.querySelector('.testimonial-date').classList.add('opacity-80');
                        
                    } catch (e) {
                        console.error("Gagal parse data JSON klien:", e);
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\rentify\backend\resources\views/partials/testimonials.blade.php ENDPATH**/ ?>