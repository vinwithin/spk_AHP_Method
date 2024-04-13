<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class hitungController extends Controller
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
        // dd($arr);
        $total = [];
        foreach ($arr as $key => $val) {
            $total[$key] = array_sum($val);       
        }
        $matriks = [];
        foreach ($nilais as $key => $val){
            foreach($val as $k => $v){
               $matriks[$key][$k] = $v / $total[$k];
               
            }

            
        }
        $jumlah = [];
        foreach ($matriks as $key => $val) {
            $jumlah[$key] = array_sum($val);       
        }
        $prioritas = [];
        foreach ($jumlah as $key => $val) {
            $prioritas[$key] = $val / count($kriterias);       
        }
        
       
        
        
        return view('hitung.index', ['matriks'=> $matriks, 'kriterias' => $kriterias, 'total' => $total, 'jumlah' => $jumlah, 'prioritas' => $prioritas]);
    }
}
