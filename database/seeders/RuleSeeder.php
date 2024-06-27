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
                'nilai_probabilitas' => 0.3,
            ],
            [
                'idGejala' => '6', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '11', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.2,
            ],
            [
                'idGejala' => '13', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '5', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.3,
            ],
            [
                'idGejala' => '6', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '11', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.2,
            ],
            [
                'idGejala' => '13', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '5', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.3,
            ],
            [
                'idGejala' => '6', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '11', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.2,
            ],
            [
                'idGejala' => '13', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.6,
            ],
            // Kode Penyakit P01
            [
                'idGejala' => '1', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '2', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.7,
            ],
            [
                'idGejala' => '3', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.5,
            ],
            [
                'idGejala' => '4', 
                'idPenyakit' => '1', 
                'nilai_probabilitas' => 0.5,
            ],
            // Kode Penyakit P02
            [
                'idGejala' => '7', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '8', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.8,
            ],
            [
                'idGejala' => '9', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.4,
            ],
            [
                'idGejala' => '10', 
                'idPenyakit' => '2', 
                'nilai_probabilitas' => 0.2,
            ],
            // Kode Penyakit P03
            [
                'idGejala' => '12', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.5,
            ],
            [
                'idGejala' => '14', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'idGejala' => '15', 
                'idPenyakit' => '3', 
                'nilai_probabilitas' => 0.4,
            ],
            // Tambahkan aturan lainnya sesuai dengan kombinasi gejala dan penyakit
        ];

        Rule::insert($aturanData);
    }
}
