@extends('layouts.main')

@section('title', 'Booking Kendaraan')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">

    <h1 class="text-2xl font-bold mb-6">Booking Kendaraan</h1>

    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="font-semibold text-lg">{{ $vehicle->name }}</h2>
        <p class="text-gray-600">
            {{ $vehicle->type }} • {{ $vehicle->transmission ?? 'Automatic' }}
        </p>
        <p class="mt-2 font-bold text-blue-600">
            Rp{{ number_format($vehicle->price_per_day, 0, ',', '.') }} / hari
        </p>
    </div>

    <form method="POST" action="{{ route('booking.store', $vehicle->id) }}"
          class="bg-white rounded-xl shadow p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Tanggal Mulai</label>
            <input type="date" name="start_date"
                   class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Tanggal Selesai</label>
            <input type="date" name="end_date"
                   class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Konfirmasi Booking
        </button>
    </form>

</div>
@endsection
