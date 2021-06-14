<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'title' => "Distributed system 2",
            'academic_year' => "2018",
            'cover' => "storage/subjects/5VUkmCXfrl6vMpSNbLziP9Pp4TILrzMOpYAfyWqm.png",
            'url' =>"subjects/sJfkWqocNdeQFEMoRR96zb6e4WEYoHnhvyE3BJNZ.pdf",
            'level_id' => 2,
            'author_id' => 2,
            'period_id' => 2,
            'field_id' => 1,
        ]);

         DB::table('subjects')->insert([
            'title' => "Compiler design",
            'cover' => "storage/subjects/mvoPAsETC4ApiNmToZ9zWxsuH5beRWxYo6HnTUe2.png",
            'url' =>"storage/subjects/OjY5LgeK7X9sKbzC7vpDddOW5tS0FUs1hfUQg2Rx.pdf",
            'level_id' => 2,
            'period_id' => 1,
            'author_id' => 2,
            'field_id' => 2,
        ]);

          DB::table('subjects')->insert([
            'title' => "Software Testing",
            'cover' => "storage/subjects/Ffyp8Zitw91DjuqBzQCqus6utvGIwayMR2fLoueR.png",
            'url' =>"subjects/SboUHXE5pVj1223EcAkwDc0cWt8vmGw01ui6tpax.pdf",
            'level_id' => 3,
             'author_id' => 2,
            'period_id' => 2,
            'field_id' => 1,
        ]);

           DB::table('subjects')->insert([
            'title' => "Software Testing 2",
            'academic_year' => "2018",
            'cover' => "storage/subjects/klMMMLtwGNSO6WcdbdhmsaEcz7rQcHpSRx3PLUoJ.png",
            'url' =>"subjects/00SP6IKGtjnTCl18bx2cUNroDRgrd0Ok5dhc0Rzv.pdf",
            'level_id' => 1,
             'author_id' => 2,
             'period_id' => 1,
            'field_id' => 1,
        ]);
    }
}
