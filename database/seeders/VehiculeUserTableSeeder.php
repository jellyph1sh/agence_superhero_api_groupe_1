<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeUserTableSeeder extends Seeder
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
                'id_hero'      => $userIds[array_rand($userIds)],
                'id_vehicule'  => $vehiculeIds[array_rand($vehiculeIds)],
            ]);
        }
    }
}
