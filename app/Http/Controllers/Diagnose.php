<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class Diagnose extends Controller
{
    public function konsultasi(Request $request)
    {
        // Ambil gejala yang dipilih user
        $selectedGejala = $request->input('gejala'); // array of gejala ids

        // Ambil semua penyakit
        $penyakits = Penyakit::all();

        // Hitung probabilitas untuk setiap penyakit
        $results = [];
        foreach ($penyakits as $penyakit) {
            $posterior = 1.0;
            foreach ($selectedGejala as $gejalaId) {
                $gejala = Gejala::find($gejalaId);
                $prior = $gejala->probabilitas_awal;

                $rule = Rule::where('kode_penyakit', $penyakit->id)->where('kode_gejala', $gejalaId)->first();
                if ($rule) {
                    $posterior *= $rule->probabilitas;
                } else {
                    $posterior *= (1 - $prior); // Asumsi jika tidak ada rule, gunakan komplementer prior
                }
            }
            $results[] = [
                'penyakit' => $penyakit->nama_penyakit,
                'probabilitas' => $posterior
            ];
        }

        // Urutkan berdasarkan probabilitas terbesar
        usort($results, function($a, $b) {
            return $b['probabilitas'] <=> $a['probabilitas'];
        });

        return response()->json($results);
    }
}

