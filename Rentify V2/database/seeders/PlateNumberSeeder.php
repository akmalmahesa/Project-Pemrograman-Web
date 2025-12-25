<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class PlateNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This will assign a simple plate number to vehicles of type 'car' and 'motorcycle'
     * if they don't already have one. Format: <Prefix> #### XX (e.g. B 0001 AB)
     * Prefix 'B' used for cars, 'D' for motorcycles by default.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = Vehicle::whereIn('type', ['car', 'motorcycle'])->orderBy('id')->get();

        $counter = 1;
        foreach ($vehicles as $v) {
            if ($v->plate_number) {
                continue;
            }

            $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
            $num = str_pad($counter, 4, '0', STR_PAD_LEFT);
            $prefix = $v->type === 'car' ? 'B' : 'D';

            $v->plate_number = "{$prefix} {$num} {$letters}";
            $v->save();

            $counter++;
        }
    }
}
