<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
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
        $title = 'list data gejala';
        return view('exports.ListDataGejala', compact('gejala','title'));

        // $gejala = Gejala::all();
        // $title = 'list data gejala';
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML(view('exports.ListDataGejala', compact('gejala','title')));
        // return $pdf->stream();
    }
}
