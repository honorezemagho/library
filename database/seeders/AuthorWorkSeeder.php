<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorWorkSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('author_works')->insert([
            'author_work_id' => 1,
            'author_work_type' => "App\Models\Report",
            'author_id' => 1,
            'status' => "Principal",
        ]);

    	  DB::table('author_works')->insert([
            'author_work_id' => 2,
            'author_work_type' => "App\Models\Report",
            'author_id' => 1,
            'status' => "Principal",
        ]);

    	   DB::table('author_works')->insert([
            'author_work_id' => 1,
            'author_work_type' => "App\Models\Report",
            'author_id' => 2,
            'status' => "Principal",
        ]);

    	    DB::table('author_works')->insert([
            'author_work_id' => 3,
            'author_work_type' => "App\Models\Report",
            'author_id' => 1,
            'status' => "Principal",
        ]);

    	    DB::table('author_works')->insert([
            'author_work_id' => 4,
            'author_work_type' => "App\Models\Report",
            'author_id' => 2,
            'status' => "Principal",
        ]);

        	 DB::table('author_works')->insert([
            'author_work_id' => 1,
            'author_work_type' => "App\Models\Book",
            'author_id' => 1,
            'status' => "Principal",
        ]);

        	 DB::table('author_works')->insert([
            'author_work_id' => 1,
            'author_work_type' => "App\Models\Book",
            'author_id' => 2,
            'status' => "Principal",
        ]);

        	 DB::table('author_works')->insert([
            'author_work_id' => 3,
            'author_work_type' => "App\Models\Book",
            'author_id' => 1,
            'status' => "Principal",
        ]);

        	DB::table('author_works')->insert([
            'author_work_id' => 3,
            'author_work_type' => "App\Models\Book",
            'author_id' => 1,
            'status' => "Principal",
        ]);


        	DB::table('author_works')->insert([
            'author_work_id' => 1,
            'author_work_type' => "App\Models\Subject",
            'author_id' => 3,
            'status' => "Principal",
        ]);


        	DB::table('author_works')->insert([
            'author_work_id' => 2,
            'author_work_type' => "App\Models\Subject",
            'author_id' => 3,
            'status' => "Principal",
        ]);

        	DB::table('author_works')->insert([
            'author_work_id' => 3,
            'author_work_type' => "App\Models\Subject",
            'author_id' => 3,
            'status' => "Principal",
        ]);
    }
}
