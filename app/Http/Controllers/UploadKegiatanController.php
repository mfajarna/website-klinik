<?php

namespace App\Http\Controllers;

use App\Models\Uploadkegiatan_m;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UploadKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Uploadkegiatan_m::latest()->get();

        if(request()->ajax()){
            return DataTables::of($model)
                        ->addColumn('aksi', function($tipe){
                            $button = '<div class="btn-group" role="group">';
                            $button .= '<button id="btnGroupVerticalDrop1" type="button" class="btn btn-success waves-effect btn-label waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Edit <i class="mdi mdi-chevron-down"></i>
                                                            <i class="bx bx-edit-alt label-icon"></i>
                                        </button>';
                            $button .=  '<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                            <a class="dropdown-item" id="btn_update" href="#">Update Data</a>
                                                            <a class="dropdown-item" id="btn_hapus" href="/menu/delete-kegiatan/?id= '. $tipe->id . '">Hapus Data</a>
                                        </div>';

                            return $button;
                        })
                        ->rawColumns(['aksi'])
                        ->make(true);
        }

        return view('pages.Dashboard.Uploadkegiatan.index');
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
            'nama_kegiatan' => 'string|required',
            'deskripsi_kegiatan'    => 'string|required',
            'gambar_kegiatan'    => 'required|file:jpg,jpeg,png|max:2048',
        ]);

        $model = new Uploadkegiatan_m();
        $model->nama_kegiatan = $validate['nama_kegiatan'];
        $model->deskripsi_kegiatan = $validate['deskripsi_kegiatan'];
        
        $path_gambar = $request->file('gambar_kegiatan')->store('assets/file/gambar_kegiatan', 'public');

        $model->status_kegiatan = "active";
        $model->gambar_kegiatan = $path_gambar;
        $model->save();


        toast()->success('Berhasil Menyimpan Data');
        return redirect()->route('menu.upload-kegiatan.index');
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

    public function deleteKegiatan(Request $request)
    {
        $id = $request->id;

        $model = Uploadkegiatan_m::findOrFail($id);
        $model->delete();


        if($model)
        {
            toast()->success('Berhasil Hapus data');
        

            return redirect()->route('menu.upload-kegiatan.index');
        }else{
            toast()->success('Berhasil Hapus data');
        

            return redirect()->route('menu.upload-kegiatan.index');
        }




    }
}
