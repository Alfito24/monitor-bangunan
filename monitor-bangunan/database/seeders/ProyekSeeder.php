<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyeks')->insert([
            [
                'namaProyek' => 'Puncak Kertajaya',
                'tanggalProyek' => '2022-05-19',
            ],
        ]);
    }
}
