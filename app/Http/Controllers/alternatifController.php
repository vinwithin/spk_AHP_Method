<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class alternatifController extends Controller
{
    public function index(){
        return view('alternatif.index', [
            'alternatif' => Alternatif::all(),
        ]);
    }
}
