<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Antrian_m::with('poli')->get();

        // $antrian = Antrian_m::with('poli')->latest()->get();

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

        if(request()->ajax())
        {
            return DataTables::of($model)
                    ->addColumn('action', function($tipe)
                    {

                        $button = '<div class="col-xl-6">';

                        

                        $button .= '<div class="btn-group" role="group">';
                        $button .= '<button id="btnGroupVerticalDrop1" type="button" class="btn btn-success waves-effect btn-label waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Edit Status Antrian <i class="mdi mdi-chevron-down"></i>
                                                        <i class="bx bx-edit-alt label-icon"></i>
                                    </button>';
                        $button .=  '<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                        <a class="dropdown-item" id="btn_active" href="#">Active</a>
                                                        <a class="dropdown-item" id="btn_non_active" href="#">Non-Active</a>
                                    </div>';

                        $button .= '</div>';
                        $button .= '</div>';

                        $button .= '<div class="col-xl-6 mt-2">';

                        $button .= '<button type="button" id="btn_reset" class="btn btn-primary waves-effect btn-label waves-light"><i class=" bx bx-reset label-icon"></i>Reset Antrian</button>';

                        $button .= '</div>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

        }

        return view('pages.Dashboard.Antrian.index', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

    public function editStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        $model = Antrian_m::findOrFail($id);

        if($status == "active")
        {
            

            $model->status = "active";
            $model->update();

        }else{
            $model->status = "non-active";
            $model->update();
        }
        
        response()->json($model);
        return toast()->success('Berhasil Update Status Antrian');
    }


    public function resetAntrian(Request $request)
    {
        $id = $request->id;

        $dataPoli = Antrian_m::with('poli')->where('id',$id)->first();
        $antrian_poli = $dataPoli['no_antrian'];
        $huruf_antrian = substr($antrian_poli, 0, 2);

        $resetAntrian = $huruf_antrian . 0;

        $model = Antrian_m::findOrFail($id);

        $model->no_antrian = $resetAntrian;
        $model->update();

        response()->json($model);
        return toast()->success('Berhasil Reset No Antrian Menjadi 0');
    }

    public function nextAntrian(Request $request)
    {
        $id = $request->id;

        $max_kode = Antrian_m::where('id', $id)->max('no_antrian');

        $value_code = substr($max_kode, 2);

        $next_antrian = $value_code + 1;

        

        $dataPoli = Antrian_m::with('poli')->where('id',$id)->first();

        $antrian_poli = $dataPoli['no_antrian'];

        $huruf_antrian = substr($antrian_poli, 0, 2);


        $namaPoli = $dataPoli['poli']['nama_poli'];
        $nextPoli = $huruf_antrian. $next_antrian;


        $model = Antrian_m::findOrFail($id);

        $model->no_antrian = $nextPoli;
        $model->update();


        return response()->json([$namaPoli, $nextPoli]);

    
         toast()->success('Berhasil Next Antrian');
    }
}
