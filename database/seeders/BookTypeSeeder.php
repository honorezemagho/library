<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('book_types')->delete();

        DB::table('book_types')->insert([
            'title' => "Report",
        ]);

        DB::table('book_types')->insert([
            'title' => "Subject",
        ]);

        DB::table('book_types')->insert([
            'title' => "Book",
        ]);

        DB::table('book_types')->insert([
            'title' => "Magazine",
        ]);

        DB::table('book_types')->insert([
            'title' => "Journal",
        ]);
    }
}
