<?php

// Database\Seeders\UsersTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfUsers = 5;
        $usersData = [
            ['John', 'Doe', 'john_doe@example.com', 'password123', 'admin', 'john.jpg'],
            ['Jane', 'Doe', 'jane_doe@example.com', 'password123', 'user', 'jane.jpg'],
            ['Bob', 'Smith', 'bob_smith@example.com', 'password123', 'user', 'bob.jpg'],
            ['Alice', 'Johnson', 'alice_johnson@example.com', 'password123', 'user', 'alice.jpg'],
            ['Eve', 'Williams', 'eve_williams@example.com', 'password123', 'user', 'eve.jpg'],
        ];
        foreach ($usersData as $userData) {
            DB::table('users')->insert([
                'lastname'         => $userData[0],
                'firstname'        => $userData[1],
                'alias'            => $userData[0], // Assuming alias is the same as the first name
                'mail'             => $userData[2],
                'password'         => Hash::make($userData[3]),
                'role'             => $userData[4],
                'profile_picture'  => $userData[5],
            ]);
        }
    }
}
