<?php

namespace App\Http\Controllers;

use App\Models\Dokter_m;
use App\Models\Jadwalkerjadokter_m;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Dokter_m::with('jadwal_kerja')->get();
        

        if(request()->ajax())
        {
            return DataTables::of($model)
                ->addColumn('jadwal_kerja', function($data){
                    $button = '<div class="col-xl-6">';
                    $button .= '<button type="button" id="btn_jadwal" class="btn btn-info waves-effect btn-label waves-light"><i class="  bx bx-check-circle label-icon"></i>Lihat Jadwal Kerja</button>';
                    $button .= '</div>';

                    return $button;
                })
                ->addColumn('action', function($data)
                {
                    $button = '<div class="btn-group" role="group">';
                    $button .= '<button id="btnGroupVerticalDrop1" type="button" class="btn btn-success waves-effect btn-label waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Edit <i class="mdi mdi-chevron-down"></i>
                                                    <i class="bx bx-edit-alt label-icon"></i>
                                </button>';
                    $button .=  '<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                    <a class="dropdown-item" id="btn_active" href="#">Update Data</a>
                                                    <a class="dropdown-item" id="btn_non_active" href="#">Hapus Data</a>
                                </div>';

                    return $button;
                })
                ->rawColumns(['action','jadwal_kerja'])
                ->make(true);
        }


        return view('pages.Dashboard.Dokter.index');
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
        $validation = $request->validate([
            'nama_dokter'   => 'required|string',
            'email'  => 'required|email|unique:tb_dokter,email',
            'bidang_keahlian'   => 'array'
        ]);


        $dataDokter = new Dokter_m();

        $dataDokter->nama_dokter = $validation['nama_dokter'];
        $dataDokter->email = $validation['email'];
        $dataDokter->bidang_keahlian = $request->bidang_keahlian;
        $dataDokter->password = Hash::make('Dokter123');
        $dataDokter->role = 'dokter';

        $dataDokter->save();

        $user = new User();

        $user->name = $validation['nama_dokter'];
        $user->email = $validation['email'];
        $user->password = Hash::make('Dokter123');
        $user->role = 'dokter';

        $user->save();


        $data = $request->all();

    
        foreach($data['hari_kerja'] as $key => $val)
        {

            $dataJamKerja = new Jadwalkerjadokter_m();
            $dataJamKerja->id_dokter = $dataDokter->id;
    

            $dataJamKerja->hari_kerja = $val;

            foreach($data['jam_mulai_kerja'] as $key => $val)
            {
                $dataJamKerja->jam_mulai_kerja = $val;
            }

            
            foreach($data['jam_selesai_kerja'] as $key => $val)
            {
                $dataJamKerja->jam_selesai_kerja = $val;
            }

            $dataJamKerja->save();
        }

       

        if($dataDokter && $dataJamKerja && $user)
        {
            toast()->success('Berhasil membuat data dokter');

            return redirect()->route('menu.dokter.index');
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

    public function lihatJadwalKerja(Request $request)
    {
        try{
            $id = $request->id;

            $model = Jadwalkerjadokter_m::with('dokter')->where('id_dokter', $id)->get();

            return response()->json($model);
        }catch(Exception $e)
        {   
            return response()->json('Something went wrong', '500');
        }
    }
}
