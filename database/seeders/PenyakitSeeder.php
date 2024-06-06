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
                'solusi_penyakit' => 'Pengawasan langsung (DOT) untuk memastikan pasien meminum obat secara teratur dan minum obat anti-biotik secara teratur',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Tuberkulosis Tulang (TBC Tulang)',
                'detail_penyakit' => 'Tuberkulosis tulang, atau osteoarticular tuberculosis, adalah infeksi bakteri Mycobacterium tuberculosis yang mempengaruhi tulang dan sendi. ',
                'solusi_penyakit' => 'Kombinasi antibiotik seperti isoniazid, rifampicin, pyrazinamide, dan ethambutol selama minimal 9-12 bulan dan juga pembedahan jika diperlukana',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Tuberkulosis Kulit (TBC Kulit)',
                'detail_penyakit' => 'uberkulosis kulit, atau cutaneous tuberculosis, adalah infeksi kulit yang disebabkan oleh Mycobacterium tuberculosis. Ini adalah bentuk ekstrapulmoner dari TBC yang jarang terjadi. ',
                'solusi_penyakit' => 'Antibiotik yang sama dengan yang digunakan untuk TBC paru, biasanya dalam jangka waktu 6-12 bulan.',
            ],
        ];

        Penyakit::insert($penyakits);
    }
}
