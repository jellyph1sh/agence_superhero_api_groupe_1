<?php

// Database\Seeders\GadgetsUsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GadgetsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfGadgetsUsers = 7;
        // $heroIds = range(1, 10);
        // $gadgetIds = range(1, $numberOfGadgetsUsers);
        $Data=[[1, 1],[2, 2], [3, 3], [4, 4], [5, 5], [6,6], [7,7], [8, 8]];
        
        for ($i = 1; $i <= $numberOfGadgetsUsers; $i++) {
            DB::table('gadgets_users')->insert([
                'id_hero'   => $Data[$i][0],
                'id_gadget' => $Data[$i][1],
            ]);
        }
    }
}
