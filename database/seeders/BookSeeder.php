<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('books')->insert([
            'title' => "C# Programming",
            'number_of_pages' =>39,
            'ISBN' => "38634638638",
            'cover' => "storage/books/rL0vUgofXdWOFYF31gcrAk9KDgBVecz0hD4aP4ii.png",
            'url' =>"storage/books/SboUHXE5pVj1223EcAkwDc0cWt8vmGw01ui6tpax.pdf",
            'publisher_id' => 1,
            'book_type_id' => 1,
            'status' => 1,
            'description' => 'sjskhdskdhskdhskdhskdhsdkshkdshdkhsdhkjshdhskjdhskldshkdskjd',
        ]);

         DB::table('books')->insert([
            'title' => "Analyse UML",
            'ISBN' => "38634638638",
            'number_of_pages' =>74,
            'publisher_id' => 2,
            'book_type_id' => 1,
            'status' => 1,
            'cover' => "storage/books/mvoPAsETC4ApiNmToZ9zWxsuH5beRWxYo6HnTUe2.png",
            'url' =>"storage/books/OjY5LgeK7X9sKbzC7vpDddOW5tS0FUs1hfUQg2Rx.pdf",
            'description' => 'sjskhdskdhskdhskdhskdhsdkshkdshdkhsdhkjshdhskjdhskldshkdskjd',

        ]);

          DB::table('books')->insert([
            'title' => "Les bases de la cryptologie",
            'ISBN' => "38634638638",
            'number_of_pages' =>72,
            'cover' => "storage/books/8jELAcdlEwjyuWbjDfP2YwdfiQUVuh8LRRB01OfQ.png",
            'url' =>"storage/books/SboUHXE5pVj1223EcAkwDc0cWt8vmGw01ui6tpax.pdf",
            'publisher_id' => 3,
            'book_type_id' => 1,
            'status' => 1,
            'description' => 'sjskhdskdhskdhskdhskdhsdkshkdshdkhsdhkjshdhskjdhskldshkdskjd',
     
        ]);

           DB::table('books')->insert([
            'title' => "C Programming",
            'ISBN' => "38634638638",
            'number_of_pages' =>55,
            'publisher_id' => 1,
            'cover' => "storage/books/klMMMLtwGNSO6WcdbdhmsaEcz7rQcHpSRx3PLUoJ.png",
            'url' =>"storage/books/00SP6IKGtjnTCl18bx2cUNroDRgrd0Ok5dhc0Rzv.pdf",
            'book_type_id' => 1,
            'status' => 1,
            'description' => 'sjskhdskdhskdhskdhskdhsdkshkdshdkhsdhkjshdhskjdhskldshkdskjd',
     
        ]);
    }
}
