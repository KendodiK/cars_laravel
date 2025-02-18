<?php

namespace Database\Seeders;

use App\Models\Fuel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const FUELS = [
        'Benzin',
        'Dízel',
        'Hibrid',
        'Elektromos'
    ];

    public function run(): void
    {
        foreach (self::FUELS as $item) {
            $fuel = new Fuel();
	        $fuel->name = $item;
            $fuel->save();
        }
    }
}
