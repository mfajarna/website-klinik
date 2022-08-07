<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Pasien_m;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarberobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $antrian = Antrian_m::with('poli')->latest()->get();

        return view('pages.Dashboard.DaftarBerobat.cekpoli', compact('antrian'));


    }

    public function daftarBerobat(Request $request)
    {
        $id_antrian_poli = $request->id;

        
        $model = Pasien_m::where('id_user', Auth::user()->id)->first();
        $nikes = $model['nikes'];

        $antrian_poli = Antrian_m::with('poli')
                        ->where('id_poli', $id_antrian_poli)
                        ->first();

        return view('pages.Dashboard.DaftarBerobat.index', compact('antrian_poli', 'nikes', 'id_antrian_poli'));
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
