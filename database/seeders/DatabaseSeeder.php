<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(PowerSeeder::class);
        $this->call(GadgetTableSeeder::class);
        $this->call(VehiculeTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SuperHeroSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(GadgetsUserTableSeeder::class);
        $this->call(PowerUserTableSeeder::class);
        $this->call(VehiculeUserTableSeeder::class);
        $this->call(ProtectedCitiesGroupsTableSeeder::class);
        $this->call(ProtectedCitiesTableSeeder::class);
    }
}
