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
            'nama_gejala' => ['required'],
            'nama_penyakit' => ['required'],
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
        return view('admin.rule.show',[
            'title'=> 'Laporan Data Rule',
            'rules'=> rule::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        //
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
