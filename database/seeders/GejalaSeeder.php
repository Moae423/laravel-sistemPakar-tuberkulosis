<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejalas = [
            ['nama_gejala' => 'Batuk yang berlangsung lama 2 minggu',
            'kode_gejala' => 'G01'],
            ['nama_gejala' => 'Batuk yang disertai darah',
            'kode_gejala' => 'G02'],
            ['nama_gejala' => 'Nyeri dada saat bernapas atau batuk',
            'kode_gejala' => 'G03'],
            ['nama_gejala' => 'Berkeringat di malam hari',
            'kode_gejala' => 'G04'],
            ['nama_gejala' => 'Hilang nafsu makan',
            'kode_gejala' => 'G05'],
            ['nama_gejala' => 'Penurunan berat badan',
            'kode_gejala' => 'G06'],
            ['nama_gejala' => 'Rasa nyeri pada tulang atau jaringan sendi',
            'kode_gejala' => 'G07'],
            ['nama_gejala' => 'Bengkak pada bagian tulang/sendi abses',
            'kode_gejala' => 'G08'],
            ['nama_gejala' => 'Kekakuan tulang belakang',
            'kode_gejala' => 'G09'],
            ['nama_gejala' => 'Tulang belakang bungkuk',
            'kode_gejala' => 'G10'],
            ['nama_gejala' => 'Demam dan menggigil',
            'kode_gejala' => 'G11'],
            ['nama_gejala' => 'Kulit kemerahan berisi nanah',
            'kode_gejala' => 'G12'],
            ['nama_gejala' => 'Mudah lelah',
            'kode_gejala' => 'G13'],
            ['nama_gejala' => 'Muncul benjolan di leher bagian depan',
            'kode_gejala' => 'G14'],
            ['nama_gejala' => 'Terasa Gatal di area Lesi',
            'kode_gejala' => 'G15'],
        ];

        Gejala::insert($gejalas);
    }
}
