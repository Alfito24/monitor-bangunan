<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => "Joko123@gmail.com",
                'password' => bcrypt('joko123'),
                'nama' => 'Joko',
                'kategori' => 'pemilik',
                'peran' => 'owner1',
                'pengetahuan' => 8,
                'usia' => 20,
                'pendidikan' => 'sma',
            ],
            [
                'email' => "Admin123@gmail.com",
                'password' => bcrypt('Admin123'),
                'nama' => 'Admin',
                'kategori' => 'pemilik',
                'peran' => 'manajemen',
                'pengetahuan' => 12,
                'usia' => 30,
                'pendidikan' => 'sma',
            ],
            [
                'email' => "Liefran123@gmail.com",
                'password' => bcrypt('Admin123'),
                'nama' => 'Liefran',
                'kategori' => 'pengguna',
                'peran' => 'penghuni',
                'pengetahuan' => 3,
                'usia' => 20,
                'pendidikan' => 'sma',
            ],
            [
                'email' => "Bahrul123@gmail.com",
                'password' => bcrypt('Admin123'),
                'nama' => 'Bahrul',
                'kategori' => 'pengguna',
                'peran' => 'penghuni',
                'pengetahuan' => 3,
                'usia' => 20,
                'pendidikan' => 'sma',
            ],
            ]);
        }
    }
