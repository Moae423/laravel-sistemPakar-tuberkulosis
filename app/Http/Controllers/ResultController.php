<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;

class ResultController extends Controller
{
    protected $KonsultasiController;

    public function __construct()
    {

        $this->KonsultasiController = new KonsultasiController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Result::query();
        // Filter berdasarkan nama pasien jika ada
     if ($request->filled('namaPasien')) {
         $query->where('namaPasien', 'like', '%' . $request->namaPasien . '%');
     }
 
     // Sortir berdasarkan tanggal jika ada
     if ($request->filled('sort_by') && in_array($request->sort_by, ['asc', 'desc'])) {
         $query->orderBy('created_at', $request->sort_by);
     } else {
         $query->orderBy('created_at', 'desc'); // Default sorting
     }

     $riwayat = $query->paginate(5);
        return view('admin.hasil.index',[
            'title' => 'Laporan Konsultasi Pasien',
            'results' => $riwayat
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
     * @param  \App\Http\Requests\StoreResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        // $selected_gejalas = explode(', ', $result->selected_gejalas);

        //     + $this->KonsultasiController->proccess($selected_gejalas);


        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResultRequest  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
    
}
