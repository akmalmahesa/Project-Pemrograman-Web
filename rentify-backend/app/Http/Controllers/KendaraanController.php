<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class KendaraanController extends Controller
{
    // Halaman list kendaraan
    public function index(Request $request)
    {
        $query = Vehicle::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $vehicles = $query->get();

        return view('kendaraan.index', compact('vehicles'));
    }

    // Halaman detail kendaraan
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // kendaraan lain (dummy / rekomendasi)
        $vehicles = [
            [
                'name' => 'Honda Civic',
                'price' => '800k',
                'type' => 'Sedan',
                'trans' => 'Automatic',
                'image' => 'civic.png',
            ],
            [
                'name' => 'Toyota Alphard',
                'price' => '2,5jt',
                'type' => 'MPV',
                'trans' => 'Automatic',
                'image' => 'alphard.png',
            ],
            [
                'name' => 'Mitsubishi Xpander',
                'price' => '400k',
                'type' => 'SUV',
                'trans' => 'Automatic',
                'image' => 'xpander.png',
            ],
        ];

        return view('kendaraan.detail', [
            'nama'       => $vehicle->name,
            'harga'      => number_format($vehicle->price_per_day, 0, ',', '.'),
            'transmisi'  => $vehicle->transmission ?? 'Automatic',
            'vehicles'   => $vehicles,
        ]);
    }
}
