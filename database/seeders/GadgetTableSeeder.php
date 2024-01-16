<?php
// Database\Seeders\GadgetsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GadgetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfGadgets = 8;

        $gadgetsData = [
            ['Gadget 1', 'Description of Gadget 1'],
            ['Gadget 2', 'Description of Gadget 2'],
            ['Gadget 3', 'Description of Gadget 3'],
            ['Gadget 4', 'Description of Gadget 4'],
            ['Gadget 5', 'Description of Gadget 5'],
            ['Gadget 6', 'Description of Gadget 6'],
            ['Gadget 7', 'Description of Gadget 7'],
            ['Gadget 8', 'Description of Gadget 8'],
        ];

        foreach ($gadgetsData as $gadget) {
            DB::table('gadgets')->insert([
                'gadget_name'        => $gadget[0],
                'gadget_description' => $gadget[1],
            ]);
        }
    }
}
