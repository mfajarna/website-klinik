<?php

namespace App\Http\Controllers;

use App\Models\Pasien_m;
use App\Models\Pemeriksaanpasien_m;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatkesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Pasien_m::with(['pemeriksaan'])
                                    ->latest()
                                    ->get();

        if(request()->ajax())
        {
            return DataTables::of($model)
                        ->addColumn('view', function($tipe){
                            $button = '<button type="button" id="btn_view" name="btn_view" class="btn btn-info waves-effect btn-label waves-light"><i class="bx bx-detail label-icon"></i>View Detail</button>';


                            return $button;
                        })
                        ->addColumn('action', function($tipe){
                            $button = '<a href="/menu/print-pdf-kesehatan?id='. $tipe->id .'" class="btn btn-light waves-effect waves-light w-sm">
                                            <i class="mdi mdi-upload d-block font-size-16"></i> Download PDF
                                        </a>';

                            return $button;
                        })
                        ->rawColumns(['view','action'])
                        ->make(true);
        }

        return view('pages.Dashboard.Riwayatkesehatan.index');
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

    public function getRiwayatKesehatan(Request $request)
    {
        $id = $request->id;

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
    } 

    public function downloadPdf(Request $request)
    {
        $id = $request->id;

        $model = Pemeriksaanpasien_m::with('pasien')->where('id_pasien', $id)->latest()->get();

        $a = 'A';

        $pdf = PDF::loadView('pdf.riwayatpasien.riwayatpasien-pdf', ['data' => $model]);

        return $pdf->download('riwayat-pasien.pdf');

    }
}
