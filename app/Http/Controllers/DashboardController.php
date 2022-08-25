<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Antrianpasien;
use App\Models\Dokterpoli_m;
use App\Models\Pasien_m;
use App\Models\Poli_m;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $id_poli = [];
        $id_antrian = [];
        $id_poli_aktif = [];

        $now = Carbon::now();
        $time = $now->toDateString();
    

        $getPoli = Poli_m::where('is_active', 1)->get();
        $antrian_dokter = Dokterpoli_m::where('id_dokter', $id)->get();

        foreach($antrian_dokter as $data)
        {
            array_push($id_poli, $data['id_poli']);
        }

        foreach($getPoli as $data)
        {
            array_push($id_poli_aktif, $data['id']);
        }

        $fetchAntrianPasien = Antrianpasien::with(['pasien'])
                                            ->whereIn('id_poli', $id_poli)
                                            ->whereDate('created_at', $time)
                                            ->where('status', 'Menunggu')
                                            ->get();


        $countAntrianPasien =  Antrianpasien::whereIn('id_poli', $id_poli)
                                            ->whereDate('created_at', $time)
                                            ->where('status', 'Menunggu')
                                            ->count();

        $antrian_poli = DB::table('tb_antrian')
                            ->join('tb_poli', 'tb_antrian.id_poli', '=', 'tb_poli.id')
                            ->join('tb_antrian_pasien', 'tb_antrian.id_poli', '=', 'tb_antrian_pasien.id_poli')
                            ->where('tb_antrian.status', 'active')
                            ->whereIn('tb_antrian.id_poli', $id_poli)
                            ->select('tb_antrian.id',
                                    DB::raw("SUM(CASE WHEN tb_antrian_pasien.status = 'MENUNGGU' THEN '1' ELSE 0 END) as jumlah_antrian"), 
                                    'tb_antrian.status', 
                                    'tb_poli.nama_poli', 
                                    'tb_antrian.no_antrian')
                            ->groupBy('tb_antrian.id_poli')
                            ->get();


        $now = date('Y-m-d');

        $count_antrian = DB::table('tb_antrian_pasien')
                              ->select('tb_poli.nama_poli', DB::raw('COUNT(tb_antrian_pasien.id_pasien) as total_pasien'))
                              ->join('tb_pasien', 'tb_pasien.id', '=', 'tb_antrian_pasien.id_pasien')
                              ->join('tb_poli', 'tb_poli.id', '=', 'tb_antrian_pasien.id_poli')
                              ->whereDate('tb_antrian_pasien.created_at', $now)
                              ->groupBy('tb_antrian_pasien.id_poli')
                              ->get();
    

        return view('pages.Dashboard.Dashboard', compact('antrian_poli', 'countAntrianPasien','fetchAntrianPasien', 'now', 'count_antrian'));
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


    public function displayAntrian(Request $request)
    {
        $now = date('Y-m-d');

        $antrian = DB::table('tb_antrian')
                        ->join('tb_poli', 'tb_antrian.id_poli', '=', 'tb_poli.id')
                        ->join('tb_antrian_pasien', 'tb_antrian.id_poli', '=', 'tb_antrian_pasien.id_poli')
                        ->where('tb_antrian.status', 'active')
                        ->select('tb_antrian.id',
                                 DB::raw("SUM(CASE WHEN tb_antrian_pasien.status = 'MENUNGGU' THEN '1' ELSE 0 END) WHERE tb_antrian.status '=' active tb as jumlah_antrian"), 
                                 'tb_antrian.status', 
                                 'tb_poli.nama_poli', 
                                 'tb_antrian.no_antrian')
                        ->groupBy('tb_antrian.id_poli')
                        ->get();


        return view('pages.Landing.notification', compact('antrian'));
    }
}
