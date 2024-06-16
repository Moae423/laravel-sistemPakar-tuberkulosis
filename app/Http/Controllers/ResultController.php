<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
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
        $query = Result::query()->with('penyakit')->when($request->get('search'), function ($query, $search) {
            return $query->whereAny([
                'namaPasien',
                'nama_penyakit',
                'selected_gejalas',
                'result',
            ], 'like', '%' . $search . '%')->orWhereHas('penyakit', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })->when($request->has('month'), function ($query) use ($request) {
            $query->whereMonth('created_at', $request->get('month') + 1);
        })->when($request->has('year'), function ($query) use ($request) {
            $query->whereYear('created_at', $request->get('year'));
        });


        $results = $query->paginate($request->get('limit', 10));

        return view('riwayatKonsultasi.index',[
            'title' => 'Riwayak Konsultasi',
            'results' => $results,
            'filters' => $request->only(['search', 'month', 'year']),
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
        $selected_gejalas = explode(', ', $result->selected_gejalas);

            + $this->KonsultasiController->proccess($selected_gejalas);

        return view('riwayatKonsultasi.index',[
            'result' => $result,
        ]);
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
