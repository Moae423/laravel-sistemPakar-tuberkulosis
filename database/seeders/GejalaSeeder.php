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
            ['nama_gejala' => 'Demam'],
            ['nama_gejala' => 'Batuk'],
            ['nama_gejala' => 'Hidung tersumbat/pilek'],
            ['nama_gejala' => 'Sakit kepala/pusing'],
            ['nama_gejala' => 'Sesak nafas/mengi'],
            ['nama_gejala' => 'Sakit tenggorokan'],
            ['nama_gejala' => 'Kurang nafsu makan'],
            ['nama_gejala' => 'Berkurangnya indra pengecap dan bau'],
            ['nama_gejala' => 'Tulang dan persendian anggota badan sakit'],
            ['nama_gejala' => 'Bintik merah pada telapak tangan'],
            ['nama_gejala' => 'Mata berair'],
            ['nama_gejala' => 'Meriang dan menggigil'],
            ['nama_gejala' => 'Lesu/lemas'],
            ['nama_gejala' => 'Nyeri telinga'],
            ['nama_gejala' => 'Tenggorokan merah dan bengkak'],
            ['nama_gejala' => 'Suara serak'],
            ['nama_gejala' => 'Warna merah pada amandel (bengkak)'],
        ];

        Gejala::insert($gejalas);
    }
}
