<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('book_formats')->delete();

        DB::table('book_formats')->insert([
            'title' => "E-Document",
        ]);

        DB::table('book_formats')->insert([
            'title' => "Physical Document",
        ]);

    }
}
