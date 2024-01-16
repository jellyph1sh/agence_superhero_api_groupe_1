<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'lastname' => Str::random(10),
            'firstname' => Str::random(10),
            'alias' => Str::random(10),
            'mail' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
            'role' => Str::random(10) ,
            'profile_picture' => Str::random(10),

        ]);
    }
}
