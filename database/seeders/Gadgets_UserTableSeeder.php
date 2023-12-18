<?php

// Database\Seeders\GadgetsUsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GadgetsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfGadgetsUsers = 8;
        $heroIds = range(1, 10);
        $gadgetIds = range(1, $numberOfGadgetsUsers);

        for ($i = 1; $i <= $numberOfGadgetsUsers; $i++) {
            DB::table('gadgets_users')->insert([
                'id_user'   => $heroIds[array_rand($heroIds)],
                'id_gadget' => $gadgetIds[array_rand($gadgetIds)],
            ]);
        }
    }
}
