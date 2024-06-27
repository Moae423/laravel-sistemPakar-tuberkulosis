<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function daftar() {
        return view('register.index',[
            'title'=> 'Register',
        ]);
    }
}
