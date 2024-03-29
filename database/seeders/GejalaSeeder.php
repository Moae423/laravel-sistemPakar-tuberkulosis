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
        //
        $sample = [
            ['kode_gejala' => 'G01',
            'id_gejala'=> '01',
            'nama_gejala' => 'Batuk yang berlangsung lama 2 minggu'],
            ['kode_gejala' => 'G02',
            'id_gejala'=> '02',
            'nama_gejala' => 'Batuk yang disertai darah'],
            ['kode_gejala' => 'G03',
            'id_gejala'=> '03',
            'nama_gejala' => 'Nyeri dada saat bernapas atau batuk'],
            ['kode_gejala' => 'G04',
            'id_gejala'=> '04',
            'nama_gejala' => 'Berkeringat di malam hari'],
            ['kode_gejala' => 'G05',
            'id_gejala'=> '05',
            'nama_gejala' => 'Hilang nafsu makan'],
            ['kode_gejala' => 'G06',
            'id_gejala'=> '06',
            'nama_gejala' => 'Penurunan berat badan'],
            ['kode_gejala' => 'G07',
            'id_gejala'=> '07',
            'nama_gejala' => 'Rasa nyeri pada tulang atau jaringan sendi'],
            ['kode_gejala' => 'G08',
            'id_gejala'=> '08',
            'nama_gejala' => 'Bengkak pada bagian tulang/sendi abses'],
            ['kode_gejala' => 'G09',
            'id_gejala'=> '09',
            'nama_gejala' => 'Kekakuan tulang belakang'],
            ['kode_gejala' => 'G10',
            'id_gejala'=> '10',
            'nama_gejala' => 'Tulang belakang bungkuk'],
            ['kode_gejala' => 'G11',
            'id_gejala'=> '11',
            'nama_gejala' => 'Demam dan menggigil'],
            ['kode_gejala' => 'G12',
            'id_gejala'=> '12',
            'nama_gejala' => 'Kulit kemerahan berisi nanah '],
            ['kode_gejala' => 'G13',
            'id_gejala'=> '13',
            'nama_gejala' => 'Mudah lelah'],
            ['kode_gejala' => 'G14',
            'id_gejala'=> '14',
            'nama_gejala' => 'Muncul benjolan di leher bagian depan'],
            ['kode_gejala' => 'G15',
            'id_gejala'=> '15',
            'nama_gejala' => 'Terasa Gatal di area Lesi'],

        ];

        foreach ($sample as $s) {
        	$gejala = new Gejala;
        	$gejala->kode_gejala = $s['kode_gejala'];
        	$gejala->id_gejala = $s['id_gejala'];
        	$gejala->nama_gejala = $s['nama_gejala'];
        	$gejala->save();
        }
    }
}
