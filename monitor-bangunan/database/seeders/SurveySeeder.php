<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert([
            [
                'nama_survey' => 'Survey Pertama',
                'tanggal_dibuat' => '2022-06-16',
                'tanggal_kadaluwarsa' => '2022-06-22',
            ],
        ]);
    }
}
