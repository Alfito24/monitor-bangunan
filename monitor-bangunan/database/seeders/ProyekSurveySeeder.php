<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyek_survey')->insert([
            [
                'proyek_id' => 1,
                'survey_id' => 1,
            ],
        ]);
    }
}
