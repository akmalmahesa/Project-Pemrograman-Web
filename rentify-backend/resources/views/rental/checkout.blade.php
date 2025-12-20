@extends('layouts.rental', ['step' => 3])

@section('title', 'Checkout Pembayaran')

@section('rental_content')
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white shadow rounded-2xl p-6">

            <h3 class="text-lg font-semibold text-gray-800 mb-4">Metode Pembayaran</h3>

            <form id="paymentForm" class="space-y-6" method="POST" action="{{ route('rental.confirmation') }}">
                @csrf
                <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-500 transition">
                    <label class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="payment" value="bank" class="accent-blue-600" checked>
                            <div>
                                <p class="font-semibold text-gray-800">Transfer Bank</p>
                                <p class="text-sm text-gray-500">BNI, BCA, Mandiri, BRI</p>
                            </div>
                        </div>
                        <img src="{{ asset('assets/bank.png') }}" alt="Bank" class="h-6">
                    </label>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-500 transition">
                    <label class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="payment" value="ewallet" class="accent-blue-600">
                            <div>
                                <p class="font-semibold text-gray-800">E-Wallet</p>
                                <p class="text-sm text-gray-500">GoPay, OVO, Dana, ShopeePay</p>
                            </div>
                        </div>
                        <img src="{{ asset('assets/ewallet.webp') }}" alt="E-Wallet" class="h-6">
                    </label>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-500 transition">
                    <label class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="payment" value="card" class="accent-blue-600">
                            <div>
                                <p class="font-semibold text-gray-800">Kartu Kredit / Debit</p>
                                <p class="text-sm text-gray-500">Visa, MasterCard</p>
                            </div>
                        </div>
                        <img src="https://upload.wikimedia.com/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa"
                            class="h-6">
                    </label>
                </div>

                <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-500 transition">
                    <label class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="payment" value="cod" class="accent-blue-600">
                            <div>
                                <p class="font-semibold text-gray-800">Bayar di Tempat</p>
                                <p class="text-sm text-gray-500">Pembayaran dilakukan saat kendaraan diterima</p>
                            </div>
                        </div>
                        <img src="{{ asset('assets/cod.png') }}" alt="COD" class="h-6 opacity-80">
                    </label>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Catatan untuk penyewaan</label>
                    <textarea rows="3" placeholder="Tambahkan catatan khusus (opsional)"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                </div>

                <div class="flex justify-between mt-8">
                    <a href="{{ route('rental.detail') }}"
                        class="px-6 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                        Kembali ke Detail
                    </a>
                    <button type="submit"
                        class="px-6 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600">
                        Konfirmasi Pembayaran
                    </button>
                </div>

            </form>
        </div>

        <div class="bg-white shadow rounded-2xl p-6 h-fit">

            <h3 class="font-semibold text-gray-800 mb-4">Ringkasan Pembayaran</h3>
            <div class="flex items-center gap-4 mb-4">
                <img src="{{ asset('assets/civic.png') }}" alt="Honda Civic" class="w-24 rounded-lg">
                <div>
                    <h4 class="font-semibold text-gray-800">Honda Civic</h4>
                    <p class="text-sm text-gray-500">Setiabudi, Jakarta Selatan</p>
                    <a href="{{ route('kendaraan.detail') }}" class="text-sm text-blue-600 hover:underline">Lihat Detail Mobil</a>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4 text-sm space-y-1 mb-6">
                <div class="flex justify-between"><span>Tarif Sewa (1 day)</span><span>Rp800k</span></div>
                <div class="flex justify-between"><span>Ongkos Pengiriman</span><span>Rp50k</span></div>
                <div class="flex justify-between"><span>Kupon Diskon</span><span>-Rp50k</span></div>
                <div class="border-t border-gray-200"></div>
                <div class="flex justify-between font-semibold text-gray-800"><span>Total Bayar</span><span>Rp800k</span></div>
            </div>

            <h4 class="font-semibold text-gray-800 mb-2">Detail Pengantaran</h4>
            <p class="text-sm text-gray-600">Jl. Sutan Syahrir, Pd Aren, Tangerang Selatan</p>
            <p class="text-sm text-gray-500">07/07/2025 - 07:00</p>

            <h4 class="font-semibold text-gray-800 mt-4 mb-2">Detail Pengembalian</h4>
            <p class="text-sm text-gray-600">Setiabudi, Jakarta Selatan</p>
            <p class="text-sm text-gray-500">07/08/2025 - 19:00</p>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const form = document.getElementById('paymentForm');
        form.addEventListener('submit', (e) => {
            // Note: We prevent default submit to simulate client side validation/alert
            e.preventDefault(); 
            alert('Pembayaran dikonfirmasi! Pesanan kamu sedang diproses 🚗');
            // In a real app, this would redirect on successful server response
            window.location.href = "{{ route('rental.confirmation') }}";
        });
    </script>
@endsection