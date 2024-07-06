<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Result;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
    $selectedGejalas = $request->input('selectedGejalas');
    $request->validate([
        'selectedGejalas' => 'required|array|min:3',    
    ]);
    $nama = Auth::user()->nama;
    $umurPasien = Auth::user()->umur;
    $alamatPasien = Auth::user()->alamat;
    $result = $this->proccess($selectedGejalas);

    return view('konsultasi.show', [
        'title' => 'Hasil Diagnosa',
        'result' => $result,
        'nama' => $nama,
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

        $relatedpenyakit = Rule::whereIn('idGejala', $selectedGejalas)
            ->groupBy('idPenyakit')
            ->pluck('idPenyakit');
         // Mengambil nama penyakit yang terkait dari tabel Penyakit
        $relatedpenyakitNames =Penyakit::whereIn('id', $relatedpenyakit)->get(['id', 'nama_penyakit'])->keyBy('id');

        $relatedGejalas = [];
        foreach ($relatedpenyakit as $idPenyakit) {
            $relatedGejalas[$idPenyakit] = Rule::select('idPenyakit', 'idGejala', 'nilai_probabilitas')
                ->where('idPenyakit', $idPenyakit)
                ->whereIn('idGejala', $selectedGejalas)
                ->get();
        }

        //SUM PROBABILITY OF EACH SYMPTOM
        $totalProbabilities = [];

        foreach ($relatedGejalas as $idPenyakit => $gejalas) {
            $totalProbability = 0;

            foreach ($gejalas as $gejala) {
                $totalProbability += $gejala->nilai_probabilitas;
            }

            $totalProbabilities[$idPenyakit] = $totalProbability;
        }

        //DIVIDE PROBABILITY OF EACH SYMPTOM BY TOTAL PROBABILITY
        $totalProbabilities_H = [];
        foreach ($relatedGejalas as $idPenyakit => $gejalas) {
            $totalProbH = 0;

            foreach ($gejalas as  $gejala) {
                $totalProbH = $gejala->nilai_probabilitas / $totalProbabilities[$idPenyakit];
                $totalProbabilities_H[$idPenyakit][$gejala->idGejala] = $totalProbH;
            }
        }

        $totalProbabilitiesE = [];
        foreach ($relatedGejalas as $idPenyakit => $gejalas) {
            $totalProbE = 0;

            foreach ($gejalas as  $gejala) {
                $ProbE = $gejala->nilai_probabilitas * $totalProbabilities_H[$idPenyakit][$gejala->idGejala];
                $totalProbE += $ProbE;
            }

            $totalProbabilitiesE[$idPenyakit] = $totalProbE;
        }
        
        $totalProbabilitiesHE = [];

        foreach ($relatedGejalas as $idPenyakit => $gejalas) {
            foreach ($gejalas as $gejala) {
                $totalProbabilitiesHE[$idPenyakit][$gejala->idGejala] = ($gejala->nilai_probabilitas * $totalProbabilities_H[$idPenyakit][$gejala->idGejala]) / $totalProbabilitiesE[$idPenyakit];
            }
        }

        // Menghitung Total Bayes
        $totalBayes = [];

        foreach ($relatedGejalas as $idPenyakit => $gejalas) {
            $result = 0;
            // Temukan nama penyakit berdasarkan kode penyakit
            $penyakit = Penyakit::where('id', $idPenyakit)->first();
            foreach ($gejalas as $gejala) {
                $total = $gejala->nilai_probabilitas * $totalProbabilitiesHE[$idPenyakit][$gejala->idGejala];
                $result += $total;
            }

            // Simpan hasil bersama dengan nama penyakit
            $totalBayes[$idPenyakit] = [
                'id' => $idPenyakit,
                'nama_penyakit' => $penyakit->nama_penyakit,
                'solusi_penyakit' => $penyakit->solusi_penyakit,
                'result' => $result,
                'nilai_probabilitas' => $totalProbabilities[$idPenyakit],
            ];
            
        }
        if (!empty($totalBayes)) {
            usort($totalBayes, function ($a, $b) {
                return $b['result'] <=> $a['result'];
            });
            $penyakitTerdiagnosa = $totalBayes[0];

            
            $nama = Auth::user()->nama;
            $id_pasien = Auth::user()->id;
            // Simpan hasil diagnosis ke database
            $diagnosis = new Result();
            $diagnosis->id_pasien = $id_pasien; 
            $diagnosis->nama = $nama; 
            $diagnosis->nama_penyakit = $penyakitTerdiagnosa['nama_penyakit'];
            $diagnosis->nilai_probabilitas = $penyakitTerdiagnosa['nilai_probabilitas'];
            $diagnosis->result = $penyakitTerdiagnosa['result'];
            $diagnosis->solusi_penyakit = $penyakitTerdiagnosa['solusi_penyakit'];
            $diagnosis->selected_gejalas = json_encode($selectedGejalas);
            $diagnosis->save();
        } else {
            
            $penyakitTerdiagnosa = null; // or any other appropriate action
        }
        
        $nama = Auth::user()->nama;
        $id_pasien = Auth::user()->id;
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
            'nama' => $nama,
            'id_pasien' => $id_pasien,
            'umurPasien' => $umurPasien,
            'alamatPasien' => $alamatPasien,
            'nilai_tertinggi' => $penyakitTerdiagnosa
        ]);
    }
    public function store(Request $request)
    {
        // 

    }
        public function riwayatKonsultasi(Request $request)
    {
        $query = Result::where('nama', Auth::user()->nama);
         // Filter berdasarkan tanggal
    if ($request->filled('filter_date')) {
        $query->whereDate('created_at', $request->filter_date);
    }
       // Filter berdasarkan nama pasien jika ada
    if ($request->filled('nama')) {
        $query->where('nama', 'like', '%' . $request->nama . '%');
    }

    // Sortir berdasarkan tanggal jika ada
    if ($request->filled('sort_by') && in_array($request->sort_by, ['asc', 'desc'])) {
        $query->orderBy('created_at', $request->sort_by);
    } else {
        $query->orderBy('created_at', 'desc'); // Default sorting
    }
    $riwayat = $query->paginate(5);
        return view('riwayatKonsultasi.index', [
            'title' => 'Riwayat Konsultasi',
            'riwayat' => $riwayat
        ]);
    }
    
    public function downloadPdf(Request $request)
    {
        $query = Result::where('nama', Auth::user()->nama);

        $title = 'Hasil Konsultasi';
        return view('exports.KonsultasiResult', compact('title'));
    }

}

