<?php
// Database\Seeders\VehiculesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfVehicles = 5;

        $vehiclesData = [
            ['Car', 'Description of Car'],
            ['Motorcycle', 'Description of Motorcycle'],
            ['Jetpack', 'Description of Jetpack'],
            ['Spaceship', 'Description of Spaceship'],
            ['Hoverboard', 'Description of Hoverboard'],
        ];
        foreach ($vehiclesData as $vehicle) {
            DB::table('vehicules')->insert([
                'vehicule_name'        => $vehicle[0],
                'vehicule_description' => $vehicle[1],
            ]);
        }
    }
}
