@extends('layouts.main')

@section('title', 'Vehicles Management')

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
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Vehicles Management</h2>
            <a href="{{ route('admin.vehicles.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                + Add Vehicle
            </a>
        </div>

        <!-- Vehicles Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left">Vehicle ID</th>
                        <th class="px-6 py-4 text-left">Brand & Model</th>
                        <th class="px-6 py-4 text-left">Plate Number</th>
                        <th class="px-6 py-4 text-left">Year</th>
                        <th class="px-6 py-4 text-left">Price/Day</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-semibold">#{{ $vehicle->id }}</td>
                            <td class="px-6 py-4">{{ $vehicle->brand }} {{ $vehicle->model }}</td>
                            <td class="px-6 py-4 font-mono text-sm">{{ $vehicle->plate_number }}</td>
                            <td class="px-6 py-4">{{ $vehicle->year }}</td>
                            <td class="px-6 py-4 font-semibold">Rp {{ number_format($vehicle->price_per_day, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    @if($vehicle->status === 'available') bg-green-100 text-green-800
                                    @elseif($vehicle->status === 'rented') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($vehicle->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                <form method="POST" action="{{ route('admin.vehicles.delete', $vehicle->id) }}" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No vehicles found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $vehicles->links() }}
        </div>
    </div>
</div>
@endsection
