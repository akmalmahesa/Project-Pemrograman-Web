@extends('layouts.main')

@section('title', 'Admin Dashboard')

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
                    <a href="{{ route('admin.vehicles.list') }}" class="hover:text-blue-400 transition">Vehicles</a>
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

        <h2 class="text-3xl font-bold mb-8">Admin Dashboard</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Total Bookings</div>
                <div class="text-4xl font-bold text-blue-600">{{ $totalBookings }}</div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Pending Orders</div>
                <div class="text-4xl font-bold text-yellow-600">{{ $pendingBookings }}</div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Total Vehicles</div>
                <div class="text-4xl font-bold text-green-600">{{ $totalVehicles }}</div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-gray-500 text-sm font-semibold uppercase mb-2">Total Users</div>
                <div class="text-4xl font-bold text-purple-600">{{ $totalUsers }}</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('admin.orders.list') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-blue-50 transition">
                    <div class="font-semibold text-blue-600">View All Orders</div>
                    <p class="text-sm text-gray-600">Accept or reject pending bookings</p>
                </a>
                <a href="{{ route('admin.vehicles.list') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-green-50 transition">
                    <div class="font-semibold text-green-600">Manage Vehicles</div>
                    <p class="text-sm text-gray-600">Add, edit or delete vehicles</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
