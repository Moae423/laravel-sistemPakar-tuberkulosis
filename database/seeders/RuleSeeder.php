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
                'kode_gejala' => '1', // Kode gejala Batuk
                'kode_penyakit' => '1', // Kode penyakit Influenza Like Common (ILI)
                'nilai_probabilitas' => 0.8,
            ],
            [
                'kode_gejala' => '2', // Kode gejala Hidung Tersumbat
                'kode_penyakit' => '1',
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '3', // Kode gejala Demam
                'kode_penyakit' => '1',
                'nilai_probabilitas' => 0.7,
            ],
            [
                'kode_gejala' => '4',
                'kode_penyakit' => '1', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '5',
                'kode_penyakit' => '1', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '6',
                'kode_penyakit' => '1', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '1', // Kode gejala Batuk
                'kode_penyakit' => '2', // Kode penyakit Influenza Like Common (ILI)
                'nilai_probabilitas' => 0.8,
            ],
            [
                'kode_gejala' => '2', // Kode gejala Hidung Tersumbat
                'kode_penyakit' => '2',
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '3', // Kode gejala Demam
                'kode_penyakit' => '2',
                'nilai_probabilitas' => 0.7,
            ],
            [
                'kode_gejala' => '4',
                'kode_penyakit' => '2', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '5',
                'kode_penyakit' => '2', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '6',
                'kode_penyakit' => '2', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '1', // Kode gejala Batuk
                'kode_penyakit' => '3', // Kode penyakit Influenza Like Common (ILI)
                'nilai_probabilitas' => 0.8,
            ],
            [
                'kode_gejala' => '2', // Kode gejala Hidung Tersumbat
                'kode_penyakit' => '3',
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '3', // Kode gejala Demam
                'kode_penyakit' => '3',
                'nilai_probabilitas' => 0.7,
            ],
            [
                'kode_gejala' => '4',
                'kode_penyakit' => '3', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '5',
                'kode_penyakit' => '3', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '6',
                'kode_penyakit' => '3', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '11',
                'kode_penyakit' => '1', // Kode penyakit Bronkhitis
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '13', // Kode gejala Sakit Tenggorokan
                'kode_penyakit' => '1',
                'nilai_probabilitas' => 0.7,
            ],
            [
                'kode_gejala' => '12',
                'kode_penyakit' => '3',
                'nilai_probabilitas' => 0.5,
            ],
            [
                'kode_gejala' => '14',
                'kode_penyakit' => '3', // Kode penyakit Faringitis
                'nilai_probabilitas' => 0.9,
            ],
            [
                'kode_gejala' => '15', // Kode gejala Mual
                'kode_penyakit' => '3',
                'nilai_probabilitas' => 0.4,
            ],
            [
                'kode_gejala' => '7', // Kode gejala Muntah
                'kode_penyakit' => '2',
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '8', // Kode gejala Muntah
                'kode_penyakit' => '2',
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '9', // Kode gejala Muntah
                'kode_penyakit' => '2',
                'nilai_probabilitas' => 0.6,
            ],
            [
                'kode_gejala' => '10', // Kode gejala Muntah
                'kode_penyakit' => '2',
                'nilai_probabilitas' => 0.6,
            ],
            // Tambahkan aturan lainnya sesuai dengan kombinasi gejala dan penyakit
        ];

        Rule::insert($aturanData);
    }
}
