<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfSuperheroes = 10;
        $sex = ['male', 'female'];
        $numberOfSuperheroes = 10;
        $superheroData = [
            [
                'lastname'      => 'Wayne',
                'firstname'     => 'Bruce',
                'alias'         => 'Batman',
                'hair_color'    => 'Black',
                'description'   => 'The Dark Knight',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Batman',
                'origin_planet' => 'Earth',
            ],
            [
                'lastname'      => 'Parker',
                'firstname'     => 'Peter',
                'alias'         => 'Spider-Man',
                'hair_color'    => 'Brown',
                'description'   => 'Friendly Neighborhood Spider-Man',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Spider-Man',
                'origin_planet' => 'Earth',
            ],
            [
                'lastname'      => 'Kent',
                'firstname'     => 'Clark',
                'alias'         => 'Superman',
                'hair_color'    => 'Black',
                'description'   => 'Man of Steel',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Superman',
                'origin_planet' => 'Krypton',
            ],
            [
                'lastname'      => 'Prince',
                'firstname'     => 'Diana',
                'alias'         => 'Wonder Woman',
                'hair_color'    => 'Black',
                'description'   => 'Amazonian Princess',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Wonder_Woman',
                'origin_planet' => 'Themyscira',
            ],
            [
                'lastname'      => 'Stark',
                'firstname'     => 'Tony',
                'alias'         => 'Iron Man',
                'hair_color'    => 'Black',
                'description'   => 'Genius, billionaire, playboy, philanthropist',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Iron_Man',
                'origin_planet' => 'Earth',
            ],[
                'lastname'      => 'Stark',
                'firstname'     => 'Natasha',
                'alias'         => 'Black Widow',
                'hair_color'    => 'Red',
                'description'   => 'Master spy and assassin',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Black_Widow_(Natasha_Romanoff)',
                'origin_planet' => 'Earth',
            ],
            [
                'lastname'      => 'Allen',
                'firstname'     => 'Barry',
                'alias'         => 'The Flash',
                'hair_color'    => 'Blond',
                'description'   => 'Scarlet Speedster',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Flash_(Barry_Allen)',
                'origin_planet' => 'Earth',
            ],
            [
                'lastname'      => 'Summers',
                'firstname'     => 'Scott',
                'alias'         => 'Cyclops',
                'hair_color'    => 'Brown',
                'description'   => 'Leader of the X-Men',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Cyclops_(comics)',
                'origin_planet' => 'Earth',
            ],
            [
                'lastname'      => 'Howlett',
                'firstname'     => 'Logan',
                'alias'         => 'Wolverine',
                'hair_color'    => 'Black',
                'description'   => 'Mutant with retractable claws',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Wolverine_(character)',
                'origin_planet' => 'Earth',
            ],
            [
                'lastname'      => 'Danvers',
                'firstname'     => 'Carol',
                'alias'         => 'Captain Marvel',
                'hair_color'    => 'Blond',
                'description'   => 'Earth\'s mightiest hero',
                'wiki_url'      => 'https://en.wikipedia.org/wiki/Captain_Marvel_(Marvel_Comics)',
                'origin_planet' => 'Earth',
            ],
        ];
        
        // Insérez les données dans la table 'superheroes'
        for ($i = 0; $i < $numberOfSuperheroes; $i++) {
            DB::table('superheroes')->insert([
                'lastname'      => $superheroData[$i]['lastname'],
                'firstname'     => $superheroData[$i]['firstname'],
                'alias'         => $superheroData[$i]['alias'],
                'sex'           => $sex[rand(0, 1)],
                'hair_color'    => $superheroData[$i]['hair_color'],
                'description'   => $superheroData[$i]['description'],
                'wiki_url'      => $superheroData[$i]['wiki_url'],
                'origin_planet' => $superheroData[$i]['origin_planet'],
                'id_creator'    => rand(1, 5), 
            ]);
        } 
    }
}
