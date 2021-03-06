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
        $this->call([
            VariabelSeeder::class,
            UserSeeder::class,
            ProyekSeeder::class,
            ProyekUserSeeder::class,
            SurveySeeder::class,
            ProyekSurveySeeder::class,
            SurveyUserSeeder::class,
        ]);
    }
}
