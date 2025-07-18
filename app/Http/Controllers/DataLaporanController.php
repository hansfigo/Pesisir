<?php

namespace App\Http\Controllers;

use App\Models\DataUji;
use App\Models\SampelUji;
use Illuminate\Http\Request;

class DataLaporanController extends Controller
{
    public function index()
    {
        $data = DataUji::All();
        return view('data.laporan.index', compact('data'));
    }

    public function detail($id)
    {
        $id = base64_decode($id);
        $data = SampelUji::where('id_uji', $id)->get();
        $sample = $data->pluck('uji_ke','uji_ke')->toArray();
        $parameter = [];
        foreach($data as $isi) {
            $parameter[$isi->param->jenis][$isi->id_parameter][$isi->uji_ke] = $isi->hasil;
        }
        return view('data.laporan.detail_laporan', compact('data','sample','parameter'));
    }
}
