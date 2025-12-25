@extends('layouts.main')

@section('title', 'Edit Vehicle')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Admin Navbar -->
    <nav class="bg-gray-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold">Rentify Admin</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-400 transition">Dashboard</a>
                    <a href="{{ route('admin.orders.list') }}" class="hover:text-blue-400 transition">Orders</a>
                    <a href="{{ route('admin.vehicles.list') }}" class="text-blue-400">Vehicles</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded transition">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <a href="{{ route('admin.vehicles.list') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">&larr; Back to Vehicles</a>

        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold mb-6">Edit Vehicle</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.vehicles.update', $vehicle->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
                        <input type="text" name="brand" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ $vehicle->brand }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Model</label>
                        <input type="text" name="model" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ $vehicle->model }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Plate Number</label>
                        <input type="text" name="plate_number" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ $vehicle->plate_number }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Year</label>
                        <input type="number" name="year" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ $vehicle->year }}" min="1990" max="2100" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Price Per Day (Rp)</label>
                        <input type="number" name="price_per_day" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ $vehicle->price_per_day }}" min="0" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                            <option value="available" @selected($vehicle->status === 'available')>Available</option>
                            <option value="rented" @selected($vehicle->status === 'rented')>Rented</option>
                            <option value="maintenance" @selected($vehicle->status === 'maintenance')>Maintenance</option>
                        </select>
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                        Update Vehicle
                    </button>
                    <a href="{{ route('admin.vehicles.list') }}" class="px-8 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
