<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Dokterpoli_m;
use App\Models\Jadwalkerjadokter_m;
use App\Models\Pasien_m;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarberobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $antrian = Antrian_m::with('poli')->where('status', 'active')->latest()->get();
        $antrian = DB::table('tb_antrian')
        ->join('tb_poli', 'tb_antrian.id_poli', '=', 'tb_poli.id')
        ->leftJoin('tb_antrian_pasien', 'tb_antrian.id_poli', '=', 'tb_antrian_pasien.id_poli')
        ->where('tb_antrian.status', 'active')
        ->select('tb_antrian.id',
                'tb_antrian.id_poli',
                 DB::raw("SUM(CASE WHEN tb_antrian_pasien.status = 'MENUNGGU' THEN '1' ELSE 0 END ) as jumlah_antrian"), 
                 'tb_antrian.status', 
                 'tb_poli.nama_poli', 
                 'tb_antrian.no_antrian')
        ->groupBy('tb_antrian.id_poli')
        ->get();

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

        $dokter = Dokterpoli_m::with('dokter')->where('id_poli', $id_antrian_poli)->first();
        $nama_dokter = '';
        $jadwal_dokter = '';
        $hari_kerja = '';
        $jam_mulai_kerja = '';
        $jam_selesai_kerja = '';
        
        if($dokter)
        {
            $id_dokter = $dokter->dokter->id;
            $nama_dokter = $dokter->dokter->name;
            $jadwal_dokter = Jadwalkerjadokter_m::where('id_dokter', $id_dokter)->first();
            
            

            $hari_kerja = $jadwal_dokter->hari_kerja;
            $jam_mulai_kerja = $jadwal_dokter->jam_mulai_kerja;
            $jam_selesai_kerja = $jadwal_dokter->jam_selesai_kerja;
            
        }



      



        return view('pages.Dashboard.DaftarBerobat.index', compact('hari_kerja','jam_mulai_kerja','jam_selesai_kerja','nama_dokter','antrian_poli', 'nikes', 'id_antrian_poli', 'dokter', 'jadwal_dokter'));
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
