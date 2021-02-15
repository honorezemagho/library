<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
            'name' => 'Fred Free',
            'email' => "zankafred@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('07081999A'),
            'remember_token' => Str::random(10),
            'role_id' => 3
            ],
              [
            'name' => 'Free tasco',
            'email' => "free@free.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id' => 3
            ]
            );
    }
}
