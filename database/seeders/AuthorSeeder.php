<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => "ANAFACK Diderot",
        ]);

        DB::table('authors')->insert([
            'name' => "MBAPPE Paul",
        ]);

        DB::table('authors')->insert([
            'name' => "IUC",
        ]);

        DB::table('authors')->insert([
            'name' => "Emily Grace",
        ]);
    }
}
