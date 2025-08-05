<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdatedDataParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Data berdasarkan tabel Excel yang telah diperbaharui
     *
     * @return void
     */
    public function run()
    {
        // Hapus data lama
        DB::table('data_parameter')->truncate();
        
        DB::table('data_parameter')->insert([
            // ============ BIOTA LAUT ============
            
            // 1. Kecerahan (Parameter ID belum diketahui, akan disesuaikan)
            [
                'id_parameter' => 1, // Kecerahan
                'satuan' => 'm',
                'baku_mutu' => '6',
                'nilai' => '6',
                'coefficient_a' => 100,
                'coefficient_b' => null, // Tidak ada rumus exponential
                'y0' => 80,
            ],
            
            // 2. Kekeruhan
            [
                'id_parameter' => 2, // Kekeruhan 
                'satuan' => 'NTU',
                'baku_mutu' => '5',
                'nilai' => '5',
                'coefficient_a' => 100,
                'coefficient_b' => -0.04463,
                'y0' => 80,
            ],
            
            // 3. Kebauan
            [
                'id_parameter' => 3, // Kebauan
                'satuan' => '',
                'baku_mutu' => 'Alami',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 4. Padatan Tersuspensi Total (TSS)
            [
                'id_parameter' => 4, // TSS
                'satuan' => 'mg/L',
                'baku_mutu' => '20',
                'nilai' => '20',
                'coefficient_a' => 100,
                'coefficient_b' => -0.01116,
                'y0' => 80,
            ],
            
            // 5. Sampah
            [
                'id_parameter' => 5, // Sampah
                'satuan' => '',
                'baku_mutu' => 'Nihil',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 6. Suhu
            [
                'id_parameter' => 6, // Suhu
                'satuan' => '°C',
                'baku_mutu' => '29',
                'nilai' => '29',
                'coefficient_a' => 100,
                'coefficient_b' => -0.00769,
                'y0' => 80,
            ],
            
            // 7. Lapisan Minyak
            [
                'id_parameter' => 7, // Lapisan Minyak
                'satuan' => '',
                'baku_mutu' => 'Nihil',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 8. pH
            [
                'id_parameter' => 8, // pH
                'satuan' => '',
                'baku_mutu' => '7-8.5',
                'nilai' => '7.75',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 9. Salinitas
            [
                'id_parameter' => 9, // Salinitas
                'satuan' => '‰',
                'baku_mutu' => '33.5',
                'nilai' => '33.5',
                'coefficient_a' => 100,
                'coefficient_b' => -0.00666,
                'y0' => 80,
            ],
            
            // 10. Oksigen Terlarut (DO)
            [
                'id_parameter' => 10, // DO
                'satuan' => 'mg/L',
                'baku_mutu' => '>5',
                'nilai' => '5',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 11. BOD5 - BIOTA LAUT
            [
                'id_parameter' => 11, // BOD5
                'satuan' => 'mg/L',
                'baku_mutu' => '20',
                'nilai' => '20',
                'coefficient_a' => 100,
                'coefficient_b' => -0.01116,
                'y0' => 80,
            ],
            
            // 12. Amonia total (NH3-N) - BIOTA LAUT
            [
                'id_parameter' => 12, // NH3-N
                'satuan' => 'mg/L',
                'baku_mutu' => '0.3',
                'nilai' => '0.3',
                'coefficient_a' => 100,
                'coefficient_b' => -0.74381,
                'y0' => 80,
            ],
            
            // 13. Ortofosfat (PO4-P) - BIOTA LAUT
            [
                'id_parameter' => 13, // PO4-P
                'satuan' => 'mg/L',
                'baku_mutu' => '0.015',
                'nilai' => '0.015',
                'coefficient_a' => 100,
                'coefficient_b' => -14.87624,
                'y0' => 80,
            ],
            
            // 14. Nitrat (NO3-N) - BIOTA LAUT
            [
                'id_parameter' => 14, // NO3-N
                'satuan' => 'mg/L',
                'baku_mutu' => '0.06',
                'nilai' => '0.06',
                'coefficient_a' => 100,
                'coefficient_b' => -3.71906,
                'y0' => 80,
            ],
            
            // 15. Sianida (CN-) - BIOTA LAUT
            [
                'id_parameter' => 15, // CN
                'satuan' => 'mg/L',
                'baku_mutu' => '0.5',
                'nilai' => '0.5',
                'coefficient_a' => 100,
                'coefficient_b' => -0.44629,
                'y0' => 80,
            ],
            
            // 16. Sulfida (H2S) - BIOTA LAUT
            [
                'id_parameter' => 16, // H2S
                'satuan' => 'mg/L',
                'baku_mutu' => '0.01',
                'nilai' => '0.01',
                'coefficient_a' => 100,
                'coefficient_b' => -22.31436,
                'y0' => 80,
            ],
            
            // 17. Hidrokarbon Petroleum Total (TPH) - BIOTA LAUT
            [
                'id_parameter' => 17, // TPH
                'satuan' => 'mg/L',
                'baku_mutu' => '0.02',
                'nilai' => '0.02',
                'coefficient_a' => 100,
                'coefficient_b' => -11.15718,
                'y0' => 80,
            ],
            
            // 18. Fenol total - BIOTA LAUT
            [
                'id_parameter' => 18, // Fenol
                'satuan' => 'mg/L',
                'baku_mutu' => '0.002',
                'nilai' => '0.002',
                'coefficient_a' => 100,
                'coefficient_b' => -111.57178,
                'y0' => 80,
            ],
            
            // 19. PAH - BIOTA LAUT
            [
                'id_parameter' => 19, // PAH
                'satuan' => 'mg/L',
                'baku_mutu' => '0.003',
                'nilai' => '0.003',
                'coefficient_a' => 100,
                'coefficient_b' => -74.38118,
                'y0' => 80,
            ],
            
            // 20. PCB - BIOTA LAUT
            [
                'id_parameter' => 20, // PCB
                'satuan' => 'mg/L',
                'baku_mutu' => '0.01',
                'nilai' => '0.01',
                'coefficient_a' => 100,
                'coefficient_b' => -22.31436,
                'y0' => 80,
            ],
            
            // 21. Surfaktan (MBAS) - BIOTA LAUT
            [
                'id_parameter' => 21, // MBAS
                'satuan' => 'mg/L',
                'baku_mutu' => '1',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => -0.22314,
                'y0' => 80,
            ],
            
            // 22. Minyak dan Lemak - BIOTA LAUT
            [
                'id_parameter' => 22, // Minyak Lemak
                'satuan' => 'mg/L',
                'baku_mutu' => '1',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => -0.22314,
                'y0' => 80,
            ],
            
            // 23-27. Pestisida (BHC, DDT, Endrin, Toxaphan, TBT)
            [
                'id_parameter' => 23, // BHC
                'satuan' => 'mg/L',
                'baku_mutu' => '0.0001',
                'nilai' => '0.0001',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            [
                'id_parameter' => 24, // DDT
                'satuan' => 'mg/L',
                'baku_mutu' => '0.0001',
                'nilai' => '0.0001',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            [
                'id_parameter' => 25, // Endrin
                'satuan' => 'mg/L',
                'baku_mutu' => '0.0001',
                'nilai' => '0.0001',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            [
                'id_parameter' => 26, // Toxaphan
                'satuan' => 'mg/L',
                'baku_mutu' => '0.0001',
                'nilai' => '0.0001',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            [
                'id_parameter' => 27, // TBT
                'satuan' => 'mg/L',
                'baku_mutu' => '0.0001',
                'nilai' => '0.0001',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 28. Raksa (Hg) - BIOTA LAUT
            [
                'id_parameter' => 28, // Hg
                'satuan' => 'mg/L',
                'baku_mutu' => '0.001',
                'nilai' => '0.001',
                'coefficient_a' => 100,
                'coefficient_b' => -223.14355,
                'y0' => 80,
            ],
            
            // 29. Kromium heksavalen (Cr(VI)) - BIOTA LAUT
            [
                'id_parameter' => 29, // Cr(VI)
                'satuan' => 'mg/L',
                'baku_mutu' => '0.005',
                'nilai' => '0.005',
                'coefficient_a' => 100,
                'coefficient_b' => -44.62871,
                'y0' => 80,
            ],
            
            // 30. Arsen (As) - BIOTA LAUT
            [
                'id_parameter' => 30, // As
                'satuan' => 'mg/L',
                'baku_mutu' => '0.012',
                'nilai' => '0.012',
                'coefficient_a' => 100,
                'coefficient_b' => -18.59530,
                'y0' => 80,
            ],
            
            // 31. Kadmium (Cd) - BIOTA LAUT
            [
                'id_parameter' => 31, // Cd
                'satuan' => 'mg/L',
                'baku_mutu' => '0.001',
                'nilai' => '0.001',
                'coefficient_a' => 100,
                'coefficient_b' => -223.14355,
                'y0' => 80,
            ],
            
            // 32. Tembaga (Cu) - BIOTA LAUT
            [
                'id_parameter' => 32, // Cu
                'satuan' => 'mg/L',
                'baku_mutu' => '0.008',
                'nilai' => '0.008',
                'coefficient_a' => 100,
                'coefficient_b' => -27.89294,
                'y0' => 80,
            ],
            
            // 33. Timbal (Pb) - BIOTA LAUT
            [
                'id_parameter' => 33, // Pb
                'satuan' => 'mg/L',
                'baku_mutu' => '0.008',
                'nilai' => '0.008',
                'coefficient_a' => 100,
                'coefficient_b' => -27.89294,
                'y0' => 80,
            ],
            
            // 34. Seng (Zn) - BIOTA LAUT
            [
                'id_parameter' => 34, // Zn
                'satuan' => 'mg/L',
                'baku_mutu' => '0.05',
                'nilai' => '0.05',
                'coefficient_a' => 100,
                'coefficient_b' => -4.46287,
                'y0' => 80,
            ],
            
            // 35. Nikel (Ni) - BIOTA LAUT
            [
                'id_parameter' => 35, // Ni
                'satuan' => 'mg/L',
                'baku_mutu' => '0.05',
                'nilai' => '0.05',
                'coefficient_a' => 100,
                'coefficient_b' => -4.46287,
                'y0' => 80,
            ],
            
            // 36. Coliform Total - BIOTA LAUT
            [
                'id_parameter' => 36, // Coliform Total
                'satuan' => 'MPN/100ml',
                'baku_mutu' => '1000',
                'nilai' => '1000',
                'coefficient_a' => 100,
                'coefficient_b' => -0.00022,
                'y0' => 80,
            ],
            
            // 37. Patogen
            [
                'id_parameter' => 37, // Patogen
                'satuan' => '',
                'baku_mutu' => 'Nihil',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // 38. Fitoplankton - BIOTA LAUT
            [
                'id_parameter' => 38, // Fitoplankton
                'satuan' => 'sel/L',
                'baku_mutu' => '1000',
                'nilai' => '1000',
                'coefficient_a' => 100,
                'coefficient_b' => -0.00022,
                'y0' => 80,
            ],
            
            // 39. Radioaktivitas - BIOTA LAUT
            [
                'id_parameter' => 39, // Radioaktivitas
                'satuan' => 'Bq/L',
                'baku_mutu' => '4',
                'nilai' => '4',
                'coefficient_a' => 100,
                'coefficient_b' => -0.05579,
                'y0' => 80,
            ],
            
            // ============ WISATA BAHARI ============
            
            // Parameter wisata bahari dimulai dari ID yang sesuai dengan ParameterSeeder
            // Asumsi ID dimulai dari 40+ untuk wisata bahari
            
            // BOD5 - WISATA BAHARI
            [
                'id_parameter' => 51, // BOD5 Wisata Bahari (sesuaikan dengan ParameterSeeder)
                'satuan' => 'mg/L',
                'baku_mutu' => '10',
                'nilai' => '10',
                'coefficient_a' => 100,
                'coefficient_b' => -0.02231,
                'y0' => 80,
            ],
            
            // Amonia total (NH3-N) - WISATA BAHARI
            [
                'id_parameter' => 52, // NH3-N Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.02',
                'nilai' => '0.02',
                'coefficient_a' => 100,
                'coefficient_b' => -11.15718,
                'y0' => 80,
            ],
            
            // Ortofosfat (PO4-P) - WISATA BAHARI (sama dengan Biota Laut)
            [
                'id_parameter' => 53, // PO4-P Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.015',
                'nilai' => '0.015',
                'coefficient_a' => 100,
                'coefficient_b' => -14.87624,
                'y0' => 80,
            ],
            
            // Nitrat (NO3-N) - WISATA BAHARI (sama dengan Biota Laut)
            [
                'id_parameter' => 54, // NO3-N Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.06',
                'nilai' => '0.06',
                'coefficient_a' => 100,
                'coefficient_b' => -3.71906,
                'y0' => 80,
            ],
            
            // Sulfida (H2S) - WISATA BAHARI
            [
                'id_parameter' => 63, // H2S Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.002',
                'nilai' => '0.002',
                'coefficient_a' => 100,
                'coefficient_b' => -111.57178,
                'y0' => 80,
            ],
            
            // Fenol total - WISATA BAHARI
            [
                'id_parameter' => 65, // Fenol Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.001',
                'nilai' => '0.001',
                'coefficient_a' => 100,
                'coefficient_b' => -223.14355,
                'y0' => 80,
            ],
            
            // PAH - WISATA BAHARI (sama dengan Biota Laut)
            [
                'id_parameter' => 66, // PAH Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.003',
                'nilai' => '0.003',
                'coefficient_a' => 100,
                'coefficient_b' => -74.38118,
                'y0' => 80,
            ],
            
            // PCB - WISATA BAHARI
            [
                'id_parameter' => 67, // PCB Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.005',
                'nilai' => '0.005',
                'coefficient_a' => 100,
                'coefficient_b' => -44.62871,
                'y0' => 80,
            ],
            
            // Surfaktan (MBAS) - WISATA BAHARI
            [
                'id_parameter' => 68, // MBAS Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.001',
                'nilai' => '0.001',
                'coefficient_a' => 100,
                'coefficient_b' => -223.14355,
                'y0' => 80,
            ],
            
            // Minyak dan Lemak - WISATA BAHARI (tidak ada rumus di Excel)
            [
                'id_parameter' => 69, // Minyak Lemak Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '1',
                'nilai' => '1',
                'coefficient_a' => 100,
                'coefficient_b' => null,
                'y0' => 80,
            ],
            
            // Hg - WISATA BAHARI
            [
                'id_parameter' => 70, // Hg Wisata Bahari (sesuaikan ID)
                'satuan' => 'mg/L',
                'baku_mutu' => '0.002',
                'nilai' => '0.002',
                'coefficient_a' => 100,
                'coefficient_b' => -111.57178,
                'y0' => 80,
            ],
            
            // Cr(VI) - WISATA BAHARI
            [
                'id_parameter' => 71, // Cr(VI) Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.002',
                'nilai' => '0.002',
                'coefficient_a' => 100,
                'coefficient_b' => -111.57178,
                'y0' => 80,
            ],
            
            // As - WISATA BAHARI
            [
                'id_parameter' => 72, // As Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.025',
                'nilai' => '0.025',
                'coefficient_a' => 100,
                'coefficient_b' => -8.92574,
                'y0' => 80,
            ],
            
            // Cd - WISATA BAHARI
            [
                'id_parameter' => 73, // Cd Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.002',
                'nilai' => '0.002',
                'coefficient_a' => 100,
                'coefficient_b' => -111.57178,
                'y0' => 80,
            ],
            
            // Cu - WISATA BAHARI
            [
                'id_parameter' => 74, // Cu Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.05',
                'nilai' => '0.05',
                'coefficient_a' => 100,
                'coefficient_b' => -4.46287,
                'y0' => 80,
            ],
            
            // Pb - WISATA BAHARI
            [
                'id_parameter' => 75, // Pb Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.005',
                'nilai' => '0.005',
                'coefficient_a' => 100,
                'coefficient_b' => -44.62871,
                'y0' => 80,
            ],
            
            // Zn - WISATA BAHARI
            [
                'id_parameter' => 76, // Zn Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.095',
                'nilai' => '0.095',
                'coefficient_a' => 100,
                'coefficient_b' => -2.34888,
                'y0' => 80,
            ],
            
            // Ni - WISATA BAHARI
            [
                'id_parameter' => 77, // Ni Wisata Bahari
                'satuan' => 'mg/L',
                'baku_mutu' => '0.075',
                'nilai' => '0.075',
                'coefficient_a' => 100,
                'coefficient_b' => -2.97525,
                'y0' => 80,
            ],
            
            // Fecal Coliform - WISATA BAHARI
            [
                'id_parameter' => 78, // Fecal Coliform Wisata Bahari
                'satuan' => 'MPN/100ml',
                'baku_mutu' => '200',
                'nilai' => '200',
                'coefficient_a' => 100,
                'coefficient_b' => -0.00112,
                'y0' => 80,
            ],
        ]);
    }
}
