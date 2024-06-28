<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index',[
            'title'=> 'Register',
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaPasien' => ['required', 'max:50'],
            'email' => ['required'],
            'userType' => ['required', 'string', 'in:admin,pasien'], 
            'password' => ['required', 'min:3','max:20'],
            'umur' => ['required'],
            'alamat' => ['required'],
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success','Pendaftaran Berhasil!!');

        if (Auth::attempt($validatedData)) {
            request()->session()->regenerate();
        } else {
            return back()->withErrors('registerFailed', 'ERROR BWANG');
        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('register.show', [
            'title'=> 'Laporan Data Pasien', 
            'users' => User::where('userType', 'user')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('register.edit', [
            'title'=> 'Edit Data Pasien',
            'users' => User::findOrFail( $id ),
        ]);
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaPasien' => ['required'],
            'email' => ['required'],
            'password' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);
        $penyakit = User::findOrFail($id);
        $penyakit->update($request->all());
    
        return redirect('/register/show')->with('success', 'Data Pasien berhasil Di edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/register/show')->with('success', 'Data Pasien Sudah Dihapus');
    }
}
