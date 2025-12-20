<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return Vehicle::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        return Vehicle::create([
            'name' => $request->name,
            'type' => $request->type,
            'price_per_day' => $request->price_per_day,
            'status' => 'available',
        ]);
    }
}
