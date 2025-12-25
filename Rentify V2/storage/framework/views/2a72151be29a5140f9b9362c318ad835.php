

<?php $__env->startSection('title', 'Lokasi & Waktu Sewa'); ?>

<?php $__env->startSection('rental_content'); ?>
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
        <i class="fas fa-map-marker-alt text-blue-600 mr-3"></i>
        Pilih Lokasi & Waktu Sewa
    </h2>

    <form method="POST" action="<?php echo e(route('rental.detail', $vehicle->id)); ?>" class="space-y-6" id="locationForm">
        <?php echo csrf_field(); ?>

        <!-- Show validation errors -->
        <?php if($errors->any()): ?>
            <div class="bg-red-50 border-2 border-red-200 rounded-lg p-4 mb-4">
                <p class="font-semibold text-red-800 mb-2">⚠️ Terjadi kesalahan:</p>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- DELIVERY METHOD SECTION -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-shipping-fast text-blue-600 mr-2"></i>
                Metode Pengiriman
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Self Pickup Option -->
                <label class="relative flex items-center cursor-pointer group">
                    <input type="radio" name="delivery_method" value="self_pickup" checked
                           class="w-5 h-5 text-blue-600 cursor-pointer" id="selfPickup">
                    <div class="flex-1 ml-4 p-4 border-2 border-blue-200 rounded-lg group-hover:border-blue-400 group-hover:bg-white transition"
                         style="border-color: var(--pickup-border, rgb(191, 219, 254)); background-color: var(--pickup-bg, rgb(240, 249, 255));">
                        <p class="font-semibold text-gray-900">Ambil Sendiri</p>
                        <p class="text-sm text-green-600 font-medium">Gratis</p>
                        <p class="text-xs text-gray-600 mt-1">Ambil di kantor utama kami</p>
                    </div>
                </label>

                <!-- Delivery Option -->
                <label class="relative flex items-center cursor-pointer group">
                    <input type="radio" name="delivery_method" value="delivery"
                           class="w-5 h-5 text-green-600 cursor-pointer" id="deliveryOption">
                    <div class="flex-1 ml-4 p-4 border-2 border-gray-200 rounded-lg group-hover:border-green-300 group-hover:bg-green-50 transition"
                         style="border-color: rgb(229, 231, 235); background-color: rgb(249, 250, 251);">
                        <p class="font-semibold text-gray-900">Pengiriman</p>
                        <p class="text-sm text-gray-600">Biaya pengiriman <span class="delivery-fee-display font-medium text-green-600">Rp 0</span></p>
                        <p class="text-xs text-gray-600 mt-1">Kami antar ke lokasi Anda</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- DELIVERY DETAILS (Hidden by default) -->
        <div id="deliveryDetails" class="space-y-4 p-6 bg-green-50 border-2 border-green-200 rounded-2xl hidden">
            <h4 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-map-pin text-green-600 mr-2"></i>
                Detail Pengiriman
            </h4>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Zona Pengiriman</label>
                <select name="delivery_zone" id="deliveryZone" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                    <option value="">-- Pilih zona pengiriman --</option>
                    <?php $__currentLoopData = $deliveryZones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($zone !== 'self_pickup'): ?>
                            <option value="<?php echo e($zone); ?>"><?php echo e($label); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Pengiriman</label>
                <textarea id="deliveryAddress" name="delivery_address" placeholder="Masukkan alamat lengkap pengiriman"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                          rows="3"></textarea>
            </div>

            <label class="flex items-center gap-3 cursor-pointer p-3 bg-white rounded-lg border border-gray-200 hover:border-green-300 transition">
                <input type="checkbox" name="use_same_address" id="useSameAddress" class="w-4 h-4 text-green-600 rounded cursor-pointer">
                <span class="text-sm text-gray-700">Gunakan alamat yang sama untuk pengembalian</span>
            </label>

            <div id="returnAddressField" class="hidden">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Pengembalian</label>
                <textarea id="returnAddress" name="return_address" placeholder="Masukkan alamat lengkap pengembalian"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                          rows="3"></textarea>
            </div>
        </div>

        <!-- SELF PICKUP FIELDS -->
        <div id="selfPickupFields">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Jemput</label>
                    <select id="pickupLocationDropdown" name="pickup_location"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        <option value="">Pilih lokasi jemput</option>
                        <option value="Jl. Halimun, Setiabudi, Jakarta Selatan">Jl. Halimun, Setiabudi, Jakarta Selatan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal & Waktu Mulai</label>
                    <input type="datetime-local" id="selfPickupStartDate" name="start_date"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Pengembalian</label>
                    <select id="returnLocationDropdown" name="return_location"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        <option value="">Pilih lokasi pengembalian</option>
                        <option value="Jl. Halimun, Setiabudi, Jakarta Selatan">Jl. Halimun, Setiabudi, Jakarta Selatan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal & Waktu Kembali</label>
                    <input type="datetime-local" id="selfPickupEndDate" name="end_date"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
            </div>
        </div>

        <!-- DELIVERY FIELDS (Hidden by default) -->
        <div id="deliveryFields" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal & Waktu Mulai</label>
                    <input type="datetime-local" id="deliveryStartDate" name="start_date_delivery"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal & Waktu Kembali</label>
                    <input type="datetime-local" id="deliveryEndDate" name="end_date_delivery"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-sm">
            <p class="text-blue-900 font-semibold mb-2">
                <i class="fas fa-info-circle mr-2"></i>Tips Memilih Waktu
            </p>
            <ul class="text-blue-800 space-y-1 list-disc list-inside">
                <li>Pastikan waktu kembali lebih lama dari waktu jemput</li>
                <li>Waktu hitung otomatis dari jam jemput hingga jam pengembalian</li>
                <li>Biaya berdasarkan hitungan per hari penuh</li>
            </ul>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between gap-4 pt-6 border-t border-gray-200">
            <a href="<?php echo e(route('kendaraan.detail', $vehicle->id)); ?>"
               class="px-8 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <button type="submit"
                    class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition flex items-center gap-2 shadow-lg">
                <i class="fas fa-arrow-right"></i> Lanjut ke Checkout
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('locationForm');
    const selfPickupRadio = document.getElementById('selfPickup');
    const deliveryRadio = document.getElementById('deliveryOption');
    const deliveryDetails = document.getElementById('deliveryDetails');
    const deliveryZoneSelect = document.getElementById('deliveryZone');
    const useSameAddress = document.getElementById('useSameAddress');
    const returnAddressField = document.getElementById('returnAddressField');
    const deliveryFeeDisplay = document.querySelector('.delivery-fee-display');
    
    // Get field groups
    const selfPickupFields = document.getElementById('selfPickupFields');
    const deliveryFields = document.getElementById('deliveryFields');
    
    const deliveryZones = {
        'south_jakarta': 0,
        'east_jakarta': 150000,
        'west_jakarta': 200000,
        'north_jakarta': 250000,
        'central_jakarta': 100000,
        'bogor': 500000,
        'depok': 300000,
        'tangerang': 350000,
        'bekasi': 450000,
    };
    
    function toggleDeliveryDetails() {
        if (deliveryRadio.checked) {
            // Show delivery UI
            deliveryDetails.classList.remove('hidden');
            deliveryFields.classList.remove('hidden');
            selfPickupFields.classList.add('hidden');
            
            // Disable self-pickup fields so they won't be validated
            document.getElementById('pickupLocationDropdown').disabled = true;
            document.getElementById('returnLocationDropdown').disabled = true;
            document.getElementById('selfPickupStartDate').disabled = true;
            document.getElementById('selfPickupEndDate').disabled = true;
            
            // Enable delivery fields
            document.getElementById('deliveryZone').disabled = false;
            document.getElementById('deliveryAddress').disabled = false;
            document.getElementById('deliveryStartDate').disabled = false;
            document.getElementById('deliveryEndDate').disabled = false;
            
            updateDeliveryFee();
        } else {
            // Show self-pickup UI
            deliveryDetails.classList.add('hidden');
            selfPickupFields.classList.remove('hidden');
            deliveryFields.classList.add('hidden');
            
            // Enable self-pickup fields
            document.getElementById('pickupLocationDropdown').disabled = false;
            document.getElementById('returnLocationDropdown').disabled = false;
            document.getElementById('selfPickupStartDate').disabled = false;
            document.getElementById('selfPickupEndDate').disabled = false;
            
            // Disable delivery fields so they won't be validated
            document.getElementById('deliveryZone').disabled = true;
            document.getElementById('deliveryAddress').disabled = true;
            document.getElementById('deliveryStartDate').disabled = true;
            document.getElementById('deliveryEndDate').disabled = true;
        }
    }
    
    function updateDeliveryFee() {
        const zone = deliveryZoneSelect.value;
        const fee = deliveryZones[zone] || 0;
        deliveryFeeDisplay.textContent = 'Rp ' + fee.toLocaleString('id-ID');
    }
    
    function toggleReturnAddress() {
        if (useSameAddress.checked) {
            returnAddressField.classList.add('hidden');
        } else {
            returnAddressField.classList.remove('hidden');
        }
    }
    
    // Form validation before submit
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        console.log('=== FORM VALIDATION ===');
        
        if (selfPickupRadio.checked) {
            // Validate self-pickup mode
            const pickup = document.getElementById('pickupLocationDropdown').value;
            const returnLoc = document.getElementById('returnLocationDropdown').value;
            const start = document.getElementById('selfPickupStartDate').value;
            const end = document.getElementById('selfPickupEndDate').value;
            
            console.log('Self-Pickup:', {pickup, returnLoc, start, end});
            
            if (!pickup) {
                alert('❌ Mohon pilih lokasi jemput');
                return false;
            }
            if (!returnLoc) {
                alert('❌ Mohon pilih lokasi pengembalian');
                return false;
            }
            if (!start) {
                alert('❌ Mohon isi tanggal mulai');
                return false;
            }
            if (!end) {
                alert('❌ Mohon isi tanggal kembali');
                return false;
            }
            if (new Date(end) <= new Date(start)) {
                alert('❌ Tanggal kembali harus lebih besar dari tanggal mulai');
                return false;
            }
            
            // Copy values to the correct name attributes for submission
            document.getElementById('selfPickupStartDate').setAttribute('name', 'start_date');
            document.getElementById('selfPickupEndDate').setAttribute('name', 'end_date');
            
        } else if (deliveryRadio.checked) {
            // Validate delivery mode
            const zone = document.getElementById('deliveryZone').value;
            const address = document.getElementById('deliveryAddress').value.trim();
            const start = document.getElementById('deliveryStartDate').value;
            const end = document.getElementById('deliveryEndDate').value;
            
            console.log('Delivery:', {zone, address, start, end});
            
            if (!zone) {
                alert('❌ Mohon pilih zona pengiriman');
                return false;
            }
            if (!address) {
                alert('❌ Mohon isi alamat pengiriman');
                return false;
            }
            if (!start) {
                alert('❌ Mohon isi tanggal mulai');
                return false;
            }
            if (!end) {
                alert('❌ Mohon isi tanggal kembali');
                return false;
            }
            if (new Date(end) <= new Date(start)) {
                alert('❌ Tanggal kembali harus lebih besar dari tanggal mulai');
                return false;
            }
            
            // Set pickup/return locations to main office for delivery
            // Create hidden inputs for these
            const hiddenPickup = document.createElement('input');
            hiddenPickup.type = 'hidden';
            hiddenPickup.name = 'pickup_location';
            hiddenPickup.value = 'Jl. Halimun, Setiabudi, Jakarta Selatan';
            form.appendChild(hiddenPickup);
            
            const hiddenReturn = document.createElement('input');
            hiddenReturn.type = 'hidden';
            hiddenReturn.name = 'return_location';
            hiddenReturn.value = 'Jl. Halimun, Setiabudi, Jakarta Selatan';
            form.appendChild(hiddenReturn);
            
            // Copy date values to correct name attributes
            document.getElementById('deliveryStartDate').setAttribute('name', 'start_date');
            document.getElementById('deliveryEndDate').setAttribute('name', 'end_date');
        }
        
        console.log('✓ Validation passed, submitting form...');
        console.log('Form data:', new FormData(form));
        
        // Submit the form
        form.submit();
    });
    
    // Event listeners
    selfPickupRadio.addEventListener('change', toggleDeliveryDetails);
    deliveryRadio.addEventListener('change', toggleDeliveryDetails);
    deliveryZoneSelect.addEventListener('change', updateDeliveryFee);
    useSameAddress.addEventListener('change', toggleReturnAddress);
    
    // Initialize on page load
    toggleDeliveryDetails();
    toggleReturnAddress();
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.rental', ['step' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nnesa\webRentify\resources\views/rental/location.blade.php ENDPATH**/ ?>