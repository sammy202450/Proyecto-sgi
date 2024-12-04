<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oficina;

class OficinaController extends Controller
{
    //
    public function index(){
        return view('oficinas.index');
    }
}
