<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'loginWeb'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'registerWeb'])->name('register.process');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logoutWeb'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| KENDARAAN (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/kendaraan', [KendaraanController::class, 'index'])
    ->name('kendaraan.index');

Route::get('/kendaraan/{vehicle}', [KendaraanController::class, 'show'])
    ->name('kendaraan.detail');

/*
|--------------------------------------------------------------------------
| RENTAL FLOW (AUTH ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // STEP 1 — LOKASI & WAKTU (GET)
    Route::get('/rental/{vehicle}/location', [RentalController::class, 'location'])
        ->name('rental.location');

    // STEP 2 — DETAIL PENYEWA (POST dari location)
    Route::post('/rental/{vehicle}/detail', [RentalController::class, 'detail'])
        ->name('rental.detail');

    // STEP 3 — CHECKOUT / PAYMENT (POST dari detail, displays payment form)
    Route::post('/rental/{vehicle}/checkout', [RentalController::class, 'checkout'])
        ->name('rental.checkout');

    // STEP 4 — CONFIRM & CREATE BOOKING (POST dari checkout)
    Route::post('/rental/{vehicle}/confirm', [RentalController::class, 'confirm'])
        ->name('rental.confirm');

    // STEP 5 — CONFIRMATION (GET)
    Route::get('/rental/confirmation/{booking}', [RentalController::class, 'confirmation'])
        ->name('rental.confirmation');

    // VIEW BOOKING STATUS & DETAILS (GET)
    Route::get('/rental/status/{booking}', [RentalController::class, 'status'])
        ->name('rental.status');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (AUTH + ADMIN ROLE)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Orders Management
    Route::get('/orders', [AdminController::class, 'ordersList'])->name('orders.list');
    Route::get('/orders/{id}', [AdminController::class, 'orderDetail'])->name('orders.detail');
    Route::post('/orders/{id}/accept', [AdminController::class, 'acceptOrder'])->name('orders.accept');
    Route::post('/orders/{id}/reject', [AdminController::class, 'rejectOrder'])->name('orders.reject');

    // Vehicles Management
    Route::get('/vehicles', [AdminController::class, 'vehiclesList'])->name('vehicles.list');
    Route::get('/vehicles/create', [AdminController::class, 'vehicleCreate'])->name('vehicles.create');
    Route::post('/vehicles', [AdminController::class, 'vehicleStore'])->name('vehicles.store');
    Route::get('/vehicles/{id}/edit', [AdminController::class, 'vehicleEdit'])->name('vehicles.edit');
    Route::put('/vehicles/{id}', [AdminController::class, 'vehicleUpdate'])->name('vehicles.update');
    Route::delete('/vehicles/{id}', [AdminController::class, 'vehicleDelete'])->name('vehicles.delete');
});
