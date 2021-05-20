<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('levels')->delete();

        DB::table('levels')->insert([
            'title' => "Level 1",
            'abbr' => "1",
        ]);

        DB::table('levels')->insert([
            'title' => "Level 2",
            'abbr' => "2",
        ]);

        DB::table('levels')->insert([
            'title' => "Level 3",
            'abbr' => "3",
        ]);

        DB::table('levels')->insert([
            'title' => "Level 4",
            'abbr' => "4",
        ]);

        DB::table('levels')->insert([
            'title' => "Level 5",
            'abbr' => "5",
        ]);
    }
}
