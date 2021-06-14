<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('periods')->delete();

        DB::table('periods')->insert([
            'title' => "Semester 1",
            'abbr' => "S1",
        ]);

        DB::table('periods')->insert([
            'title' => "Semester 2",
            'abbr' => "S2",
        ]);

        DB::table('periods')->insert([
            'title' => "Final Exam",
            'abbr' => "S3",
        ]);
    }
}
