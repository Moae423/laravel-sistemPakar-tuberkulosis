<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoPenyakit extends Controller
{
    //

    public function index()
    {
        $title = "Info Penyakit";
        return view('infoPenyakit.index', compact('title'));
    }
}
