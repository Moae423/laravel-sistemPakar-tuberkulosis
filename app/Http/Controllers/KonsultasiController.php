<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Result;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        
        $gejala = Gejala::all();
        return view('konsultasi.create',[
           'title' => 'Konsultasi',
           'gejalas' =>   $gejala
        ]);
    }
public function diagnosa(Request $request) {
    $selectedGejalas = $request->input('gejala');
    $result = $this->proccess($selectedGejalas);
    $namaPasien = Auth::user()->namaPasien;
    $umurPasien = Auth::user()->umur;
    $alamatPasien = Auth::user()->alamat;

    return view('konsultasi.show', [
        'title' => 'Diagnose Results',
        'result' => $result,
        'namaPasien' => $namaPasien,
        'umurPasien' => $umurPasien,
        'alamatPasien' => $alamatPasien,

        
    ]);
}

    public function proccess($selectedGejalas) 
    {
        if (is_null($selectedGejalas) || !is_array($selectedGejalas) || count($selectedGejalas) == 0) {
            return redirect()->route('konsultasi.index')->with('message', 'Tidak Ada Gejala');
        }
       
        $getSelectedGejalas = Gejala::whereIn('id', $selectedGejalas)->get()->keyBy('id');

        if ($getSelectedGejalas->isEmpty()) {
            return redirect()->route('konsultasi.index')->with('message', 'Tidak Ada Gejala');
        }

        $relatedpenyakit = Rule::whereIn('kode_gejala', $selectedGejalas)
            ->groupBy('kode_penyakit')
            ->pluck('kode_penyakit');
         // Mengambil nama penyakit yang terkait dari tabel Penyakit
        $relatedpenyakitNames =Penyakit::whereIn('id', $relatedpenyakit)->get(['id', 'nama_penyakit'])->keyBy('id');

        $relatedGejalas = [];
        foreach ($relatedpenyakit as $kode_penyakit) {
            $relatedGejalas[$kode_penyakit] = Rule::select('kode_penyakit', 'kode_gejala', 'nilai_probabilitas')
                ->where('kode_penyakit', $kode_penyakit)
                ->whereIn('kode_gejala', $selectedGejalas)
                ->get();
        }

        //SUM PROBABILITY OF EACH SYMPTOM
        $totalProbabilities = [];

        foreach ($relatedGejalas as $kode_penyakit => $gejalas) {
            $totalProbability = 0;

            foreach ($gejalas as $gejala) {
                $totalProbability += $gejala->nilai_probabilitas;
            }

            $totalProbabilities[$kode_penyakit] = $totalProbability;
        }

        //DIVIDE PROBABILITY OF EACH SYMPTOM BY TOTAL PROBABILITY
        $totalProbabilities_H = [];
        foreach ($relatedGejalas as $kode_penyakit => $gejalas) {
            $totalProbH = 0;

            foreach ($gejalas as  $gejala) {
                $totalProbH = $gejala->nilai_probabilitas / $totalProbabilities[$kode_penyakit];
                $totalProbabilities_H[$kode_penyakit][$gejala->kode_gejala] = $totalProbH;
            }
        }

        $totalProbabilitiesE = [];
        foreach ($relatedGejalas as $kode_penyakit => $gejalas) {
            $totalProbE = 0;

            foreach ($gejalas as  $gejala) {
                $ProbE = $gejala->nilai_probabilitas * $totalProbabilities_H[$kode_penyakit][$gejala->kode_gejala];
                $totalProbE += $ProbE;
            }

            $totalProbabilitiesE[$kode_penyakit] = $totalProbE;
        }
        
        $totalProbabilitiesHE = [];

        foreach ($relatedGejalas as $kode_penyakit => $gejalas) {
            foreach ($gejalas as $gejala) {
                $totalProbabilitiesHE[$kode_penyakit][$gejala->kode_gejala] = ($gejala->nilai_probabilitas * $totalProbabilities_H[$kode_penyakit][$gejala->kode_gejala]) / $totalProbabilitiesE[$kode_penyakit];
            }
        }

        // Menghitung Total Bayes
        $totalBayes = [];

        foreach ($relatedGejalas as $kode_penyakit => $gejalas) {
            $result = 0;
            // Temukan nama penyakit berdasarkan kode penyakit
            $penyakit = Penyakit::where('id', $kode_penyakit)->first();
            foreach ($gejalas as $gejala) {
                $total = $gejala->nilai_probabilitas * $totalProbabilitiesHE[$kode_penyakit][$gejala->kode_gejala];
                $result += $total;
            }

            // Simpan hasil bersama dengan nama penyakit
            $totalBayes[$kode_penyakit] = [
                'id' => $kode_penyakit,
                'nama_penyakit' => $penyakit->nama_penyakit,
                'solusi_penyakit' => $penyakit->solusi_penyakit,
                'result' => $result,
            ];
            usort($totalBayes, function ($a, $b) {
                // Urutkan dari yang terbesar ke yang terkecil berdasarkan nilai 'result'
                return $b['result'] <=> $a['result'];
            });
            if (!empty($totalBayes)) {
                $nilaiTertinggi = max(array_column($totalBayes, 'result'));
                $penyakitTerdiagnosa = array_filter($totalBayes, function($item) use ($nilaiTertinggi) {
                    return $item['result'] == $nilaiTertinggi;
                });
                $penyakitTerdiagnosa = array_values($penyakitTerdiagnosa)[0];

                // Simpan hasil diagnosis ke database
                $diagnosis = new Result();
                $diagnosis->user_id = Auth::id(); // Atau Auth::user()->id
                $diagnosis->kode_penyakit = $penyakitTerdiagnosa['id'];
                $diagnosis->nilai_probabi = $penyakitTerdiagnosa['result'];
                $diagnosis->save();
            } else {
                // Handle the case when $totalBayes is empty
                $penyakitTerdiagnosa = null; // or any other appropriate action
            }
        }
        
        $namaPasien = Auth::user()->namaPasien;
        $umurPasien = Auth::user()->umur;
        $alamatPasien = Auth::user()->alamat;
        return view('konsultasi.show',[
            
            'title' => 'Diagnosa Results',
            'selectedGejalas' => $getSelectedGejalas,
            'relatedPenyakits' => $relatedpenyakitNames,
            'relateGejalas' => $relatedGejalas,
            'totalProbability' => $totalProbabilities,
            'totalProbabilities_H' => $totalProbabilities_H,
            'totalProbE' => $totalProbabilitiesE,
            'totalProbabilitiesHE' => $totalProbabilitiesHE,
            'totalBayes' => $totalBayes,
            'namaPasien' => $namaPasien,
            'umurPasien' => $umurPasien,
            'alamatPasien' => $alamatPasien,
            'nilai_tertinggi' => $penyakitTerdiagnosa
        ]);
        // return 
        // [
        //     'selectedGejalas' => $getSelectedGejalas,
        //     'relatedPenyakits' => $relatedpenyakitNames,
        //     'relateGejalas' => $relatedGejalas,
        //     'totalProbability' => $totalProbabilities,
        //     'totalProbabilities_H' => $totalProbabilities_H,
        //     'totalProbE' => $totalProbabilitiesE,
        //     'totalProbabilitiesHE' => $totalProbabilitiesHE,
        //     'totalBayes' => $totalBayes
        // ];
    }
    public function store(Request $request)
    {
        // dd($request->selected_gejalas);

        $selectedGejalasString = implode(', ', $request->gejala);
        // Menggabungkan array gejala menjadi string
        // $selectedGejalasString = implode(', ', $request->gejala);

        // Membuat data untuk disimpan
        Result::create([
            'selected_gejalas' => $selectedGejalasString,
            'kode_penyakit' => $request->kode_penyakit,
            'result' => $request->result
        
        ]);
        return redirect()->route('riwayatKonsultasi.index')->with('message', 'Diagnose result saved successfully.'); 

        // Menyimpan data konsultasi
        // if (Result::create($konsultasiData)) {
        //     return redirect('welcome')->with('success', 'Data Konsultasi Sudah disimpan');
        // } else {
        //     return back()->withErrors(['failed' => 'Data konsultasi tidak dapat disimpan']);
        // }
        
        // return redirect()->route('welcome')->with('message', 'Diagnose result saved successfully.');
    }

}

