<?php

// database/seeders/CountySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;

class CountySeeder extends Seeder
{
    public function run()
    {
        $counties = ['Pest', 'Budapest', 'Baranya']; // Itt adhatod meg a megyéket

        foreach ($counties as $county) {
            County::create(['name' => $county]);
        }
    }
}

