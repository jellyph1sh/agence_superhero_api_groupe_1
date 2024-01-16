<?php

// Database\Seeders\ProtectedCitiesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtectedCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfProtectedCities = 5;

        $protectorIds = range(1, 10);
        $cityIds = range(1, 5);
        for ($i = 1; $i <= $numberOfProtectedCities; $i++) {
            DB::table('protected_cities')->insert([
                'id_hero' => $protectorIds[array_rand($protectorIds)],
                'id_city'      => $cityIds[array_rand($cityIds)],
            ]);
        }
    }
}
