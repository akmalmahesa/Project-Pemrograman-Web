<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| API ROUTES
|--------------------------------------------------------------------------
*/

// ==================== AUTH (PUBLIC) ====================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ==================== PUBLIC DATA ====================
Route::get('/vehicles', [VehicleController::class, 'index']);

// ==================== PROTECTED (SANCTUM) ====================
Route::middleware('auth:sanctum')->group(function () {

    // Logout user
    Route::post('/logout', [AuthController::class, 'logout']);

    // Booking kendaraan
    Route::post('/bookings', [BookingController::class, 'store']);
});
