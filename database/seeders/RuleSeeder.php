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
        // Daftar gejala untuk Tuberkulosis Paru
        $gejalaParu = ['G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G11', 'G13'];

        // Ambil penyakit Tuberkulosis Paru
        $penyakitParu = Penyakit::where('nama_penyakit', 'Tuberkulosis Paru-Paru')->first();

        // Pastikan penyakit ditemukan sebelum melanjutkan
        if ($penyakitParu) {
            // Hubungkan gejala dengan penyakit Tuberkulosis Paru
            foreach ($gejalaParu as $kodeGejala) {
                // Cari gejala berdasarkan nama
                $gejala = Gejala::where('kode_gejala', $kodeGejala)->first();

                if ($gejala) {
                    $probobilitas = mt_rand(20, 100)/ 100;
                    Rule::create([
                        'nama_gejala' => $gejala->nama_gejala,
                        'nama_penyakit' => $penyakitParu->nama_penyakit,
                        'nilai_probabilitas' => $probobilitas
                    ]);
                } else {
                    // Tindakan yang diambil jika gejala tidak ditemukan
                    $this->handleGejalaNotFound($kodeGejala);
                }
            }
        } else {
            // Tindakan yang diambil jika penyakit tidak ditemukan
            $this->handlePenyakitNotFound('Tuberkulosis Paru-Paru');
        }
    }
     // Fungsi untuk menangani kasus ketika gejala tidak ditemukan
     private function handleGejalaNotFound($kodeGejala)
     {
         echo "Gejala '$kodeGejala' tidak ditemukan. Tindakan: [Menambahkan ke database / Melewatkan / dll.]";
         // Atau Anda bisa memilih untuk melakukan tindakan tertentu seperti menambahkan gejala ke dalam database Gejala jika belum ada
     }
 
     // Fungsi untuk menangani kasus ketika penyakit tidak ditemukan
     private function handlePenyakitNotFound($namaPenyakit)
     {
         echo "Penyakit '$namaPenyakit' tidak ditemukan. Tindakan: [Menambahkan ke database / Melewatkan / dll.]";
         // Atau Anda bisa memilih untuk melakukan tindakan tertentu seperti menambahkan penyakit ke dalam database Penyakit jika belum ada
     }
}
