<?php

// Database\Seeders\GroupsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfGroups = 3;
        $chiefIds = range(1, 10);
        $groupsData = [
            ['Justice League', 1], 
            ['Avengers', 2],      
            ['X-Men', 3],          
        ];
        for ($i = 1; $i <= $numberOfGroups; $i++) {
            DB::table('groups')->insert([
                'group_names' => $groupsData[$i - 1][0],
                'id_chief'    => $chiefIds[array_rand($chiefIds)],
                'hq_city'     => $groupsData[$i - 1][1],
            ]);
        }
    }
}
