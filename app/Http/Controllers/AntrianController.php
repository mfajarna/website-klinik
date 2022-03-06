<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use Illuminate\Http\Request;
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

        $antrian = Antrian_m::with('poli')->latest()->get();
    

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


        $model = Antrian_m::findOrFail($id);

        $model->no_antrian = 0;
        $model->update();

        response()->json($model);
        return toast()->success('Berhasil Reset No Antrian Menjadi 0');
    }

    public function nextAntrian(Request $request)
    {
        $id = $request->id;

        $max_kode = Antrian_m::where('id', $id)->max('no_antrian');
        $dataPoli = Antrian_m::with('poli')->where('id',$id)->first();


        $namaPoli = $dataPoli['poli']['nama_poli'];
        $nextPoli = $max_kode + 1;


        $model = Antrian_m::findOrFail($id);

        $model->no_antrian = $max_kode + 1;
        $model->update();


        return response()->json([$namaPoli, $nextPoli]);
         toast()->success('Berhasil Next Antrian');
    }
}
