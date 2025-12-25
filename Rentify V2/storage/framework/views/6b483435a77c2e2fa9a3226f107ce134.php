

<?php $__env->startSection('title', 'Pembayaran - Sewa Kendaraan'); ?>

<?php $__env->startSection('rental_content'); ?>
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- LEFT COLUMN (65%) - Payment Form -->
    <div class="lg:col-span-8">

        <!-- PAYMENT METHOD CARD -->
        <div class="bg-white shadow-lg rounded-2xl p-8 mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-credit-card text-green-600 mr-3"></i>
                Metode Pembayaran
            </h2>

            <form method="POST" action="<?php echo e(route('rental.confirm', $vehicle->id)); ?>" id="paymentForm">
                <?php echo csrf_field(); ?>

                <!-- Payment Method Tabs -->
                <div class="flex gap-3 mb-8 border-b border-gray-200 overflow-x-auto" role="tablist">
                    <button type="button" data-tab="virtual-account" 
                            class="payment-tab active px-6 py-3 border-b-2 border-blue-600 text-blue-600 font-semibold focus:outline-none transition whitespace-nowrap">
                        <i class="fas fa-university mr-2"></i>Virtual Account
                    </button>
                    <button type="button" data-tab="credit-card" 
                            class="payment-tab px-6 py-3 border-b-2 border-transparent text-gray-600 font-semibold hover:text-gray-900 focus:outline-none transition whitespace-nowrap">
                        <i class="fas fa-credit-card mr-2"></i>Kartu Kredit/Debit
                    </button>
                    <button type="button" data-tab="qris" 
                            class="payment-tab px-6 py-3 border-b-2 border-transparent text-gray-600 font-semibold hover:text-gray-900 focus:outline-none transition whitespace-nowrap">
                        <i class="fas fa-qrcode mr-2"></i>QRIS
                    </button>
                </div>

                <!-- Virtual Account Tab Content -->
                <div id="virtual-account" class="payment-content block">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <h3 class="font-semibold text-blue-900 mb-3">
                            <i class="fas fa-info-circle mr-2"></i>Petunjuk Virtual Account
                        </h3>
                        <ul class="text-sm text-blue-800 space-y-2 list-disc list-inside">
                            <li>Silakan transfer ke nomor rekening yang akan diberikan setelah submit pesanan</li>
                            <li>Gunakan kode referensi booking Anda sebagai keterangan transfer</li>
                            <li>Konfirmasi pembayaran akan dikirim ke email Anda dalam 5 menit</li>
                        </ul>
                    </div>
                    <input type="hidden" name="payment_method" value="virtual_account" class="payment-method-input">
                </div>

                <!-- Credit Card Tab Content -->
                <div id="credit-card" class="payment-content hidden">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Kartu</label>
                            <input type="text" name="card_number" placeholder="0000 0000 0000 0000"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemegang Kartu</label>
                            <input type="text" name="card_holder" placeholder="Nama sesuai kartu"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Berlaku</label>
                                <input type="text" name="card_expiry" placeholder="MM/YY"
                                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">CVV</label>
                                <input type="text" name="card_cvv" placeholder="***"
                                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            </div>
                        </div>

                        <label class="flex items-center gap-3 mt-4 cursor-pointer">
                            <input type="checkbox" name="save_card" class="w-4 h-4 text-green-600 rounded">
                            <span class="text-sm text-gray-700">Simpan kartu untuk transaksi berikutnya</span>
                        </label>
                    </div>
                    <input type="hidden" name="payment_method" value="credit_card" class="payment-method-input">
                </div>

                <!-- QRIS Tab Content -->
                <div id="qris" class="payment-content hidden">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6 text-center">
                        <i class="fas fa-qrcode text-6xl text-green-600 mb-4"></i>
                        <h3 class="font-semibold text-green-900 mb-2">Scan QR Code</h3>
                        <p class="text-sm text-green-800 mb-4">QR Code akan ditampilkan setelah Anda mengkonfirmasi pesanan</p>
                        <p class="text-xs text-green-700">Gunakan aplikasi mobile banking atau e-wallet yang mendukung QRIS</p>
                    </div>
                    <input type="hidden" name="payment_method" value="qris" class="payment-method-input">
                </div>

                <!-- Coupon Section -->
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-6 mt-8">
                    <h3 class="font-semibold text-purple-900 mb-4">
                        <i class="fas fa-ticket-alt mr-2"></i>Kode Promo/Kupon
                    </h3>
                    <div class="flex gap-3">
                        <input type="text" name="coupon_code" placeholder="Masukkan kode promo"
                               class="flex-1 border border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <button type="button" class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
                            Terapkan
                        </button>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between gap-4 mt-8">
                    <a href="<?php echo e(route('rental.detail', $vehicle->id)); ?>"
                       class="px-8 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit"
                            class="px-8 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition flex items-center gap-2 shadow-lg">
                        <i class="fas fa-check-circle"></i> Konfirmasi Pembayaran
                    </button>
                </div>

            </form>
        </div>

    </div>

    <!-- RIGHT COLUMN (35%) - Order Details Sidebar (Sticky) -->
    <div class="lg:col-span-4">
        <div class="bg-white shadow-lg rounded-2xl p-6 sticky top-24 max-h-fit">
            <!-- Vehicle Card -->
            <div class="border-b border-gray-200 pb-6 mb-6">
                <div class="bg-gray-200 h-40 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                    <?php if($vehicle->image): ?>
                        <img src="<?php echo e(asset('assets/' . $vehicle->image)); ?>" alt="<?php echo e($vehicle->name); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <i class="fas fa-car text-6xl text-gray-400"></i>
                    <?php endif; ?>
                </div>
                <h3 class="text-xl font-bold text-gray-900"><?php echo e($vehicle->name); ?></h3>
                <p class="text-gray-600 text-sm mt-1"><?php echo e(ucfirst($vehicle->type)); ?></p>
            </div>

            <!-- Booking Details -->
            <div class="space-y-3 pb-6 border-b border-gray-200 mb-6 text-sm">
                <div>
                    <p class="text-gray-600">Metode Pengambilan</p>
                    <p class="font-semibold text-gray-900"><?php echo e($data['delivery_method'] === 'delivery' ? 'Pengiriman' : 'Jemput Sendiri'); ?></p>
                </div>
                <div>
                    <p class="text-gray-600">Tanggal Jemput</p>
                    <p class="font-semibold text-gray-900"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $data['start_date'])->format('d M Y, H:i')); ?></p>
                </div>
                <div>
                    <p class="text-gray-600">Tanggal Kembali</p>
                    <p class="font-semibold text-gray-900"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $data['end_date'])->format('d M Y, H:i')); ?></p>
                </div>
            </div>

            <!-- Price Breakdown -->
            <div class="space-y-4 pb-6 border-b border-gray-200 mb-6">
                <h4 class="font-semibold text-gray-900">Rincian Harga</h4>
                
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Tarif Sewa</span>
                    <span class="font-semibold text-gray-900">Rp<?php echo e(number_format($totalPrice, 0, ',', '.')); ?></span>
                </div>

                <?php if($data['delivery_method'] === 'delivery'): ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Ongkos Pengiriman</span>
                        <span class="font-semibold text-gray-900">Rp<?php echo e(number_format($deliveryFee, 0, ',', '.')); ?></span>
                    </div>
                <?php else: ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Ongkos Pengiriman</span>
                        <span class="font-semibold text-green-600">Gratis</span>
                    </div>
                <?php endif; ?>

                <?php
                    $driverFee = (($data['driver_type'] ?? null) === 'disediakan_rental') ? 250000 : 0;
                ?>

                <?php if($driverFee > 0): ?>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Biaya Sopir</span>
                        <span class="font-semibold text-gray-900">Rp<?php echo e(number_format($driverFee, 0, ',', '.')); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Total -->
            <div class="flex justify-between text-lg font-bold mb-6">
                <span class="text-gray-900">Total Harga</span>
                <span class="text-green-600">
                    <?php
                        $total = $totalPrice + $deliveryFee + $driverFee;
                    ?>
                    Rp<?php echo e(number_format($total, 0, ',', '.')); ?>

                </span>
            </div>

            <!-- Order Summary Message -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                <p class="text-sm text-blue-800">
                    <i class="fas fa-lock mr-2"></i>
                    Transaksi Anda dilindungi dengan enkripsi SSL
                </p>
            </div>
        </div>
    </div>

</div>

<script>
    // Payment Method Tab Switching
    document.querySelectorAll('.payment-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const tabName = this.dataset.tab;
            
            // Remove active class from all tabs
            document.querySelectorAll('.payment-tab').forEach(t => {
                t.classList.remove('border-blue-600', 'text-blue-600');
                t.classList.add('border-transparent', 'text-gray-600');
            });
            
            // Hide all content
            document.querySelectorAll('.payment-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Activate current tab
            this.classList.remove('border-transparent', 'text-gray-600');
            this.classList.add('border-blue-600', 'text-blue-600');
            
            // Show current content
            document.getElementById(tabName).classList.remove('hidden');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.rental', ['step' => 3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/rental/checkout.blade.php ENDPATH**/ ?>