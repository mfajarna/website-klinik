<?php

namespace App\Http\Controllers;

use App\Models\Pasien_m;
use App\Models\Pemeriksaanpasien_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RiwayatBerobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $modelPasien = Pasien_m::where('id_user', Auth::user()->id)->first();
        $id = $modelPasien->id;

        $model = Pemeriksaanpasien_m::where('id_pasien', $id)->latest()->get();


        if(request()->ajax())
        {
            return DataTables::of($model)
                    ->addColumn('render_tanggal', function($data){
                          $tgl = $data->updated_at;

                          $component = '<span class="badge rounded-pill badge-soft-success font-size-11">' . $tgl .   '</span>';
                        
                          return $component;
                        })
                    ->rawColumns(['render_tanggal'])
                    ->make(true);
        }

        return view('pages.Dashboard.RiwayatBerobat.index');
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
