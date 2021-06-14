<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call([
            //BasicPermissionsSeeder::class,
            //BookFormatSeeder::class,
            //BookTypeSeeder::class,
            //FieldSeeder::class,
            //LevelSeeder::class,
            //PeriodSeeder::class,
            //AuthorSeeder::class,
            //UserSeeder::class,
           // PublisherSeeder::class,
            //BookSeeder::class,
            //ReportSeeder::class,
            //SubjectSeeder::class,
            //AuthorWorkSeeder::class,
            SocialMediaSeeder::class,
            DefaultConfigSeeder::class
        ]);

    }
}
