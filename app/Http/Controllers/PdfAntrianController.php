<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Antrianpasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfAntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = $request->all();

        return view('pdf.antrianpasien.antrian-pdf', compact('data'));
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

    public function exportPdf($id)
    {
        $model = Antrianpasien::with(['poli','pasien'])->first();

        $date = date('d m Y', strtotime($model['created_at']));

        $dataPdf = [
            'nama' => $model['pasien']['nama'],
            'nikes' => $model['pasien']['nikes'],
            'keluhan'   => $model['pasien']['keluhan'],
            'nama_poli'    => $model['poli']['nama_poli'],
            'waktu' => $date,
            'no_antrian'   => $model['no_antrian']
        ];


        $pdf = PDF::loadView('pdf.antrianpasien.download-pdf-antrian', ['data' => $dataPdf]);

        return $pdf->download('antrian-pasien.pdf');


    }
}
