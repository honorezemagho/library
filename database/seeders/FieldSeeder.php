<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // DB::table('fields')->delete();

        DB::table('fields')->insert([
            'title' => "Software Engineering",
            'abbr' => "SWE",
        ]);

        DB::table('fields')->insert([
            'title' => "Genie Logiciel",
            'abbr' => "GL",
        ]);

        DB::table('fields')->insert([
            'title' => "Information Technology",
            'abbr' => "IT",
        ]);

        DB::table('fields')->insert([
            'title' => "Marqueting Commerce Vente",
            'abbr' => "MCV",
        ]);

        DB::table('fields')->insert([
            'title' => "Comptabilite et Gestion",
            'abbr' => "CG",
        ]);
    }
}
