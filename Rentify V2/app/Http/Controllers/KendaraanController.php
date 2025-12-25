<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::query()

            /**
             * =====================================
             * STATUS (JANGAN SAMPAI HILANG)
             * =====================================
             */
            ->whereIn('status', ['available', 'rented'])

            /**
             * =====================================
             * SEARCH (NAMA KENDARAAN)
             * =====================================
             */
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . trim($request->q) . '%');
            })

            /**
             * =====================================
             * TYPE / KATEGORI (🔥 FIX PALING AMAN)
             * =====================================
             * Apapun isi DB:
             * - Mobil / mobil / MOBIL
             * - Mobil SUV
             * - mobil keluarga
             */
            ->when($request->filled('type'), function ($query) use ($request) {
                // Map Indonesian UI values to database enum values
                $raw = trim($request->type);
                $lower = strtolower($raw);

                $map = [
                    'mobil' => 'car',
                    'motor' => 'motorcycle',
                    'sepeda' => 'bicycle',
                    // also accept english enum values
                    'car' => 'car',
                    'motorcycle' => 'motorcycle',
                    'bicycle' => 'bicycle',
                ];

                if (isset($map[$lower])) {
                    $query->where('type', $map[$lower]);
                } else {
                    // fallback to LIKE to support custom labels in DB
                    $query->where('type', 'LIKE', '%' . $raw . '%');
                }
            })

            /**
             * =====================================
             * PRICE FILTER
             * =====================================
             */
            ->when(
                $request->filled('max_price') && is_numeric($request->max_price),
                function ($query) use ($request) {
                    $query->where('price_per_day', '<=', (int) $request->max_price);
                }
            )

            /**
             * =====================================
             * RATING FILTER
             * =====================================
             */
            ->when(
                $request->filled('rating') && is_numeric($request->rating),
                function ($query) use ($request) {
                    $query->where('rating', '>=', (int) $request->rating);
                }
            )

            /**
             * =====================================
             * SORT
             * =====================================
             */
            ->orderBy('created_at', 'desc')
            ->get();

        return view('kendaraan.index', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        $isRented = $vehicle->status === 'rented';

        // fetch other cars of same category (car) excluding current
        $otherCars = Vehicle::where('type', $vehicle->type)
            ->where('id', '!=', $vehicle->id)
            ->where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // features (if you later add columns, you can replace this)
        $features = [
            'ABS',
            'Air Bags',
            'Steering Lock',
            'First Aid Kit',
            'Jumper Cables',
        ];

        return view('kendaraan.detail', compact('vehicle', 'isRented', 'otherCars', 'features'));
    }
}
