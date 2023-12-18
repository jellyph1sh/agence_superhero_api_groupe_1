<?php
// CreateSuperheroesSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateSuperheroesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfSuperheroes = 10;
        $sex = ['male', 'female'];
    
        for ($i = 1; $i <= $numberOfSuperheroes; $i++) {
            DB::table('superheroes')->insert([
                'lastname'      => 'Lastname' . $i,
                'firstname'     => 'Firstname' . $i,
                'alias'         => 'Alias' . $i,
                'sex'           => $sex[rand(1, 2)],
                'hair_color'    => 'HairColor' . $i,
                'description'   => 'Description of superhero ' . $i,
                'sidekick'      => rand(1, $numberOfSuperheroes), 
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Superhero' . $i,
                'id_group'      => rand(1, 3),
                'origin_planet' => 'Earth', 
                'id_creator'    => rand(1, 5), 
            ]);
        }
    }
}
