<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Vehicle $vehicle)
    {
        return view('booking.create', compact('vehicle'));
    }

    public function store(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);

        $totalDays  = $start->diffInDays($end) + 1;
        $totalPrice = $totalDays * $vehicle->price_per_day;

        Booking::create([
            'user_id'     => auth()->id(),
            'vehicle_id'  => $vehicle->id,
            'start_date'  => $start,
            'end_date'    => $end,
            'total_days'  => $totalDays,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Booking berhasil dibuat!');
    }
}
