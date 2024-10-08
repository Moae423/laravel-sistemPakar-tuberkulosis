<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\User;
use App\Models\Gejala;
use App\Models\Result;
use App\Models\Penyakit;
use App\Models\Konsultasi;
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
                $penyakits = Penyakit::count();
                $gejalas = Gejala::count();
                $users = User::where('userType', 'pasien')->paginate(5);
                $results = Result::paginate(5);
                $jumlahPasiens = User::count();
                $rules = Rule::count();
                $title = 'Pakar';
        return view('admin.layouts.dashboard', compact('penyakits','results', 'jumlahPasiens', 'gejalas' ,'rules', 'title', 'users'));
            }
        }
    }
}
