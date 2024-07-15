<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Result;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KonsultasiController;

class PdfController extends Controller
{
    protected $KonsultasiController;

    public function __construct()
    {
        $this->KonsultasiController = new KonsultasiController();
    }
    //
    public function downloadPdf()
    {
        $results = Result::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('exports.listDataKonsultasi', compact('results')));
        // $pdf->loadview('<h1>TESTING PDF</h1>');
        return $pdf->stream();
    }
    public function dataGejala()
    {
        $gejala = Gejala::all();
        $title = 'List Data Gejala TB 2024';
        return view('exports.ListDataGejala', compact('gejala','title'));

        // $gejala = Gejala::all();
        // $title = 'list data gejala';
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML(view('exports.ListDataGejala', compact('gejala','title')));
        // return $pdf->stream();
    }
    public function dataPenyakit() 
    {
        $penyakit = Penyakit::all();
        $title = 'List Data Penyakit TB 2024';
        return view('exports.ListDataPenyakit', compact('penyakit','title'));
    }
}
