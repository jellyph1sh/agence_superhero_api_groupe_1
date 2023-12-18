<?php

// Database\Seeders\CitiesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfCities = 5;

        $citiesData = [
            ['City 1', 40.7128, -74.0060], 
            ['City 2', 34.0522, -118.2437],
            ['City 3', 51.5074, -0.1278],
            ['City 4', -33.8688, 151.2093],
            ['City 5', 35.6895, 139.6917],
        ];
        foreach ($citiesData as $key => $city) {
            DB::table('cities')->insert([
                'id_city'     => $key,
                'city_name'   => $city[0],
                'latitude'    => $city[1],
                'longitude'   => $city[2],
            ]);
        }
    }
}
