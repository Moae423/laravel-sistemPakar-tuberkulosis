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
                'nama_penyakit' => 'Influenza Like Common (ILI)',
                'detail_penyakit' => 'Influenza Like Common (ILI) adalah penyakit pernapasan yang umum disebabkan oleh virus. Gejalanya termasuk demam, pilek, batuk, sakit tenggorokan, dan nyeri otot.',
                'solusi_penyakit' => 'Istirahat yang cukup, minum air putih, konsumsi obat flu sesuai anjuran dokter.',
            ],
            [
                'nama_penyakit' => 'Bronkhitis',
                'detail_penyakit' => 'Bronkhitis adalah peradangan saluran bronkial yang menyebabkan batuk persisten dengan lendir. Gejala lainnya termasuk sesak napas dan nyeri dada.',
                'solusi_penyakit' => 'Istirahat, minum banyak air, obat batuk dan pereda nyeri jika diperlukan.',
            ],
            [
                'nama_penyakit' => 'Faringitis',
                'detail_penyakit' => 'Faringitis adalah peradangan pada tenggorokan yang dapat menyebabkan sakit tenggorokan, kemerahan, dan sulit menelan. Biasanya disebabkan oleh infeksi virus atau bakteri.',
                'solusi_penyakit' => 'Minum air hangat, garam air garam, istirahat yang cukup, konsumsi obat pereda nyeri tenggorokan.',
            ],
            [
                'nama_penyakit' => 'Tonsilitis',
                'detail_penyakit' => 'Tonsilitis adalah peradangan amandel, organ kecil di belakang tenggorokan. Gejala umum termasuk sakit tenggorokan, kesulitan menelan, dan mungkin demam.',
                'solusi_penyakit' => 'Minum air hangat, garam air garam, istirahat yang cukup, konsumsi obat pereda nyeri tenggorokan.',
            ],
        ];

        Penyakit::insert($penyakits);
    }
}
