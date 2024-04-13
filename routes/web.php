<?php

use App\Http\Controllers\alternatifController;
use App\Http\Controllers\hitungController;
use App\Http\Controllers\kriteriaController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index']);
Route::get('/kriteria', [kriteriaController::class, 'index']);
Route::get('/alternatif', [alternatifController::class, 'index']);
Route::get('/nilai', [nilaiController::class, 'index']);
Route::get('/hitung', [hitungController::class, 'index']);
