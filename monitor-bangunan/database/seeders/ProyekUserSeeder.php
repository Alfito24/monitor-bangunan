<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyek_user')->insert([
            [
                'proyek_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
