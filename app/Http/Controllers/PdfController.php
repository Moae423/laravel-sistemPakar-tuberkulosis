<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    //
    public function downloadPdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>TESTING PDF</h1>');
        // $pdf->loadview('<h1>TESTING PDF</h1>');
        return $pdf->stream();
    }
}
