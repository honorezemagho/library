<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libraries')->insert([
            'lib_name' => "",
            'lib_desc' => "",
            'hero_image_title' => "",
            'hero_image_desc' => "",
            'phone1' => "",
            'phone2' => "",
            'default_issue_days' => 5,
            'max_issue_book_limit' => 2,
            'max_reserv_book_limit' => 2,
            'book_due_reminder_before_Days' => 2,
            'fine_per_overdue_day' => 0,
            'currency' => "XAF",
            'lib_default_language' => "English",
        ]);
    }
}
