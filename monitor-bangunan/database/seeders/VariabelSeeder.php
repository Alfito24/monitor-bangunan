<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variabels')->delete();

        $createdAt = new DateTime();
        DB::table('variabels')->insert([
            [
                'id' => '1',
                'isiVariabel' => 'Bangunan memberikan rasa aman secara fisik (Tidak terjadi kekerasan, Perbuatan Asusila, Pencurian, dll).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '2',
                'isiVariabel' => 'Bangunan memberikan rasa selamat secara fisik (Tidak membahayakan keselamatan dari elemen bangunan, memberikan informasi penanganan bahaya, Penyediaan alat penanganan bahaya).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '3',
                'isiVariabel' => ' Bangunan mengutamakan aspek kesehatan dari pencemaran/permasalahan lingkungan (Cahaya, suhu, Suara, Udara, Air, Getaran dan Kebersihan).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '4',
                'isiVariabel' => 'Bangunan memberikan rasa nyaman secara psikis terhadap Kondisi Cahaya, Suhu, Suara, Udara, Air, Getaran dan Kebersihan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '5',
                'isiVariabel' => 'Masyarakat/warga lokal memiliki kesempatan bekerja pada bangunan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '6',
                'isiVariabel' => 'Bangunan memberikan manfaat ekonomi kepada masyarakat sekitar seperti merangsang pertumbuhan usaha.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '7',
                'isiVariabel' => 'Pemangku kepentingan dilibatkan dalam proses pengambilan keputusan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '8',
                'isiVariabel' => 'Konflik pemangku kepentingan dapat terselesaikan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '9',
                'isiVariabel' => 'Kemudahan berkomunikasi dan pertukaran informasi terhadap pemangku kepentingan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '10',
                'isiVariabel' => 'Masyarakat sekitar tidak merasa terganggu dengan adanya gedung.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '11',
                'isiVariabel' => 'Bangunan tidak merusak nilai budaya masyarakat/warga sekitar.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '12',
                'isiVariabel' => 'Tersedia tempat parkir kendaraan pada bangunan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '13',
                'isiVariabel' => 'Tertatanya alur keluar masuk kendaraan pada bangunan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '14',
                'isiVariabel' => 'Bangunan menyediakan kemudahan akses terhadap fasilitas publik (transportasi umum, pendidikan, rekreasi, tempat kerja, pusat perbelanjaan, olahraga, dll).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '15',
                'isiVariabel' => 'Bangunan menyediakan kemudahan akses terhadap fasilitas darurat (Kesehatan, Kepolisian, Pemadam kebakaran).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '16',
                'isiVariabel' => 'Bangunan menyediakan kemudahan akses untuk keterbatasan fisik (disabilitas).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '17',
                'isiVariabel' => 'Bangunan memberikan hubungan emosional antara pengguna dan lingkungan sehingga memunculkan kesan yang baik (Sense of Place).',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '18',
                'isiVariabel' => 'Bangunan bisa menjadi tempat melakukan interaksi sosial secara individu maupun kelompok.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '19',
                'isiVariabel' => 'Bangunan memperhatikan aspek estetika serta kesesuaian fungsinya.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '20',
                'isiVariabel' => 'Terdapat ruang terbuka komunal pada bangunan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '21',
                'isiVariabel' => 'Terdapat ruang terbuka pribadi pada bangunan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ],
            [
                'id' => '22',
                'isiVariabel' => 'Terdapat ruang privasi visual pada bangunan.',
                'created_at' => $createdAt,
                'updated_at' => $createdAt
            ]
        ]);
    }
}
