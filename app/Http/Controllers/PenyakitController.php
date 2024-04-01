<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenyakitRequest;
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
    public function store(Request $request) : RedirectResponse
    {
        //
        $penyakit = Penyakit::latest()->first();
        $kodePenyakits = "KP";

        if ($penyakit == null) {
            // kode Pertama
            $nomorUrut = "001";
        } else {
            $nomorUrut = substr($penyakit->kode_penyakit, 2, 3)+1;
            $nomorUrut = str_pad($nomorUrut, 3, "0", STR_PAD_LEFT);
        }
        $kodePenyakit = $kodePenyakits . $nomorUrut;
        $requestData = $request->validate([
            'id_penyakit' => ['required'],
            'nama_penyakit' => ['required'],
            'detail_penyakit' => ['required'],
            'solusi_penyakit' => ['required'],
        ]);
        $requestData['kode_penyakit'] = $kodePenyakit;
        
        if (Penyakit::create($requestData)) {
            return redirect('/admin/penyakit/show')->with('success', 'Data Penyakit Sudah Ditambahkan');
        } else {
            return back()->withErrors('penyakitFailed', 'Data yang dimasukkan tidak sesuai');
        }

        // $validatedData = $request->validate([
        //     'id_penyakit' => ['required', 'unique:penyakits', 'min:5'],
        //     'nama_penyakit' => ['required', 'min:20', 'max:50'],
        //     'detail_penyakit' => ['required', 'max:225'],
        //     'solusi_penyakit' => ['required', 'max:255']
        // ]);


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
        Penyakit::destroy($id);
        return redirect('/admin/penyakit/show')->with('success', 'Data Penyakit Sudah Dihapus');
    }
}
