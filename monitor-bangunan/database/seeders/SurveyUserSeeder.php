<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_user')->insert([
            [
                'survey_id' => 1,
                'user_id' => 3,
                'status' => 1
            ],
            [
                'survey_id' => 1,
                'user_id' => 4,
                'status' => 1
            ],
        ]);
    }
}
