<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = [
            ['kode_penyakit' => 'KP001',
            'id_penyakit'=> '001',
            'nama_penyakit' => 'Tuberkulosis Paru-Paru',
            'detail_penyakit' => 'jenis TB yang paling umum terjadi. Infeksi biasanya terjadi saat seseorang menghirup bakteri TB yang tersebar di udara melalui droplet dari seseorang yang terinfeksi.',
            'solusi_penyakit' => 'terapi antibiotik jangka panjang, biasanya antara 6 hingga 9 bulan. Obat-obatan seperti isoniazid, rifampisin, pyrazinamide, dan ethambutol'],
            ['kode_penyakit' => 'KP002',
            'id_penyakit'=> '002',
            'nama_penyakit' => 'Tuberkulosis Tulang',
            'detail_penyakit' => 'Tuberkulosis tulang terjadi ketika bakteri TB menyebar ke tulang dari area lain dalam tubuh atau melalui aliran darah.',
            'solusi_penyakit' => 'TB tulang melibatkan terapi antibiotik. Terapi ini mungkin juga memerlukan pembedahan dalam beberapa kasus untuk menghilangkan jaringan yang terinfeksi atau untuk mengurangi nyeri dan kecacatan.'],
            ['kode_penyakit' => 'KP003',
            'id_penyakit'=> '003',
            'nama_penyakit' => 'Tuberkulosis Kulit',
            'detail_penyakit' => 'TB kulit terjadi ketika bakteri TB memasuki kulit melalui luka atau lecet pada kulit atau melalui aliran darah.',
            'solusi_penyakit' => 'sering kali dalam kombinasi dengan prosedur bedah untuk menghilangkan jaringan yang terinfeksi atau untuk mengurangi gejala yang tidak nyaman.'],

        ];

        foreach ($sample as $penyakit) {
        	$g = new Penyakit;
        	$g->kode_penyakit = $penyakit['kode_penyakit'];
        	$g->id_penyakit = $penyakit['id_penyakit'];
        	$g->nama_penyakit = $penyakit['nama_penyakit'];
        	$g->detail_penyakit = $penyakit['detail_penyakit'];
        	$g->solusi_penyakit = $penyakit['solusi_penyakit'];
        	$g->save();
        }
    }
}
