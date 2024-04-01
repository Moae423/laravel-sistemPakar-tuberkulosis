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
        

        // Ambil penyakit Tuberkulosis Paru
        $penyakitParu = Penyakit::where('nama_penyakit', 'Tuberkulosis Paru-Paru')->first();
        // Ambil penyakit Tuberkulosis Tulang
        $penyakitTulang = Penyakit::where('nama_penyakit', 'Tuberkulosis Tulang')->first();
        // Ambil penyakit Tuberkulosis Kulit
        $penyakitKulit = Penyakit::where('nama_penyakit', 'Tuberkulosis Kulit')->first();

        // Pastikan penyakit ditemukan sebelum melanjutkan
        if ($penyakitParu) {
            // Daftar gejala untuk Tuberkulosis Paru
        $gejalaParu = ['G01', 'G02', 'G03', 'G04', 'G05', 'G06', 'G11', 'G13'];
            // Hubungkan gejala dengan penyakit Tuberkulosis Paru
            foreach ($gejalaParu as $kodeGejala) {
                // Cari gejala berdasarkan nama
                $gejala = Gejala::where('kode_gejala', $kodeGejala)->first();

                if ($gejala) {
                    $probobilitas = mt_rand(20, 100)/ 100;
                    Rule::create([
                        'kode_gejala' => $gejala->kode_gejala,
                        'kode_penyakit' => $penyakitParu->kode_penyakit,
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
        
        // Tuberkulosis Tulang
        if ($penyakitTulang) {
            // Daftar gejala untuk Tuberkulosis Tulang
        $gejalaTulang = ['G02', 'G07', 'G08', 'G09', 'G10'];
            // Hubungkan gejala dengan penyakit Tuberkulosis Tulang
            foreach ($gejalaTulang as $kodeGejala) {
                // Cari gejala berdasarkan nama
                $gejala = Gejala::where('kode_gejala', $kodeGejala)->first();

                if ($gejala) {
                    $probobilitas = mt_rand(20, 100)/ 100;
                    Rule::create([
                        'kode_gejala' => $gejala->kode_gejala,
                        'kode_penyakit' => $penyakitTulang->kode_penyakit,
                        'nilai_probabilitas' => $probobilitas
                    ]);
                } else {
                    // Tindakan yang diambil jika gejala tidak ditemukan
                    $this->handleGejalaNotFound($kodeGejala);
                }
            }
        } else {
            // Tindakan yang diambil jika penyakit tidak ditemukan
            $this->handlePenyakitNotFound('Tuberkulosis Tulang');
        }

        // Tuberkulosis Kulit
        if ($penyakitKulit) {
            // Daftar gejala untuk Tuberkulosis Tulang
        $gejalaKulit = ['G02', 'G05', 'G06', 'G12', 'G14','G15'];
            // Hubungkan gejala dengan penyakit Tuberkulosis Tulang
            foreach ($gejalaKulit as $kodeGejala) {
                // Cari gejala berdasarkan nama
                $gejala = Gejala::where('kode_gejala', $kodeGejala)->first();

                if ($gejala) {
                    $probobilitas = mt_rand(20, 100)/ 100;
                    Rule::create([
                        'kode_gejala' => $gejala->kode_gejala,
                        'kode_penyakit' => $penyakitKulit->kode_penyakit,
                        'nilai_probabilitas' => $probobilitas
                    ]);
                } else {
                    // Tindakan yang diambil jika gejala tidak ditemukan
                    $this->handleGejalaNotFound($kodeGejala);
                }
            }
        } else {
            // Tindakan yang diambil jika penyakit tidak ditemukan
            $this->handlePenyakitNotFound('Tuberkulosis Tualng');
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
