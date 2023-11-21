<?php

// database/seeders/CountySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;
use App\Models\City;

class CountySeeder extends Seeder
{
    public function run()
    {
        $counties = [
            'Pest' => ['Budapest', 'Eger', 'Debrecen'],
            'Budapest' => ['District I', 'District II', 'District III'],
            'Baranya' => ['Pécs', 'Mohács', 'Szigetvár'],
        ];

        foreach ($counties as $countyName => $cities) {
            $county = County::create(['name' => $countyName]);

            foreach ($cities as $cityName) {
                City::create(['name' => $cityName, 'county_id' => $county->id]);
            }
        }
    }
}

