<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_medias')->insert([
            'title' => "Facebook",
            'url' => "",
        ]);

        DB::table('social_medias')->insert([
            'title' => "LinkedIn",
            'url' => "",
        ]);

        DB::table('social_medias')->insert([
            'title' => "Twitter",
            'url' => "",
        ]);

        DB::table('social_medias')->insert([
            'title' => "Youtube",
            'url' => "",
        ]);

        DB::table('social_medias')->insert([
            'title' => "Instagram",
            'url' => "",
        ]);
    }
}
