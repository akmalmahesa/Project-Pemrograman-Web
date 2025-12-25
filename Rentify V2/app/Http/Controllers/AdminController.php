<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $totalVehicles = Vehicle::count();
        $totalUsers = User::where('role', 'customer')->count();

        return view('admin.dashboard', compact('totalBookings', 'pendingBookings', 'totalVehicles', 'totalUsers'));
    }

    // ============ ORDERS MANAGEMENT ============

    public function ordersList()
    {
        $bookings = Booking::with('user', 'vehicle')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.orders.index', compact('bookings'));
    }

    public function orderDetail($id)
    {
        $booking = Booking::with('user', 'vehicle')->findOrFail($id);
        return view('admin.orders.detail', compact('booking'));
    }

    public function acceptOrder($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'accepted']);
        return redirect()->route('admin.orders.list')->with('success', 'Order accepted successfully');
    }

    public function rejectOrder($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'rejected']);
        return redirect()->route('admin.orders.list')->with('success', 'Order rejected successfully');
    }

    // ============ VEHICLES MANAGEMENT ============

    public function vehiclesList()
    {
        $vehicles = Vehicle::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function vehicleCreate()
    {
        return view('admin.vehicles.create');
    }

    public function vehicleStore(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:20|unique:vehicles',
            'year' => 'required|integer|min:1990|max:2100',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
        ]);

        Vehicle::create($validated);
        return redirect()->route('admin.vehicles.list')->with('success', 'Vehicle created successfully');
    }

    public function vehicleEdit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function vehicleUpdate(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:20|unique:vehicles,plate_number,' . $id,
            'year' => 'required|integer|min:1990|max:2100',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|in:available,rented,maintenance',
        ]);

        $vehicle->update($validated);
        return redirect()->route('admin.vehicles.list')->with('success', 'Vehicle updated successfully');
    }

    public function vehicleDelete($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('admin.vehicles.list')->with('success', 'Vehicle deleted successfully');
    }
}
