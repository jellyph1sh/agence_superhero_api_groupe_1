<?php

// Database\Seeders\ProtectedCitiesGroupsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtectedCitiesGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfProtectedCitiesGroups = 5;
        $groupIds = range(1, 3);
        $cityIds = range(1, 5);

        for ($i = 1; $i <= $numberOfProtectedCitiesGroups; $i++) {
            DB::table('protected_cities_groups')->insert([
                'id_group' => $groupIds[array_rand($groupIds)],
                'id_city'  => $cityIds[array_rand($cityIds)],
            ]);
        }
    }
}
