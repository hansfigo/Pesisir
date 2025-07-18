<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataPesisirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_pesisir')->insert(
            [
                [
                    'nama' => "Gili Trawangan (Kep. Gili Matra)",
                    'alamat' => "Desa Gili Indah, Kecamatan Pemenang, Lombok Utara, Nusa Tenggara Barat",
                    'kabupaten' => "Lombok Utara",
                    'latitude' => "-8.350785",
                    'longitude' => "116.038628",
                    'keterangan' => ""
                ],
                [
                    'nama' => "Gili Meno (Kep. Gili Matra)",
                    'alamat' => "Desa Gili Indah, Kecamatan Pemenang, Lombok Utara, Nusa Tenggara Barat",
                    'kabupaten' => "Lombok Utara",
                    'latitude' => "-8.347047",
                    'longitude' => "116.056165",
                    'keterangan' => ""
                ],
                [
                    'nama' => "Gili Air (Kep. Gili Matra)",
                    'alamat' => "Desa Gili Indah, Kecamatan Pemenang, Lombok Utara, Nusa Tenggara Barat",
                    'kabupaten' => "Lombok Utara",
                    'latitude' => "-8.357208",
                    'longitude' => "116.087368",
                    'keterangan' => ""
                ],
                [
                    'nama' => "Gili Sudak",
                    'alamat' => "Sekotong Barat, Sekotong Tengah, Kab. Lombok Barat, Nusa Tenggara Barat",
                    'kabupaten' => "Lombok Barat",
                    'latitude' => "-8.724722",
                    'longitude' => "116.024167",
                    'keterangan' => ""
                ],
                [
                    'nama' => "Pantai Senggigi",
                    'alamat' => "Batu Layar, Kabupaten Lombok Barat, Nusa Tenggara Barat",
                    'kabupaten' => "Lombok Barat",
                    'latitude' => "-8.478734",
                    'longitude' => "116.037609",
                    'keterangan' => ""
                ],
                [
                    'nama' => "Pantai Kuta",
                    'alamat' => "Desa Pujut, Lombok Tengah, Lombok, Nusa Tenggara Barat",
                    'kabupaten' => "Lombok Tengah",
                    'latitude' => "-8.894752",
                    'longitude' => "116.28317",
                    'keterangan' => ""
                ],
            ]
        );
    }
}
