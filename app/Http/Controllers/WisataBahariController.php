<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Models\GolonganParameter;

class WisataBahariController extends Controller
{
    public function index()
    {
        $data = Parameter::All();
        $golongan = GolonganParameter::All();
        return view('component.wisata-bahari.index', compact('data', 'golongan'));
    }

    public function addNew(Request $request)
    {
        $addParameter = Parameter::create([
            'id_gol' => $request->id_gol,
            'parameter' => $request->parameter,
            'nama_lain' => $request->nama_lain,
            'jenis' => "wisata",
        ]);
        $addParameter->save();

        if ($addParameter) {
            return redirect('/parameter-wisatabahari')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Parameter::findOrFail($id)->update([
            'id_gol' => $request->id_gol,
            'parameter' => $request->parameter,
            'nama_lain' => $request->nama_lain,
            'jenis' => "wisata",
        ]);
        if ($process) {
            return redirect('/parameter-wisatabahari')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Parameter::findOrFail($id)->delete();
            if ($process) {
                return redirect()->back()->with("delete", "Poof! Your data has been deleted!");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
