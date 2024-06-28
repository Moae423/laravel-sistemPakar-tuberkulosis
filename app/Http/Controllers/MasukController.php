<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    //
    public function index()
    {
        return view("login.index", [
            "title" => "Login",
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email"=> "required",
            "password"=> "required",
         ],[
            "email.required"=> "Email Wajib Diisi",
            "password.required"=> "Password Wajib Diisi",
         ]);

         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
         } else { 
            return back()->with('loginFailed','Username Atau Password Salah');
         }
         
    }
    public function logout(Request $request) {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
} 
