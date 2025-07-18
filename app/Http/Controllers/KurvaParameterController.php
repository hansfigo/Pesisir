<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurvaParameterController extends Controller
{
    public function index()
    {
        return view('kurva.index');
    }
}
