@extends('layouts.rental', ['step' => 2])

@section('title', 'Detail Penyewa - Sewa Kendaraan')

@section('rental_content')
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- LEFT COLUMN (65%) - Main Form Content -->
    <div class="lg:col-span-8">

        <!-- BILLING INFO CARD -->
        <div class="bg-white shadow-lg rounded-2xl p-8 mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-user-check text-blue-600 mr-3"></i>
                Informasi Penagihan
            </h2>

            <form method="POST" action="{{ route('rental.checkout', $vehicle->id) }}" class="space-y-6" id="detailForm">
                @csrf

                {{-- DATA DARI STEP 1 --}}
                <input type="hidden" name="pickup_location" value="{{ $data['pickup_location'] }}">
                <input type="hidden" name="return_location" value="{{ $data['return_location'] }}">
                <input type="hidden" name="start_date" value="{{ $data['start_date'] }}">
                <input type="hidden" name="end_date" value="{{ $data['end_date'] }}">
                <input type="hidden" name="delivery_method" value="{{ $data['delivery_method'] }}">
                <input type="hidden" name="delivery_zone" value="{{ $data['delivery_zone'] ?? '' }}">
                <input type="hidden" name="delivery_address" value="{{ $data['delivery_address'] ?? '' }}">

                <!-- Row 1: Nama Depan & Nama Belakang -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Depan</label>
                        <input name="first_name" required placeholder="Masukkan nama depan"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Belakang</label>
                        <input name="last_name" required placeholder="Masukkan nama belakang"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                </div>

                <!-- Row 2: Jumlah Penumpang & Tipe Pengemudi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Penumpang</label>
                        <select name="passengers" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="">Pilih jumlah penumpang</option>
                            <option value="1">1 Penumpang</option>
                            <option value="2">2 Penumpang</option>
                            <option value="3">3 Penumpang</option>
                            <option value="4">4 Penumpang</option>
                            <option value="5">5 Penumpang</option>
                            <option value="6">6 Penumpang</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Pengemudi</label>
                        <select name="driver_type" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="">Pilih tipe pengemudi</option>
                            <option value="saya_sendiri">Saya Sendiri</option>
                            <option value="disediakan_rental">Disediakan Rental</option>
                        </select>
                    </div>
                </div>

                <!-- Row 3: Alamat -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                    <input name="address" placeholder="Masukkan alamat lengkap"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>

                <!-- Row 4: Provinsi, Kota, Kabupaten -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
                        <input name="province" placeholder="Nama Provinsi"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kota</label>
                        <input name="city" placeholder="Nama Kota"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten</label>
                        <input name="district" placeholder="Nama Kabupaten"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                </div>

                <!-- Row 5: Email & Telepon -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input name="email" type="email" required placeholder="nama@email.com"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                        <input name="phone" placeholder="Nomor telepon aktif"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between gap-4 mt-8">
                    <a href="{{ route('rental.location', $vehicle->id) }}"
                       class="px-8 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition flex items-center gap-2 shadow-lg">
                        <i class="fas fa-arrow-right"></i> Lanjut ke Pembayaran
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
                    @if($vehicle->image)
                        <img src="{{ asset('assets/' . $vehicle->image) }}" alt="{{ $vehicle->name }}" class="w-full h-full object-cover">
                    @else
                        <i class="fas fa-car text-6xl text-gray-400"></i>
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ $vehicle->name }}</h3>
                <p class="text-gray-600 text-sm mt-1">{{ ucfirst($vehicle->type) }}</p>
            </div>

            <!-- Booking Details -->
            <div class="space-y-3 pb-6 border-b border-gray-200 mb-6 text-sm">
                <div>
                    <p class="text-gray-600">Metode Pengambilan</p>
                    <p class="font-semibold text-gray-900">{{ $data['delivery_method'] === 'delivery' ? 'Pengiriman' : 'Jemput Sendiri' }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Tanggal Jemput</p>
                    <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $data['start_date'])->format('d M Y, H:i') }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Tanggal Kembali</p>
                    <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $data['end_date'])->format('d M Y, H:i') }}</p>
                </div>
            </div>

            <!-- Price Breakdown -->
            <div class="space-y-4 pb-6 border-b border-gray-200 mb-6">
                <h4 class="font-semibold text-gray-900">Rincian Harga</h4>
                
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Tarif Sewa</span>
                    <span class="font-semibold text-gray-900">Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
                </div>

                @if($data['delivery_method'] === 'delivery')
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Ongkos Pengiriman</span>
                        <span class="font-semibold text-gray-900">Rp{{ number_format($deliveryFee, 0, ',', '.') }}</span>
                    </div>
                @else
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Ongkos Pengiriman</span>
                        <span class="font-semibold text-green-600">Gratis</span>
                    </div>
                @endif

                @php
                    $driverFee = (($data['driver_type'] ?? null) === 'disediakan_rental') ? 250000 : 0;
                @endphp

                @if($driverFee > 0)
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Biaya Sopir</span>
                        <span class="font-semibold text-gray-900">Rp{{ number_format($driverFee, 0, ',', '.') }}</span>
                    </div>
                @endif
            </div>

            <!-- Total -->
            <div class="flex justify-between text-lg font-bold mb-6">
                <span class="text-gray-900">Total Harga</span>
                <span class="text-green-600">
                    @php
                        $total = $totalPrice + $deliveryFee + $driverFee;
                    @endphp
                    Rp{{ number_format($total, 0, ',', '.') }}
                </span>
            </div>

            <!-- Info Message -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                <p class="text-sm text-blue-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    Lanjutkan ke tahap pembayaran
                </p>
            </div>
        </div>
    </div>

</div>

@endsection
