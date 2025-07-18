<?php

namespace App\Http\Controllers;

use App\Models\DataPesisir;
use Illuminate\Http\Request;

class DataPesisirController extends Controller
{
    public function index()
    {
        $data = DataPesisir::All();
        return view('data.pesisir.index', compact('data'));
    }

    public function addNew(Request $request)
    {
        $addPesisir = DataPesisir::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kabupaten' => $request->kabupaten,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        $addPesisir->save();

        if ($addPesisir) {
            return redirect('/data-pesisir')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = DataPesisir::findOrFail($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kabupaten' => $request->kabupaten,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        if ($process) {
            return redirect('/data-pesisir')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = DataPesisir::findOrFail($id)->delete();
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
