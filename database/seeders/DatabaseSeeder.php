<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('tb_alternatif')->insert([
            [
                'nama_alternatif' => 'Teknik Sipil',
            ],
            [
                'nama_alternatif' => 'Teknik Elektro',
            ],
            [
                'nama_alternatif' => 'Teknik Komputer dan Jaringan',
            ],
        ]);
        DB::table('tb_kriteria')->insert([
            [
                'nama_kriteria' => 'Kimia',
            ],
            [
                'nama_kriteria' => 'Biologi',
            ],
            [
                'nama_kriteria' => 'Fisika',
            ],
            [
                'nama_kriteria' => 'Praktek',
            ],
            [
                'nama_kriteria' => 'Bahasa Inggris',
            ],
            [
                'nama_kriteria' => 'Bahasa Indonesia',
            ],
            [
                'nama_kriteria' => 'Matematika',
            ],
            [
                'nama_kriteria' => 'kejuruan Teknik',
            ],
           
        ]);


    }
}
