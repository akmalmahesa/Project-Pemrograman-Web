@extends('layouts.main')

@section('title', 'Status Sewa')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <h2 class="text-2xl font-bold mb-6">Status & Riwayat Sewa</h2>

    @forelse($bookings as $booking)
        <div class="bg-white shadow rounded-xl p-6 mb-4 flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-lg">{{ $booking->vehicle->name }}</h3>
                <p class="text-sm text-gray-600">
                    {{ $booking->start_date }} → {{ $booking->end_date }}
                </p>
                <p class="text-sm mt-1">
                    Status:
                    <span class="font-semibold
                        {{ $booking->status === 'active' ? 'text-yellow-600' : 'text-green-600' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
            </div>

            <div class="text-right">
                <p class="font-bold text-blue-600 mb-2">
                    Rp{{ number_format($booking->total_price, 0, ',', '.') }}
                </p>

                @if($booking->status === 'active')
                    <form method="POST" action="{{ route('rental.complete', $booking->id) }}">
                        @csrf
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                            Selesaikan Sewa
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada riwayat sewa.</p>
    @endforelse

</div>
@endsection
