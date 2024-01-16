<?php

// Database\Seeders\PowerUsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfPowerUsers = 9;
        $Data = [[1, 1], [1, 2], [2, 3],[2,2], [3, 3],[3,4],[4, 4],[4,5],[5,5],[5,1]];
        for ($i = 1; $i <= $numberOfPowerUsers; $i++) {
            DB::table('power_users')->insert([
                'id_hero'   => $Data[$i][0],
                'id_power'  => $Data[$i][1],
            ]);
        }
    }
}
