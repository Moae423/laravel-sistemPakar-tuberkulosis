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
            ['id_gejala' => 'G01',
            'nama_gejala' => 'Frekuesi perafasan meningkat dan sering meloncat-loncat'],
            ['id_gejala' => 'G02',
            'nama_gejala' => 'Gelisah dan lamban'],
            ['id_gejala' => 'G03',
            'nama_gejala' => 'Ikan tampak kurus'],
            ['id_gejala' => 'G04',
            'nama_gejala' => 'Luka disekitar mulut dan bagian tubuh lainnya'],
            ['id_gejala' => 'G05',
            'nama_gejala' => 'Menggosok-gosokkan badan pada benda di sekitarnya'],
            ['id_gejala' => 'G06',
            'nama_gejala' => 'Menginfeksi jaringan ikat tapis insang, tulang kartilag, otot/daging dan beberapa organ dalam ikan (terutama benih)'],
            ['id_gejala' => 'G07',
            'nama_gejala' => 'Produksi lendir berlebihan'],
            ['id_gejala' => 'G08',
            'nama_gejala' => 'Warna tubuh pucat'],
            ['id_gejala' => 'G09',
            'nama_gejala' => 'Apabila menginfeksi insang, kerusakan dimulai dari ujung filamen insang dan merambat ke bagian pangkal, akhirnya filamen membusuk dan rontok'],
            ['id_gejala' => 'G10',
            'nama_gejala' => 'Bengkak-bengkak di bagian tubuh (kanan/kiri)'],
        ];

        foreach ($sample as $s) {
        	$g = new Gejala;
        	$g->id_gejala = $s['id_gejala'];
        	$g->nama_gejala = $s['nama_gejala'];
        	$g->save();
        }
    }
}
