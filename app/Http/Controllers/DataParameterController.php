<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Models\DataParameter;

class DataParameterController extends Controller
{
    public function index_biota()
    {
        $data = DataParameter::All();
        return view('data.parameter.biota-index', compact('data'));
    }

    public function index_wisata()
    {
        $data = DataParameter::All();
        return view('data.parameter.wisata-index', compact('data'));
    }

    public function processUpdate_biota(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = DataParameter::findOrFail($id)->update([
            'id_parameter' => $request->id_parameter,
            'satuan' => $request->satuan,
            'baku_mutu' => $request->baku_mutu,
            'nilai' => $request->nilai,
        ]);
        if ($process) {
            return redirect('/data-parameter/biota-laut')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate_wisata(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = DataParameter::findOrFail($id)->update([
            'id_parameter' => $request->id_parameter,
            'satuan' => $request->satuan,
            'baku_mutu' => $request->baku_mutu,
            'nilai' => $request->nilai,
        ]);
        if ($process) {
            return redirect('/data-parameter/wisata-bahari')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
}
