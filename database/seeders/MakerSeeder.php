<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maker;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const MAKERS = [
        'Ford',
        'Opel',
        'BMW',
        'Mercedes'
    ];

    public function run(): void
    {
        foreach (self::MAKERS as $item) {
            $maker = new Maker();
	        $maker->name = $item;
            $maker->logo = $item . ".png";
            $maker->save();

        }
    }
}
