<?php

namespace App\Http\Controllers;

use App\Models\DataUji;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function adminHome()
    {
        $this->middleware('auth');
        return view('dashboard');
    }
    
    public function userHome()
    {
        $this->middleware('auth');
        $data = DataUji::All();
        if(auth()->user()->role == 'user') {
            $data = DataUji::where(['id_user'=>auth()->user()->id])->get();
        }
        return view('dashboard', compact('data'));
    }

    public function status()
    {
        $data = DataUji::All();
        return view('status', compact('data'));
    }
}
