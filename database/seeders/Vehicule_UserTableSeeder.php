<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfVehiculesUsers = 10;
        $userIds = range(1, 10);
        $vehiculeIds = range(1, 5);
        
        for ($i = 1; $i <= $numberOfVehiculesUsers; $i++) {
            DB::table('vehicules_users')->insert([
                'user_id'      => $userIds[array_rand($userIds)],
                'vehicule_id'  => $vehiculeIds[array_rand($vehiculeIds)],
            ]);
        }
    }
}
