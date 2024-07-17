<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index',[
            'title' => 'Pendaftaran'
        ]);
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
            'nama' => ['required', 'min:5', 'max:50'],
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
            return back()->withErrors('registerFailed', 'Something Data You Entered Is Invalid');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $query = User::query();
        // Filter berdasarkan nama pasien jika ada
     if ($request->filled('nama')) {
         $query->where('nama', 'like', '%' . $request->nama . '%');
     }
 
     // Sortir berdasarkan tanggal jika ada
     if ($request->filled('sort_by') && in_array($request->sort_by, ['asc', 'desc'])) {
         $query->orderBy('created_at', $request->sort_by);
     } else {
         $query->orderBy('created_at', 'desc'); // Default sorting
     }
        return view('register.show', [
            'title'=> 'Laporan Data Pasien', 
            'users' => User::where('userType', 'pasien')->paginate(10),
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
        $validatedData = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'password' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->umur = $validatedData['umur'];
        $user->alamat = $validatedData['alamat'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']); // Hash the new password
        }
        $user->save();
    
        return redirect('/daftar/show')->with('success', 'Data Pasien berhasil Di edit.');
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
        return redirect('/daftar/show')->with('success', 'Data Pasien Sudah Dihapus');
    }
}
