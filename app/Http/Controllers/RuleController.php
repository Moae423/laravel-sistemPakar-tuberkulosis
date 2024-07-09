<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class RuleController extends Controller
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
        //
        return view("admin.rule.create", [
            "title"=> "Input Data Rule",
            'gejala' => Gejala::all(),
            'penyakit'=>Penyakit::all(),
        ]);

        

        // $title = "Input Data Rule";
        // $penyakits = Penyakit::all();
        // $gejalas = Gejala::all();
        
        // return view('admin.rule.create', compact('penyakits','gejalas','title'));

        // return view('rule.create', compact('penyakits', 'gejalas'));
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
        $requestData = $request->validate([
            'idGejala' => ['required'],
            'idPenyakit' => ['required'],
            'nilai_probabilitas' => ['required'],
        ]);
        if (Rule::create($requestData)) {
            return redirect('/admin/rule/create')->with('success', 'Data Rule Sudah Ditambahkan');
        } else {
            return back()->withErrors('RuleFailed', 'Data yang dimasukkan tidak sesuai');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $id)
    {
        $rules = rule::all()->map(function ($rule) {
            $rule->idPenyakit = 'P0' . $rule->idPenyakit;
    
            if ($rule->idGejala <= 10) {
                $rule->idGejala = 'G0' . $rule->idGejala;
            } else {
                $rule->idGejala = 'G' . $rule->idGejala;
            }
    
            return $rule;
        });
        return view('admin.rule.show',[
            'title'=> 'Laporan Data Rule',
            'rules'=> $rules,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gejalas = Gejala::all()->map(function ($gejala) {
            if ($gejala->id < 10) {
                $gejala->displayId  = 'G0' . $gejala->id;
            } else {
                $gejala->displayId  = 'G' . $gejala->id;
            }
    
            return $gejala;
        });
        $penyakits = Penyakit::all()->map(function ($penyakit) {
                $penyakit->displayId  = 'P0' . $penyakit->id;
    
            return $penyakit;
        });
        return view('admin.rule.edit' ,[
            'title' => 'Edit Data Rule',
            'penyakits' => $penyakits,
            'gejalas' => $gejalas,
            'rules' => rule::findOrFail( $id ),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return ('test');
        //  $request->validate([
        //     'kode_penyakit' => 'required',
        //     'kode_gejala' => 'required',
        //     'nilai_probabilitas' => 'required',
        // ]);
        $rule = Rule::findOrFail($id);
        $rule->idPenyakit = $request->kode_penyakit;
        $rule->idgejala = $request->kode_gejala;
        $rule->nilai_probabilitas = $request->nilai_probabilitas;
        $rule->save();

        // $rules->kode_penyakit = $request->kode_penyakit;
        // $rules->kode_gejala = $request->kode_gejala;
        // $rules->nilai_probabilitas = $request->nilai_probabilitas;
        // $rules->save();

        
            return redirect('/admin/rule/show')->with('success', 'Data Rule berhasil diupdate.'); 
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rule::destroy($id);
        return redirect('/admin/rule/show')->with('success', 'Data Rule Sudah Dihapus');
    }
}
