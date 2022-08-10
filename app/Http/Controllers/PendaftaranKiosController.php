<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Antrianpasien;
use App\Models\Keluhanpasien_m;
use App\Models\Pasien_m;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

class PendaftaranKiosController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $data = $request->all();
    

        $keluhan = $data['keluhan'];
        $tujuan_poli = $data['id_poli'];

        $fetchPasien = Pasien_m::where('id', $data['id_pasien'])->first();
        $nama_pasien = $fetchPasien['nama'];
        $nikes = $fetchPasien['nikes'];

        $createPasien = new Keluhanpasien_m();
        $createPasien->id_pasien = $data['id_pasien'];
        $createPasien->keluhan = $keluhan;
        $createPasien->save();

        $fetchPoli = Antrian_m::with('poli')->where('id', $tujuan_poli)->first();
        $antrian_poli = $fetchPoli['no_antrian'];
        $nama_poli = $fetchPoli['poli']['nama_poli'];

        $time = date('D M Y');
        $huruf_antrian = substr($antrian_poli, 0, 2);
        $find_code = Antrianpasien::where('id_poli', $tujuan_poli)->max('no_antrian');

        if($find_code)
        {
            $value_code = substr($find_code,2);
            $code = (int) $value_code;
            $code = $code + 1;
            $no_antrian = $huruf_antrian . $code;
        }else{
            $no_antrian = $huruf_antrian . 1;
        }

        $antrianPasien = new Antrianpasien();
        $antrianPasien->id_pasien = $data['id_pasien'];
        $antrianPasien->id_poli = $tujuan_poli;
        $antrianPasien->no_antrian = $no_antrian;
        $antrianPasien->status = "Menunggu";
        $antrianPasien->save();

        if($createPasien && $antrian_poli){
            $model = Antrianpasien::with(['poli','pasien'])->latest()->first();

            $date = date('d m Y', strtotime($model['created_at']));
    
            // $dataPdf = [
            //     'nama' => $model['pasien']['nama'],
            //     'nikes' => $model['pasien']['nikes'],
            //     'keluhan'   => $keluhan,
            //     'nama_poli'    => $model['poli']['nama_poli'],
            //     'waktu' => $date,
            //     'no_antrian'   => $model['no_antrian']
            // ];

            $nama = $model['pasien']['nama'];
            $nikes = $model['pasien']['nikes'];
            $keluhan   = $keluhan;
            $nama_poli    = $model['poli']['nama_poli'];
            $waktu = $date;
            $no_antrian   = $model['no_antrian'];
          
    
            // $pdf = PDF::loadView('pdf.antrianpasien.download-pdf-antrian', ['data' => $dataPdf]);
            
            // return $pdf->download('antrian-pasien.pdf');

            $printer = new ReceiptPrinter;
            $printer->init(
                config('receiptprinter.connector_type'),
                config('receiptprinter.connector_descriptor')
            );


            // Set store info
            $printer->setStore($nama, $nikes, $keluhan, $nama_poli, $waktu, $no_antrian);
            $printer->setTransactionID($no_antrian);

                    // Set qr code
        $printer->setQRcode([
            'tid' => $no_antrian,
        ]);

        // Print receipt
        $printer->printReceipt();

        }else{
            return response()->json('500');
        }
    }

    public function konfirmasi($nikes, $id_poli)
    {

        $model = Pasien_m::where('nikes', $nikes)->orWhere('nama', $nikes)->first();

       
        return view('pages.Landing.Kios.konfirmasi', compact('model','id_poli'));
    }
}
