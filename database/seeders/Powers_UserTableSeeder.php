<?php

// Database\Seeders\PowerUsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfPowerUsers = 10;
        $heroIds = range(1, 10);
        $powerIds = range(1, 5);

        for ($i = 1; $i <= $numberOfPowerUsers; $i++) {
            DB::table('power_users')->insert([
                'id_hero'   => $heroIds[array_rand($heroIds)],
                'id_power'  => $powerIds[array_rand($powerIds)],
            ]);
        }
    }
}
