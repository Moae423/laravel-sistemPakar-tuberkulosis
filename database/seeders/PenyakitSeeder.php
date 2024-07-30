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
        $penyakits = [
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'Tuberkulosis Paru (TBC Paru-Paru)',
                'detail_penyakit' => 'Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri Mycobacterium tuberculosis.
                                        Penyakit ini umumnya menyerang paru-paru,',
                'solusi_penyakit' => 'Pengobatan Obat Anti Tuberkulosis (OAT) Selama 6 - 12 Bulan seperti isoniazid, rifampicin, pyrazinamide, dan ethambutol',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Tuberkulosis Tulang (TBC Tulang)',
                'detail_penyakit' => 'Tuberkulosis tulang, atau osteoarticular tuberculosis, adalah infeksi bakteri Mycobacterium tuberculosis yang mempengaruhi tulang dan sendi. ',
                'solusi_penyakit' => 'Pengobatan Obat Anti Tuberkulosis (OAT) Selama 9 - 12 Bulan seperti isoniazid, rifampicin, pyrazinamide, dan ethambutol',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Tuberkulosis Kulit (TBC Kulit)',
                'detail_penyakit' => 'Tuberkulosis kulit, atau cutaneous tuberculosis, adalah infeksi kulit yang disebabkan oleh Mycobacterium tuberculosis.',
                'solusi_penyakit' => 'Pengobatan Obat Anti Tuberkulosis (OAT) Selama 9 - 12 Bulan seperti isoniazid, rifampicin, pyrazinamide, dan ethambutol',
            ],
        ];

        Penyakit::insert($penyakits);
    }
}
