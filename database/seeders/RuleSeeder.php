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
                'kode_gejala' => '5', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.3,
            ],
            [
                'kode_gejala' => '6', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '11', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.2,
            ],
            [
                'kode_gejala' => '13', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '5', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.3,
            ],
            [
                'kode_gejala' => '6', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '11', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.2,
            ],
            [
                'kode_gejala' => '13', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '5', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.3,
            ],
            [
                'kode_gejala' => '6', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '11', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.2,
            ],
            [
                'kode_gejala' => '13', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.6,
            ],
            // Kode Penyakit P01
            [
                'kode_gejala' => '1', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '2', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.7,
            ],
            [
                'kode_gejala' => '3', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.5,
            ],
            [
                'kode_gejala' => '4', 
                'kode_penyakit' => '1', 
                'nilai_probabilitas' => 0.5,
            ],
            // Kode Penyakit P02
            [
                'kode_gejala' => '7', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '8', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.8,
            ],
            [
                'kode_gejala' => '9', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '10', 
                'kode_penyakit' => '2', 
                'nilai_probabilitas' => 0.2,
            ],
            // Kode Penyakit P03
            [
                'kode_gejala' => '12', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.5,
            ],
            [
                'kode_gejala' => '14', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '15', 
                'kode_penyakit' => '3', 
                'nilai_probabilitas' => 0.4,
            ],
            // Tambahkan aturan lainnya sesuai dengan kombinasi gejala dan penyakit
        ];

        Rule::insert($aturanData);
    }
}
