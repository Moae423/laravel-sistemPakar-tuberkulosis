<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $userType = auth()->user()->userType;
            if ($userType=='pasien') {
                return view('welcome', [
                    'title'=> 'Beranda',
                ]);
            } elseif ($userType=='admin') {
                return view('admin.layouts.main', [
                    'title'=> 'Pakar',
                ]);
            }
        }
    }
}
