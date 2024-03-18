<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penyakit.create', [
            'title' => 'Input Data Penyakit'
        ]);
        // return ('test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validatedData = $request->validate([
            'id_penyakit' => ['required', 'unique:penyakits', 'min:5'],
            'nama_penyakit' => ['required', 'min:20', 'max:50'],
            'detail_penyakit' => ['required', 'max:225'],
            'solusi_penyakit' => ['required', 'max:255']
        ]);

        if (Penyakit::create($validatedData)) {
            return redirect('/admin/penyakit/create')->with('success', 'Data Penyakit Sudah Ditambahkan');
        } else {
            return back()->withErrors('penyakitFailed', 'Data yang dimasukkan tidak sesuai');
        }

        // Penyakit::create($validatedData);
        // return redirect('/admin/penyakit/create')->with('success', 'Data Penyakit Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $id)
    {
        $penyakit = Penyakit::findOrFail($id); // Retrieve the Penyakit with the given ID or throw an error if not found
        return view('admin.penyakit.show', [
            'title' => 'Data Penyakit',
            'penyakit' => Penyakit::all()
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
