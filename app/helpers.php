<?php
function hitung($angka) {
    if($angka < 25) {
        return 'Sangat Buruk';
    } else if($angka < 50) {
        return 'Buruk';
    } else if($angka < 70) {
        return 'Sedang';
    } else if($angka < 90) {
        return 'Bagus';
    } else if($angka < 100) {
        return 'Sangat Bagus';
    }
}

function statusAir($pengujian)
{
    $no = 1;
    $WQIA = [];
    $WQIAU = [];
    $hasil = [];

    $id = $pengujian->id;
    $parameter = [];
    foreach($pengujian->sample as $isi) {
        $parameter[$isi->param->jenis][$isi->id_parameter][$isi->uji_ke] = $isi->hasil;
    }
    $totalVi = 0;
    foreach ($pengujian->sample  as $isi):
        if ($isi->param->jenis == 'biota' && $isi->uji_ke == 1){
                $Vi = round(1 / ($isi->get_data->nilai==''?1:$isi->get_data->nilai), 5);
                $totalVi += $Vi;
        }
    endforeach;
    foreach ($pengujian->sample as $sample):
        if ($sample->param->jenis == 'biota' && $sample->uji_ke == 1):
            $sample_uji = $sample->pluck('uji_ke','uji_ke')->toArray();
            foreach ($sample_uji as $isi) {
                $SVi = ($sample->get_data->nilai==''?1:$sample->get_data->nilai);
                $Vi = round(1 / $SVi, 2);
                $k = 1 / $totalVi;
                $Wi = $k / $SVi;
                // Nilai Y didapat dari perkalian sampel dengan kurva tiap parameter
                if ($sample->param->id == 11) {
                    // 11 = BOD5
                    $nilaiY = 1.01040745922865 * exp(-0.116995811136413 * ($parameter['biota'][$sample->id_parameter][$isi] ?? 0));
                } elseif ($sample->param->id == 12) {
                    // 12 = Amonia total
                    $nilaiY = 1.010498667279 * exp(-0.0077965531620728 * ($parameter['biota'][$sample->id_parameter][$isi] ?? 0));
                } elseif ($sample->param->id == 13) {
                    // 13 = Ortofosfat
                    $nilaiY = 0.981085972533536 * exp(-0.153725962938623 * ($parameter['biota'][$sample->id_parameter][$isi] ?? 0));
                } elseif ($sample->param->id == 14) {
                    // 14 = Nitrat
                    $nilaiY = 1.01050605076391 * exp(-0.292728289588808 * ($parameter['biota'][$sample->id_parameter][$isi] ?? 0));
                } else {
                    $nilaiY = 0;
                }
                
                // Nilai y * 100 * nilai Wi (diklai 100 untung menghilangkan 0 di depan angka)
                $hasil[$isi] = $nilaiY * 100 * $Wi;
                $x = $nilaiY * 100;
                
                // Total Nilai akhir
                $WQIA[$isi] = empty($WQIA[$isi]) ? 0 : $WQIA[$isi];
                $WQIA[$isi] += $hasil[$isi];
                
                // Total Nilai perkalian nilaiY *100
                $WQIAU[$isi] = empty($WQIAU[$isi]) ? 0 : $WQIAU[$isi];
                $WQIAU[$isi] += $x;
            }
        endif;
    endforeach;
    $WQIA = empty($WQIA) ? [0,0] : $WQIA;
    $min = number_format(min($WQIA), 2, ',', ' ');
    $mean = number_format(array_sum($WQIA)/count($WQIA), 2, ',', ' ');
    $max = number_format(max($WQIA), 2, ',', ' ');

    return hitung($max);
}