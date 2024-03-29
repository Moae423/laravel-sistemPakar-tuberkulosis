<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return ('test');
        return view('admin.gejala.create',[
            'title' => 'Input Data Gejala'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $gejala = Gejala::latest()->first();
        $kodeGejalas = "G";

        if ($gejala == null) {
            // kode Pertama
            $nomorUrut = "01";
        } else {
            $nomorUrut = substr($gejala->kode_gejala, 1, 2)+1;
            $nomorUrut = str_pad($nomorUrut, 2, "0", STR_PAD_LEFT);
        }
        $kodePenyakit = $kodeGejalas . $nomorUrut;
        $requestData = $request->validate([
            'id_gejala' => ['required'],
            'nama_gejala' => ['required'],
        ]);
        $requestData['kode_gejala'] = $kodePenyakit;
        
        if (Gejala::create($requestData)) {
            return redirect('/admin/gejala/show')->with('success', 'Data Gejala Sudah Ditambahkan');
        } else {
            return back()->withErrors('GejalaFailed', 'Data yang dimasukkan tidak sesuai');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Gejala $id)
    {
        // return ('test');
        return view("admin.gejala.show",[
            'title' => 'Report Gejala Tuberkulosis',
            'gejala' => Gejala::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit(Gejala $gejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gejala::destroy($id);
        return redirect('/admin/gejala/show')->with('success', 'Data Gejala Sudah Dihapus');
    }
}
