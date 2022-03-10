<?php

namespace App\Http\Controllers;

use App\Models\Dokter_m;
use App\Models\Dokterpoli_m;
use App\Models\Poli_m;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DokterPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dokter = Dokter_m::latest()->get();
        $poli = Poli_m::latest()->get();

        $model = Dokterpoli_m::with(['dokter', 'poli'])->latest()->get();

        if(request()->ajax())
        {
            return DataTables::of($model)->make(true);
        }

        return view('pages.Dashboard.DokterPoli.index', compact('dokter','poli'));
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
        $data = $request->all();

        $checkData = Dokterpoli_m::where('id_dokter', $data['data_dokter'])
                                ->where('id_poli', $data['data_poli'])
                                ->first();


        if($checkData)
        {
            toast()->error('Gagal! Nama dokter dan Nama Poli Sudah Terdaftar!');

            return redirect()->route('menu.dokter-poli.index');
        }else{
            $model = new Dokterpoli_m();
            $model->id_dokter = $data['data_dokter'];
            $model->id_poli = $data['data_poli'];
            $model->status = 'active';
            $model->save();
    
    
            toast()->success('Berhasil membuat data dokter poli');
    
            return redirect()->route('menu.dokter-poli.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
