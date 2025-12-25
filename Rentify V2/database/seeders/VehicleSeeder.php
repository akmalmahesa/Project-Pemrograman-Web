<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        // ==================== CARS (6) ====================
        Vehicle::create([
            'name' => 'Honda Civic',
            'type' => 'car',
            'description' => 'Sedan sporty dengan performa tinggi',
            'price_per_day' => 800000,
            'image' => 'civic.png',
            'transmission' => 'automatic',
            'rating' => 4.8,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Mitsubishi Xpander',
            'type' => 'car',
            'description' => 'Mobil keluarga praktis dan nyaman',
            'price_per_day' => 400000,
            'image' => 'xpander.png',
            'transmission' => 'manual',
            'rating' => 4.6,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Toyota Alphard',
            'type' => 'car',
            'description' => 'MPV premium mewah untuk keluarga',
            'price_per_day' => 2500000,
            'image' => 'alphard.png',
            'transmission' => 'automatic',
            'rating' => 4.9,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Daihatsu Terios',
            'type' => 'car',
            'description' => 'SUV kompak handal untuk petualangan',
            'price_per_day' => 350000,
            'image' => 'terios.png',
            'transmission' => 'manual',
            'rating' => 4.5,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Toyota Avanza',
            'type' => 'car',
            'description' => 'Minivan terpercaya untuk keluarga',
            'price_per_day' => 350000,
            'image' => 'avanza.png',
            'transmission' => 'manual',
            'rating' => 4.4,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Suzuki Ertiga',
            'type' => 'car',
            'description' => 'MPV efisien dengan interior luas',
            'price_per_day' => 380000,
            'image' => 'ertiga.png',
            'transmission' => 'automatic',
            'rating' => 4.3,
            'status' => 'available',
        ]);

        // ==================== MOTORCYCLES (9) ====================
        Vehicle::create([
            'name' => 'Honda CB150R',
            'type' => 'motorcycle',
            'description' => 'Motor sport naked dengan desain modern',
            'price_per_day' => 120000,
            'image' => 'cb150r.png',
            'transmission' => 'manual',
            'rating' => 4.7,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Yamaha NMAX 155',
            'type' => 'motorcycle',
            'description' => 'Skuter maxi dengan performa ekonomis',
            'price_per_day' => 100000,
            'image' => 'nmax.png',
            'transmission' => 'automatic',
            'rating' => 4.6,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Kawasaki Ninja 250',
            'type' => 'motorcycle',
            'description' => 'Motor sport performa tinggi',
            'price_per_day' => 200000,
            'image' => 'ninja250.png',
            'transmission' => 'manual',
            'rating' => 4.8,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Honda CB500F',
            'type' => 'motorcycle',
            'description' => 'Naked bike berkapasitas besar',
            'price_per_day' => 250000,
            'image' => 'cb500f.png',
            'transmission' => 'manual',
            'rating' => 4.7,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Suzuki GSX-S150',
            'type' => 'motorcycle',
            'description' => 'Motor sport kompak tangguh',
            'price_per_day' => 130000,
            'image' => 'gsxs150.png',
            'transmission' => 'manual',
            'rating' => 4.5,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Yamaha MT-09',
            'type' => 'motorcycle',
            'description' => 'Naked bike bertenaga dengan handling sempurna',
            'price_per_day' => 280000,
            'image' => 'mt09.png',
            'transmission' => 'manual',
            'rating' => 4.8,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Honda PCX 160',
            'type' => 'motorcycle',
            'description' => 'Skuter modern dengan fitur canggih',
            'price_per_day' => 95000,
            'image' => 'pcx160.png',
            'transmission' => 'automatic',
            'rating' => 4.6,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Yamaha YZF-R1',
            'type' => 'motorcycle',
            'description' => 'Motor sport premium berteknologi tinggi',
            'price_per_day' => 450000,
            'image' => 'yzfr1.png',
            'transmission' => 'manual',
            'rating' => 4.9,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Bajaj Pulsar 125',
            'type' => 'motorcycle',
            'description' => 'Motor harian ekonomis dan handal',
            'price_per_day' => 80000,
            'image' => 'pulsar125.png',
            'transmission' => 'manual',
            'rating' => 4.2,
            'status' => 'available',
        ]);

        // ==================== BICYCLES (9) ====================
        Vehicle::create([
            'name' => 'Polygon Helios C2',
            'type' => 'bicycle',
            'description' => 'Sepeda road bike ringan untuk balap',
            'price_per_day' => 80000,
            'image' => 'helioc2.png',
            'transmission' => 'manual',
            'rating' => 4.5,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Vtech Mountain Bike Pro',
            'type' => 'bicycle',
            'description' => 'MTB tangguh untuk off-road adventure',
            'price_per_day' => 100000,
            'image' => 'vtechmtb.png',
            'transmission' => 'manual',
            'rating' => 4.6,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Wimcycle Fantom 1.0',
            'type' => 'bicycle',
            'description' => 'Sepeda hybrid versatil untuk segala medan',
            'price_per_day' => 70000,
            'image' => 'fantom.png',
            'transmission' => 'manual',
            'rating' => 4.4,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Specialized Rockhopper',
            'type' => 'bicycle',
            'description' => 'Mountain bike entry-level berkualitas',
            'price_per_day' => 110000,
            'image' => 'rockhopper.png',
            'transmission' => 'manual',
            'rating' => 4.7,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Trek FX 3',
            'type' => 'bicycle',
            'description' => 'Hybrid bike nyaman untuk commuting',
            'price_per_day' => 90000,
            'image' => 'trekfx3.png',
            'transmission' => 'manual',
            'rating' => 4.5,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Giant Escape 3',
            'type' => 'bicycle',
            'description' => 'Sepeda hybrid ringan dan cepat',
            'price_per_day' => 85000,
            'image' => 'escape3.png',
            'transmission' => 'manual',
            'rating' => 4.6,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Thrill Ravage 1.0',
            'type' => 'bicycle',
            'description' => 'MTB lokal terjangkau dengan performa baik',
            'price_per_day' => 60000,
            'image' => 'ravage.png',
            'transmission' => 'manual',
            'rating' => 4.3,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Brompton M6L',
            'type' => 'bicycle',
            'description' => 'Sepeda lipat ringkas untuk mobilitas urban',
            'price_per_day' => 150000,
            'image' => 'brompton.png',
            'transmission' => 'manual',
            'rating' => 4.8,
            'status' => 'available',
        ]);

        Vehicle::create([
            'name' => 'Decathlon Triban 120',
            'type' => 'bicycle',
            'description' => 'Road bike budget-friendly untuk pemula',
            'price_per_day' => 75000,
            'image' => 'triban120.png',
            'transmission' => 'manual',
            'rating' => 4.4,
            'status' => 'available',
        ]);
    }
}
