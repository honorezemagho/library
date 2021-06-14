<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('reports')->insert([
            'title' => "E-Library Management System",
            'number_of_pages' =>39,
            'academic_year' => "2018",
            'cover' => "storage/reports/Ffyp8Zitw91DjuqBzQCqus6utvGIwayMR2fLoueR.png",
            'url' =>"storage/reports/SboUHXE5pVj1223EcAkwDc0cWt8vmGw01ui6tpax.pdf",
            'level_id' => 3,
            'field_id' => 1,
        ]);

         DB::table('reports')->insert([
            'title' => "Library Management System",
            'number_of_pages' =>74,
            'academic_year' => "2021",
            'cover' => "storage/reports/mvoPAsETC4ApiNmToZ9zWxsuH5beRWxYo6HnTUe2.png",
            'url' =>"storage/reports/OjY5LgeK7X9sKbzC7vpDddOW5tS0FUs1hfUQg2Rx.pdf",
            'level_id' => 2,
            'field_id' => 2,
        ]);

          DB::table('reports')->insert([
            'title' => "Smartphone application as a teaching tool for undergraduate students",
            'number_of_pages' =>72,
            'academic_year' => "2021",
            'cover' => "storage/reports/Ffyp8Zitw91DjuqBzQCqus6utvGIwayMR2fLoueR.png",
            'url' =>"storage/reports/SboUHXE5pVj1223EcAkwDc0cWt8vmGw01ui6tpax.pdf",
            'level_id' => 3,
            'field_id' => 1,
        ]);

           DB::table('reports')->insert([
            'title' => "Design and Implementation of a school departement Management Test Case",
            'number_of_pages' =>15,
            'academic_year' => "2018",
            'cover' => "storage/reports/klMMMLtwGNSO6WcdbdhmsaEcz7rQcHpSRx3PLUoJ.jpg",
            'url' =>"storage/reports/00SP6IKGtjnTCl18bx2cUNroDRgrd0Ok5dhc0Rzv.pdf",
            'level_id' => 1,
            'field_id' => 1,
        ]);
    }
}
