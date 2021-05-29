<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            'name' => "Pub Pro",
        ]);

        DB::table('publishers')->insert([
            'name' => "Open Publih",
        ]);

        DB::table('publishers')->insert([
            'name' => "IUC",
        ]);
    }
}
