<?php

namespace Database\Seeders;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aturanData = [
            [
                'idGejala' => '5', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.35,
            ],
            [
                'idGejala' => '6', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.36,
            ],
            [
                'idGejala' => '11', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.20,
            ],
            [
                'idGejala' => '13', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.20,
            ],
            [
                'idGejala' => '5', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.35,
            ],
            [
                'idGejala' => '6', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.36,
            ],
            [
                'idGejala' => '11', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.20,
            ],
            [
                'idGejala' => '13', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.20,
            ],
            [
                'idGejala' => '5', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.35,
            ],
            [
                'idGejala' => '6', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.36,
            ],
            [
                'idGejala' => '11', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.20,
            ],
            [
                'idGejala' => '13', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.20,
            ],
            // Kode Penyakit P01
            [
                'idGejala' => '1', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.55,
            ],
            [
                'idGejala' => '2', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.68,
            ],
            [
                'idGejala' => '3', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.57,
            ],
            [
                'idGejala' => '4', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.65,
            ],
            // Kode Penyakit P02
            [
                'idGejala' => '7', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.55,
            ],
            [
                'idGejala' => '8', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.60,
            ],
            [
                'idGejala' => '9', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.51,
            ],
            [
                'idGejala' => '10', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.57,
            ],
            // Kode Penyakit P03
            [
                'idGejala' => '12', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.48,
            ],
            [
                'idGejala' => '14', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.59,
            ],
            [
                'idGejala' => '15', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.52,
            ],
            // Tambahkan aturan lainnya sesuai dengan kombinasi gejala dan penyakit
        ];

        Rule::insert($aturanData);
    }
}
