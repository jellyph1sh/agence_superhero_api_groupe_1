<?php

// CreatePowersSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfPowers = 5;

        $powersData = [
            ['Super Strength', 'The ability to exhibit physical strength beyond that of normal humans.'],
            ['Telekinesis', 'The ability to move or manipulate objects with the mind.'],
            ['Invisibility', 'The ability to become unseen by the naked eye.'],
            ['Teleportation', 'The ability to instantaneously transport from one location to another.'],
            ['Flight', 'The ability to fly or levitate.'],
        ];

        for ($i = 0; $i < $numberOfPowers; $i++) {
            DB::table('powers')->insert([
                'power_name'        => $powersData[$i][0],
                'power_description' => $powersData[$i][1],
            ]);
        }
    }
}
