<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'matricule' => "IUC20E5678",
            'name' => "ANAFACK",
            'date_of_birth' => "2000-04-22",
            'email' => "jordananafack@gmail.com",
            'password' => Hash::make("admin2021"),
        ]);
    }
}
