<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    public function index()
    {
        $kriterias = [];
        $nilais = [];
        foreach (Kriteria::all() as $kriteria)
            $kriterias[$kriteria->id] = $kriteria;   
        foreach (Nilai::orderBy('id_kriteria_1')->orderBy('id_kriteria_2')->get() as $nilai){
            $nilais[$nilai->id_kriteria_1][$nilai->id_kriteria_2] = $nilai->nilai;     
        }     
        $arr = [];
        foreach ($nilais as $key => $val){
            foreach($val as $k => $v){
               $arr[$k][$key] = $v;
            }
            
        }
        
        $total = [];
        foreach ($arr as $key => $val) {
            $total[$key] = array_sum($val);       
        }
        dd($total);
        
        
        return view('nilai.index', ['nilais'=> $nilais, 'kriteria' => Kriteria::all(), 'total' => $total]);
    }
}
