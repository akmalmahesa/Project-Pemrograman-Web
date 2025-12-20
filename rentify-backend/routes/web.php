<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// HOME / LANDING
Route::get('/', function () {
    return view('home');
})->name('home');


// ==================== AUTH (WEB) ====================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'loginWeb'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');
});

Route::post('/logout', [AuthController::class, 'logoutWeb'])
    ->middleware('auth')
    ->name('logout');

// ==================== PROTECTED PAGES ====================
Route::middleware('auth')->group(function () {

    // List kendaraan
    Route::get('/kendaraan', [KendaraanController::class, 'index'])
        ->name('kendaraan.index');

    // Detail kendaraan
    Route::get('/kendaraan/{id}', [KendaraanController::class, 'show'])
        ->name('kendaraan.detail');
});
