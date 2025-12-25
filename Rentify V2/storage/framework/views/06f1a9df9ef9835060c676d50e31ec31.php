<section id="testimonials" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold mb-6">Apa Kata Klien Kami</h2>

        <div id="testimonial-showcase" class="space-y-6">
            <!-- Main showcase card -->
            <div id="mainCard" class="bg-white rounded-2xl border border-gray-100 shadow-md p-8">
                <div class="flex flex-col items-center">
                    <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-blue-400 flex items-center justify-center">
                        <img id="mainAvatar" src="<?php echo e(asset('assets/client1.jpeg')); ?>" alt="client" class="w-full h-full object-cover">
                    </div>

                    <div class="mt-4 text-sm text-gray-500">@<span id="mainUsername">kairi</span></div>
                    <div class="text-xl font-semibold mt-1" id="mainName">Kairi Risolmayo</div>

                    <div class="mt-3 flex items-center gap-1" id="mainRating">
                        <!-- Stars inserted via JS -->
                    </div>

                    <p id="mainText" class="mt-4 text-gray-700 max-w-2xl text-center">
                        "Pelayanan cepat dan kendaraan dalam kondisi prima — pengalaman sewa terbaik!"
                    </p>
                </div>
            </div>

            <!-- Thumbnail navigation -->
            <div class="mt-4">
                <div class="flex gap-3 overflow-x-auto pb-2">
                    <?php
                        $clients = [
                            ['img' => 'client1.jpeg', 'username' => '@kairi', 'name' => 'Kairi Risolmayo', 'date' => '2025-10-02', 'text' => 'Sangat memuaskan — proses pemesanan mudah dan kendaraan terawat.', 'rating' => 5],
                            ['img' => 'client2.jpg', 'username' => '@skylar', 'name' => 'David Tendean', 'date' => '2025-09-14', 'text' => 'Harga kompetitif dan layanan cepat. Saya akan sewa lagi!', 'rating' => 4],
                            ['img' => 'client3.jpeg', 'username' => '@pasep', 'name' => 'Gilang Sanz', 'date' => '2025-08-21', 'text' => 'Armada lengkap dan staf ramah — rekomendasi!', 'rating' => 5],
                            ['img' => 'client4.jpg', 'username' => '@kiboy', 'name' => 'Nicky Fernando', 'date' => '2025-07-05', 'text' => 'Mobil bersih dan siap pakai. Pengalaman bagus.', 'rating' => 4],
                            ['img' => 'client5.jpg', 'username' => '@lutpi', 'name' => 'Lutfi Ardianto', 'date' => '2025-06-12', 'text' => 'Sewa mudah dan proses cepat. Terima kasih!', 'rating' => 5],
                        ];
                    ?>

                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-index="<?php echo e($i); ?>" data-img="<?php echo e($c['img']); ?>" data-username="<?php echo e($c['username']); ?>" data-name="<?php echo e($c['name']); ?>" data-text="<?php echo e($c['text']); ?>" data-rating="<?php echo e($c['rating']); ?>" class="testimonial-thumb flex-shrink-0 w-48 sm:w-44 md:w-40 p-3 rounded-xl border border-gray-100 bg-white hover:shadow-md focus:outline-none" style="min-width: 12rem;">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-200">
                                    <img src="<?php echo e(asset('assets/'.$c['img'])); ?>" alt="<?php echo e($c['name']); ?>" class="w-full h-full object-cover">
                                </div>
                                <div class="text-left">
                                    <div class="font-semibold text-sm"><?php echo e($c['name']); ?></div>
                                    <div class="text-xs text-gray-500"><?php echo e(\Carbon\Carbon::parse($c['date'])->format('d M Y')); ?></div>
                                </div>
                            </div>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function initTestimonials(){
            const mainAvatar = document.getElementById('mainAvatar');
            const mainUsername = document.getElementById('mainUsername');
            const mainName = document.getElementById('mainName');
            const mainText = document.getElementById('mainText');
            const mainRating = document.getElementById('mainRating');

            // re-query thumbs when init runs to ensure elements exist
            const thumbs = Array.from(document.querySelectorAll('.testimonial-thumb'));

            if (!thumbs.length) return;

            // Build client data from thumbnails to ensure consistency
            const clients = thumbs.map(btn => ({
                img: btn.dataset.img || '',
                username: btn.dataset.username || '',
                name: btn.dataset.name || '',
                text: btn.dataset.text || '',
                rating: parseInt(btn.dataset.rating) || 5
            }));

            function renderStars(container, count) {
                if (!container) return;
                container.innerHTML = '';
                for (let i = 0; i < 5; i++) {
                    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svg.setAttribute('viewBox', '0 0 20 20');
                    svg.setAttribute('class', 'w-5 h-5 mx-0.5');
                    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    path.setAttribute('d', 'M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.286 3.957c.3.921-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0l-3.37 2.449c-.784.57-1.838-.197-1.539-1.118l1.286-3.957a1 1 0 00-.364-1.118L2.012 9.384c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.957z');
                    svg.appendChild(path);
                    if (i < count) {
                        svg.classList.add('text-yellow-400', 'fill-current');
                    } else {
                        svg.classList.add('text-gray-200', 'fill-current');
                    }
                    container.appendChild(svg);
                }
            }

            let current = 0;
            let autoplayTimer = null;

            function setActive(index, {skipAutoplayReset = false} = {}) {
                index = (index + clients.length) % clients.length;
                current = index;
                const c = clients[index];
                const btn = thumbs[index];
                if (!c || !btn) return;

                // Prefer the actual thumbnail img src (full URL) to avoid path concat issues
                const thumbImg = btn.querySelector('img');
                const imgSrc = thumbImg ? thumbImg.src : (c.img ? (`<?php echo e(asset('assets/')); ?>` + c.img) : '');

                if (mainAvatar && imgSrc) mainAvatar.src = imgSrc;
                if (mainUsername) mainUsername.textContent = (c.username || '').replace('@','');
                if (mainName) mainName.textContent = c.name || '';
                if (mainText) mainText.textContent = c.text || '';
                if (mainRating) renderStars(mainRating, c.rating || 5);

                thumbs.forEach(t => t.classList.remove('bg-orange-400','text-white','shadow-md'));
                btn.classList.add('bg-orange-400','text-white','shadow-md');

                if (!skipAutoplayReset) {
                    resetAutoplay();
                }
            }

            thumbs.forEach((t, idx) => {
                t.addEventListener('click', (e) => {
                    e.preventDefault();
                    setActive(idx);
                });
            });

            // initialize
            setActive(0, {skipAutoplayReset: true});
            startAutoplay();
        })();
    </script>
</section><?php /**PATH C:\Nnesa\webRentify\resources\views/partials/testimonials.blade.php ENDPATH**/ ?>