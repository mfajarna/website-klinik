<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Antrianpasien;
use App\Models\Keluhanpasien_m;
use App\Models\Pasien_m;
use App\Models\Poli_m;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class Pendaftaranpemeriksaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $antrian_poli = Antrian_m::with('poli')
                                    ->where('status', 'active')
                                    ->latest()->get();

        return view('pages.Dashboard.Pendaftaran.index', compact('antrian_poli'));
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
        $validate = $request->validate([
            'username' => 'required|string',
            'email'     => 'required|string|unique:users,email',
            'nama'  => 'required|string',
            'nikes' => 'required|unique:tb_pasien,nikes',
            'no_telp'   => 'required',
            'alamat'    => 'required',
            'umur'  => 'required',
            'jenis_kelamin' => 'required',

        ]);
        
        
        $data = $request->all();

        $createUser = new User();
        $createUser->name = $validate['nama'];
        $createUser->email = $validate['email'];
        $createUser->username = $validate['username'];
        $createUser->password = Hash::make('Pasien123');
        $createUser->role = 'pasien';
        $createUser->save();

        $createPasien = new Pasien_m();
        $createPasien->id_user = $createUser->id;
        $createPasien->nama = $validate['nama'];
        $createPasien->nikes = $validate['nikes'];
        $createPasien->no_telp = $validate['no_telp'];
        $createPasien->alamat = $validate['alamat'];
        $createPasien->umur = $validate['umur'];
        $createPasien->nama_orang_tua = $data['nama_orang_tua'];
        $createPasien->jenis_kelamin = $validate['jenis_kelamin'];

        $createPasien->save();

        
        if($createUser && $createPasien)
        {
            toast()->success('Berhasil membuat data pasien');       
            
            return redirect()->route('menu.pendaftaran.index');
    
        }else{
            toast()->error('Gagal membuat data pasien');
    
            return redirect()->route('menu.pendaftaran.index');
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


    public function getPasien(Request $request)
    {
        $nikes = $request->nikes;
        $id = $request->id;

        if($nikes)
        {
            $model = Pasien_m::where('nikes', $nikes)->first();
        }
        if($id)
        {
            $model = Pasien_m::where('id',$id)->first();
        }

        

        return response()->json($model);

    }

    public function createPasienTerdaftar(Request $request)
    {
        $time = Carbon::now();
        $now = date('Y-m-d');
        $countAntrianPasien = Antrianpasien::whereDate('created_at', $now)->count();
        $id = Auth::user()->id;

        $pasien = Pasien_m::where('id_user', $id)->first();
        $id_pasien = $pasien->id;

        $status_pasien_db = Antrianpasien::where('id_pasien', $id_pasien)->latest()->first();
        $status = $status_pasien_db->status;


        if($countAntrianPasien >= 100)
        {
            toast()->error('Gagal karena pendaftaran sudah melebihi 100 pasien');
    
            return redirect()->route('menu.daftar-berobat.index');
        }
        if($status == "Menunggu")
        {
            toast()->error('Gagal karena anda masih terdaftar untuk berobat!');
    
            return redirect()->route('menu.daftar-berobat.index');
        }
        else{
            $validate = $request->validate([
                'keluhan'   => 'required',
                'tujuan_poli'   => 'required'
            ]);
    
            $data = $request->all();
    
            $fetchPasien = Pasien_m::where('id', $data['id_pasien'])->first();
    
    
            $nama_pasien = $fetchPasien['nama'];
            $nikes = $fetchPasien['nikes'];
    
    
    
            $createPasien = new Keluhanpasien_m();
            $createPasien->id_pasien = $data['id_pasien'];
            $createPasien->keluhan = $validate['keluhan'];
    
            $createPasien->save();
    
            $id_poli = $validate['tujuan_poli'];
    
            $fetchPoli = Antrian_m::with('poli')->where('id_poli', $id_poli)->first();
    
    
            $antrian_poli = $fetchPoli['no_antrian'];
            $nama_poli = $fetchPoli['poli']['nama_poli'];
    
            $time = date('D M Y');
            $his = date('H:i:s');
    
            $huruf_antrian = substr($antrian_poli, 0, 2);
    
    
            $find_code = Antrianpasien::where('id_poli', $id_poli)->max('no_antrian');
    
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
            $antrianPasien->id_poli = $id_poli;
            $antrianPasien->no_antrian = $no_antrian;
            $antrianPasien->status = "Menunggu";
    
            $antrianPasien->save();
    
    
            if($createPasien && $antrian_poli)
            {
        
                $dataPdf = [
                    'id'    => $antrianPasien->id,
                    'nama_poli'    => $nama_poli,
                    'waktu' => $time,
                    'no_antrian'   => $no_antrian,
                    'his'       => $his
                ];
    
                toast()->success('Berhasil membuat data pasien');
    
                // auto-download pdf
                
    
                return redirect()->route('pdf-antrian.index', ['data' => $dataPdf]);
    
                
        
            }else{
                toast()->error('Gagal membuat data pasien');
        
                return redirect()->route('menu.pendaftaran.index');
            }
        }

       
    }

    public function dataPasien()
    {
        $model = Pasien_m::with('user')->get();

        if(request()->ajax())
        {
            return DataTables::of($model)->make(true);
        }

        return view('pages.Dashboard.Pendaftaran.pasien');
    }
}
