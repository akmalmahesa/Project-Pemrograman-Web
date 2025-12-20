<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Vehicle;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Simpan booking kendaraan (API)
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        if ($vehicle->status !== 'available') {
            return response()->json([
                'message' => 'Kendaraan sedang disewa'
            ], 400);
        }

        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);
        $days  = $start->diffInDays($end) + 1;

        DB::beginTransaction();

        try {
            $booking = Booking::create([
                'user_id'      => $user->id,
                'vehicle_id'   => $vehicle->id,
                'start_date'   => $start,
                'end_date'     => $end,
                'duration'     => $days,
                'total_price'  => $days * $vehicle->price_per_day,
                'status'       => 'confirmed',
            ]);

            $vehicle->update([
                'status' => 'rented'
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Booking berhasil',
                'booking' => $booking,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Booking gagal',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
