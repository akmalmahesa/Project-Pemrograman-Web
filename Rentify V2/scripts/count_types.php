<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Vehicle;

echo "Vehicles matching Mobil (car): " . Vehicle::where('type','car')->count() . "\n";
echo "Vehicles matching Motor (motorcycle): " . Vehicle::where('type','motorcycle')->count() . "\n";
echo "Vehicles matching Sepeda (bicycle): " . Vehicle::where('type','bicycle')->count() . "\n";
