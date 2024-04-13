<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class kriteriaController extends Controller
{
    public function index(){
        return view('kriteria.index', 
       [ 'kriteria' => Kriteria::all() ]);
    }
}
