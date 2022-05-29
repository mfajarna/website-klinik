<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Antrianpasien;
use App\Models\Dokter_m;
use App\Models\Dokterpoli_m;
use App\Models\Jadwalkerjadokter_m;
use App\Models\Keluhanpasien_m;
use App\Models\Pasien_m;
use App\Models\Pemeriksaanpasien_m;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DateTime;
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

        $model = Dokter_m::all();
        

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
                                                    <a class="dropdown-item" id="btn_active" href="/menu/dokter/'.$data->id.'/edit">Update Data</a>
                                                    <a class="dropdown-item" id="btn_non_active" href="/menu/delete-dokter?id='.$data->id.'">Hapus Data</a>
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
            'username'  => 'required|unique:users,username',
            'bidang_keahlian'   => 'array',
            'no_hp' => 'required',
            'alamat'    => 'required',
            'tempat_tanggal_lahir' => 'required'
        ]);


        
        $user = new User();

        $user->name = $validation['nama_dokter'];
        $user->email = $validation['email'];
        $user->username = $validation['username'];
        $user->password = Hash::make('Dokter123');
        $user->role = 'dokter';

        $user->save();


        $dataDokter = new Dokter_m();

        $dataDokter->id_user = $user->id;
        $dataDokter->nama_dokter = $validation['nama_dokter'];
        $dataDokter->email = $validation['email'];
        $dataDokter->bidang_keahlian = $request->bidang_keahlian;
        $dataDokter->password = Hash::make('Dokter123');
        $dataDokter->role = 'dokter';
        $dataDokter->no_hp = $validation['no_hp'];
        $dataDokter->alamat = $validation['alamat'];
        $dataDokter->tempat_tanggal_lahir = $validation['tempat_tanggal_lahir'];
        $dataDokter->save();



        $data = $request->all();

    
        foreach($data['hari_kerja'] as $key => $val)
        {

            $dataJamKerja = new Jadwalkerjadokter_m();
            $dataJamKerja->id_dokter = $user->id;
    

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
        $model = Dokter_m::with('user')->where('id', $id)->first();
        

        return view('pages.Dashboard.Dokter.update', compact('model'));
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
        $model = Dokter_m::findOrFail($id);
        $id_user = $model->id_user;
        $data = $request->all();

        $model->nama_dokter = $data['nama_dokter'];
        $model->email= $data['email'];
        $model->no_hp = $data['no_hp'];
        $model->alamat = $data['alamat'];
        $model->tempat_tanggal_lahir = $data['tempat_tanggal_lahir'];
        $model->update();
    

        $model_user = User::findOrFail($id_user);
        $model_user->name = $data['nama_dokter'];
        $model_user->email = $data['email'];
        $model_user->username = $data['username'];
        $model_user->update();

        if($model && $model_user)
        {
            toast()->success('Berhasil update data dokter');

            return redirect()->route('menu.dokter.index');
        }else{
            toast()->error('Gagal update data dokter');

            return redirect()->route('menu.dokter.index');
        }

        
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

    public function pemeriksaanPasien(Request $request, $id)
    {

        $pasien = Pasien_m::findOrFail($id);

        

        $time = Carbon::now();
        $now = $time->toDateString();

        $keluhan = Keluhanpasien_m::where('id_pasien', $id)->whereDate('created_at', $now)->first();
        $antrian = Antrianpasien::where('id_pasien', $id)->whereDate('created_at', $now)->first();

        $id_pasien = $antrian['id'];


    

        return view('pages.Dashboard.Dokter.pemeriksaan', compact('pasien', 'keluhan', 'id_pasien'));
    }

    public function createPemeriksaan(Request $request)
    {
        $validate = $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_antrian'    => 'required',
            'pemeriksaan'   => 'required|string',
            'diagnosis' => 'required|string',
            'terapi'    => 'required|string',
            'catatan'   => 'string'
        ]);


        $pemeriksaan = new Pemeriksaanpasien_m();
        $pemeriksaan->id_pasien = $validate['id_pasien'];
        $pemeriksaan->id_dokter = $validate['id_dokter'];
        $pemeriksaan->pemeriksaan = $validate['pemeriksaan'];
        $pemeriksaan->diagnosis = $validate['diagnosis'];
        $pemeriksaan->terapi = $validate['terapi'];
        $pemeriksaan->catatan = $validate['catatan'];

        $pemeriksaan->save();

        $antrian = Antrianpasien::findOrFail($validate['id_antrian']);

        $antrian->status = "Selesai";
        $antrian->save();


        if($pemeriksaan && $antrian)
        {
            $dataParam = $pemeriksaan;

            toast()->success('Berhasil membuat pemeriksaan pasien');

            return redirect()->route('menu.dokter.pemeriksaan.view-pdf', ['dataParam' => $dataParam]);
        }else{
            toast()->error('Gagal membuat pemeriksaan pasien');

            return redirect()->route('menu.dokter.pemeriksaanpasien', ['id' => $validate['id_pasien']]);
        }
    }


    public function viewPdf(Request $request)
    {
        $id_antrian = $request->all();

        $data = Pemeriksaanpasien_m::with(['pasien','dokter'])->where('id', $id_antrian)->first();

  
        $nama_pasien = $data['pasien']['nama'];
        $nikes = $data['pasien']['nikes'];
        $no_telp = $data['pasien']['no_telp'];
        $alamat = $data['pasien']['alamat'];
        $umur = $data['pasien']['umur'];
        $jenis_kelamin = $data['pasien']['jenis_kelamin'];
        $nama_dokter = $data['dokter']['name'];
        $pemeriksaan = $data['pemeriksaan'];
        $diagnosis = $data['diagnosis'];
        $terapi = $data['terapi'];
        $tanggal_periksa = $data['updated_at'];




        $param = [
            'nama_pasien'       => $nama_pasien,
            'nikes'             => $nikes,
            'no_telp'           => $no_telp,
            'alamat'            => $alamat,
            'umur'              => $umur,
            'jenis_kelamin'     => $jenis_kelamin,
            'nama_dokter'       => $nama_dokter,
            'pemeriksaan'       => $pemeriksaan,
            'diagnosis'         => $diagnosis,
            'terapi'            => $terapi,
            'tanggal_periksa'    => $tanggal_periksa
        ];


        return view('pages.Dashboard.Dokter.pemeriksaan-blank', ['param' => $param]);
    }


    public function printPdf(Request $request)
    {
        $data = $request->all();

        
        $pdf = PDF::loadView('pdf.pemeriksaan.pemeriksaan-pdf', ['data' => $data]);


        return $pdf->download('pemeriksaan-pasien.pdf');
        // return view('pdf.pemeriksaan.pemeriksaan-pdf',['data' => $data]);


    }

    public function getAllDokter()
    {
        $model = Dokter_m::all();
        

        if(request()->ajax())
        {
            return DataTables::of($model)
                ->addColumn('jadwal_kerja', function($data){
                    $button = '<div class="col-xl-6">';
                    $button .= '<button type="button" id="btn_jadwal" class="btn btn-info waves-effect btn-label waves-light"><i class="  bx bx-check-circle label-icon"></i>Lihat Jadwal Kerja</button>';
                    $button .= '</div>';

                    return $button;
                })
                ->make(true);
        }

        return view('pages.Dashboard.Dokter.dokter');
    }

    public function deleteDokter(Request $request)
    {
        $id = $request->id;

        $modelDokter = Dokter_m::findOrFail($id);
        $modelDokter->delete();

        $modelUser = User::where('id', $modelDokter->id_user)->first();
        $modelUser->delete();

        $modelJadwalKerja = Jadwalkerjadokter_m::where('id_dokter', $modelUser->id);
        $modelJadwalKerja->delete();

        $modelDokterPoli = Dokterpoli_m::where('id_dokter', $modelUser->id);
        $modelDokterPoli->delete();

        if($modelDokter && $modelUser && $modelJadwalKerja && $modelDokterPoli)
        {
            toast()->success('Berhasil Hapus data dokter');

            return redirect()->route('menu.dokter.index');
        }else{
            toast()->error('Gagal Hapus data dokter');

            return redirect()->route('menu.dokter.index');
        }
    }
}
