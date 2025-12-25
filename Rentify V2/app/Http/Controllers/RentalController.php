<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalController extends Controller
{
    /**
     * JAKARTA DELIVERY ZONES & DISTANCES (km from South Jakarta Office)
     * Format: 'Zone Name' => distance_km
     */
    private const DELIVERY_ZONES = [
        'south_jakarta' => 0,       // Free delivery
        'east_jakarta' => 15,
        'west_jakarta' => 20,
        'north_jakarta' => 25,
        'central_jakarta' => 10,
        'bogor' => 50,
        'depok' => 30,
        'tangerang' => 35,
        'bekasi' => 45,
    ];

    private const DELIVERY_RATE_PER_KM = 10000;  // Rp 10,000 per km

    /**
     * Calculate delivery fee based on zone
     * 
     * @param string $zone Zone identifier (key from DELIVERY_ZONES)
     * @return int Delivery fee in Rupiah
     */
    public function calculateDeliveryFee($zone = 'south_jakarta')
    {
        if ($zone === 'self_pickup' || $zone === 'south_jakarta') {
            return 0;
        }

        $distance = self::DELIVERY_ZONES[$zone] ?? 0;
        return $distance * self::DELIVERY_RATE_PER_KM;
    }

    /**
     * Map zone names for dropdown display
     */
    public static function getDeliveryZones()
    {
        return [
            'self_pickup' => 'Ambil Sendiri (Gratis)',
            'south_jakarta' => 'Jakarta Selatan (Gratis)',
            'central_jakarta' => 'Jakarta Pusat (Rp 100.000)',
            'east_jakarta' => 'Jakarta Timur (Rp 150.000)',
            'west_jakarta' => 'Jakarta Barat (Rp 200.000)',
            'north_jakarta' => 'Jakarta Utara (Rp 250.000)',
            'bogor' => 'Bogor (Rp 500.000)',
            'depok' => 'Depok (Rp 300.000)',
            'tangerang' => 'Tangerang (Rp 350.000)',
            'bekasi' => 'Bekasi (Rp 450.000)',
        ];
    }

    /**
     * STEP 1 — LOKASI & WAKTU
     */
    public function location(Vehicle $vehicle)
    {
        abort_if($vehicle->status !== 'available', 403, 'Kendaraan sedang disewa');

        $deliveryZones = self::getDeliveryZones();

        return view('rental.location', compact('vehicle', 'deliveryZones'));
    }

    /**
     * STEP 2 — DETAIL PENYEWA (POST)
     */
    public function detail(Request $request, Vehicle $vehicle)
    {
        abort_if($vehicle->status !== 'available', 403, 'Kendaraan sedang disewa');

        $validated = $request->validate([
            'pickup_location' => 'required|string',
            'return_location' => 'required|string',
            'start_date'      => 'required|date_format:Y-m-d\TH:i',
            'end_date'        => 'required|date_format:Y-m-d\TH:i|after:start_date',
            'delivery_method' => 'required|in:self_pickup,delivery',
            'delivery_zone'   => 'nullable|string',
            'delivery_address' => 'nullable|string',
            'use_same_address' => 'nullable|boolean',
        ]);

        // Calculate total days and price
        $start = Carbon::createFromFormat('Y-m-d\TH:i', $validated['start_date']);
        $end = Carbon::createFromFormat('Y-m-d\TH:i', $validated['end_date']);
        $totalDays = $start->diffInDays($end);
        if ($totalDays == 0) $totalDays = 1;  // Minimum 1 day
        
        $totalPrice = $totalDays * $vehicle->price_per_day;
        
        // Calculate delivery fee
        $deliveryFee = 0;
        $deliveryZone = $validated['delivery_zone'] ?? 'self_pickup';
        if ($validated['delivery_method'] === 'delivery') {
            $deliveryFee = $this->calculateDeliveryFee($deliveryZone);
        }

        $deliveryZones = self::getDeliveryZones();

        return view('rental.detail', [
            'vehicle' => $vehicle,
            'data'    => $validated,
            'totalDays' => $totalDays,
            'totalPrice' => $totalPrice,
            'deliveryFee' => $deliveryFee,
            'deliveryZones' => $deliveryZones,
        ]);
    }

    /**
     * Calculate driver fee
     * 
     * @param string $driverType Driver type (saya_sendiri or disediakan_rental)
     * @return int Driver fee in Rupiah
     */
    private function calculateDriverFee($driverType = 'saya_sendiri')
    {
        if ($driverType === 'disediakan_rental') {
            return 250000;  // Rp 250,000 for provided driver
        }
        return 0;
    }

    /**
     * STEP 3 — CHECKOUT (POST - Display payment form)
     */
    public function checkout(Request $request, Vehicle $vehicle)
    {
        abort_if($vehicle->status !== 'available', 403, 'Kendaraan sedang disewa');

        $validated = $request->validate([
            'pickup_location' => 'required|string',
            'return_location' => 'required|string',
            'start_date'      => 'required|date_format:Y-m-d\TH:i',
            'end_date'        => 'required|date_format:Y-m-d\TH:i|after:start_date',
            'delivery_method' => 'required|in:self_pickup,delivery',
            'delivery_zone'   => 'nullable|string',
            'delivery_address' => 'nullable|string',
            'return_address'   => 'nullable|string',
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'phone'           => 'nullable|string',
            'email'           => 'required|email',
            'passengers'      => 'nullable|string',
            'driver_type'     => 'nullable|string',
            'address'         => 'nullable|string',
            'province'        => 'nullable|string',
            'city'            => 'nullable|string',
            'district'        => 'nullable|string',
        ]);

        // Calculate totals for display
        $start = Carbon::createFromFormat('Y-m-d\TH:i', $validated['start_date']);
        $end = Carbon::createFromFormat('Y-m-d\TH:i', $validated['end_date']);
        $totalDays = $start->diffInDays($end);
        if ($totalDays == 0) $totalDays = 1;
        
        $totalPrice = $totalDays * $vehicle->price_per_day;
        
        // Calculate delivery fee
        $deliveryFee = 0;
        $deliveryZone = $validated['delivery_zone'] ?? 'self_pickup';
        if ($validated['delivery_method'] === 'delivery') {
            $deliveryFee = $this->calculateDeliveryFee($deliveryZone);
        }

        // Calculate driver fee
        $driverFee = 0;
        if (!empty($validated['driver_type'])) {
            $driverFee = $this->calculateDriverFee($validated['driver_type']);
        }

        // Store billing data in session for the confirm step
        session(['rental.data' => $validated]);

        return view('rental.checkout', [
            'vehicle' => $vehicle,
            'data'    => $validated,
            'totalDays' => $totalDays,
            'totalPrice' => $totalPrice,
            'deliveryFee' => $deliveryFee,
            'driverFee' => $driverFee,
        ]);
    }

    /**
     * STEP 4 — CONFIRM (POST - Create booking)
     */
    public function confirm(Request $request, Vehicle $vehicle)
    {
        // Get billing data from session
        $data = session('rental.data');
        
        if (!$data) {
            return redirect()->route('rental.location', $vehicle->id)
                ->withErrors('Session expired. Please start over.');
        }

        $validated = $request->validate([
            'payment_method'  => 'nullable|string',
            'card_number'     => 'nullable|string',
            'card_holder'     => 'nullable|string',
            'card_expiry'     => 'nullable|string',
            'card_cvv'        => 'nullable|string',
            'save_card'       => 'nullable|boolean',
            'coupon_code'     => 'nullable|string',
        ]);

        return DB::transaction(function () use ($validated, $data, $vehicle) {

            $lockedVehicle = Vehicle::where('id', $vehicle->id)
                ->lockForUpdate()
                ->first();

            if ($lockedVehicle->status !== 'available') {
                abort(409, 'Kendaraan sudah disewa.');
            }

            $start = Carbon::createFromFormat('Y-m-d\TH:i', $data['start_date']);
            $end   = Carbon::createFromFormat('Y-m-d\TH:i', $data['end_date']);

            $totalDays  = $start->diffInDays($end);
            if ($totalDays == 0) $totalDays = 1;
            
            $totalPrice = $totalDays * $lockedVehicle->price_per_day;
            
            // Calculate delivery fee
            $deliveryFee = 0;
            if ($data['delivery_method'] === 'delivery') {
                $deliveryFee = $this->calculateDeliveryFee($data['delivery_zone'] ?? 'self_pickup');
            }

            // Calculate driver fee
            $driverFee = 0;
            if (!empty($data['driver_type'])) {
                $driverFee = $this->calculateDriverFee($data['driver_type']);
            }

            // Store billing info as JSON
            $billingInfo = [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address'],
                'city' => $data['city'],
                'province' => $data['province'],
                'district' => $data['district'],
                'payment_method' => $validated['payment_method'],
            ];

            $booking = Booking::create([
                'user_id'          => auth()->id(),
                'vehicle_id'       => $lockedVehicle->id,
                'start_date'       => $start,
                'end_date'         => $end,
                'total_days'       => $totalDays,
                'total_price'      => $totalPrice + $deliveryFee + $driverFee,
                'status'           => 'active',
                'delivery_method'  => $data['delivery_method'],
                'pickup_location'  => $data['pickup_location'],
                'delivery_address' => $data['delivery_address'] ?? null,
                'return_address'   => $data['return_address'] ?? $data['delivery_address'] ?? null,
                'delivery_fee'     => $deliveryFee,
                'billing_info'     => json_encode($billingInfo),
            ]);

            $lockedVehicle->update(['status' => 'rented']);

            // Clear session data
            session()->forget('rental.data');

            return redirect()->route('rental.confirmation', $booking->id);
        });
    }

    /**
     * STEP 4 — CONFIRMATION
     */
    public function confirmation(Booking $booking)
    {
        abort_if($booking->user_id !== auth()->id(), 403);

        return view('rental.confirmation', compact('booking'));
    }

    /**
     * VIEW BOOKING STATUS & DETAILS
     */
    public function status(Booking $booking)
    {
        abort_if($booking->user_id !== auth()->id(), 403);

        return view('rental.booking-status', compact('booking'));
    }
}
