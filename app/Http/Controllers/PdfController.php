<?php

namespace App\Http\Controllers;

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
}
