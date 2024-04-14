<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\nilaiSubkriteria;
use Illuminate\Http\Request;

class hitungController extends Controller
{
    public function index()
    {
        $kriterias = [];
        $alternatifs = [];
        $nilais = [];
        $nilaiSub = [];
        foreach (Kriteria::all() as $kriteria)
            $kriterias[$kriteria->id] = $kriteria;   
        foreach (Alternatif::all() as $alternatif)
            $alternatifs[$alternatif->id] = $alternatif;   
        foreach (Nilai::orderBy('id_kriteria_1')->orderBy('id_kriteria_2')->get() as $nilai){
            $nilais[$nilai->id_kriteria_1][$nilai->id_kriteria_2] = $nilai->nilai;     
        }     
        foreach (nilaiSubkriteria::orderBy('id_kriteria')->orderBy('id_alternatif')->get() as $nilaiSubkriteria){
            $nilaiSub[$nilaiSubkriteria->id_kriteria][$nilaiSubkriteria->id_alternatif] = $nilaiSubkriteria->nilai;     
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
        
       $eigenValue = [];
        foreach ($prioritas as $key => $val) {
            $eigenValue[$key] =   $val * $total[$key];   
              
        }
    
        $ci = (array_sum($eigenValue) - count($kriterias)) / (count($kriterias) - 1);       
        $ri = 1.41;
        $cr = $ci / $ri;
       //dd($ci);

       $arr1 = [];
       foreach ($nilaiSub as $key => $val){
           foreach($val as $k => $v){
              $arr1[$key][$k] = $v;
           }
           
       }
       $total_akhir = [];
        foreach ($arr1 as $key => $val) {
            foreach($val as $k => $v){
            $total_akhir[$key][$k] = $v * $prioritas[$key];      
            } 
        }
        $jumlah_total = [];
        foreach ($total_akhir as $key => $val) {
            foreach($val as $k => $v){
            $jumlah_total[$k][$key] = $v;      
            } 
        }
        $akhir = [];
        foreach ($jumlah_total as $key => $val) {
            $akhir[$key] = array_sum($val);       
        }

        $rank = [];
        arsort($akhir);    
        $no = 1;
        foreach ($akhir as $key => $val) {
            $rank[$key] = $no++;
        }
        ksort($rank);
      


        
        return view('hitung.index', ['matriks'=> $matriks, 'kriterias' => $kriterias, 'alternatif' => $alternatifs, 'total' => $total, 'jumlah' => $jumlah, 'prioritas' => $prioritas, 'eigenValue' => $eigenValue, "ci" => $ci,
            'ri' => $ri, 'cr' => $cr, 'jumlah_total' => $jumlah_total, 'akhir' => $akhir, 'rank' => $rank]);
    }
}
