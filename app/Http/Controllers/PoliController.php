<?php

namespace App\Http\Controllers;

use App\Models\Antrian_m;
use App\Models\Poli_m;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Poli_m::latest()->get();

      


        if(request()->ajax())
        {
            return DataTables::of($model)
                            ->addColumn('action', function($tipe)
                            {
                                $button = "<div class='d-flex gap-3 align-center'>";

                                $button .= "<a href='/menu/remove-poli?id=". $tipe->id ."' name='delete' id='" . $tipe->id ."' class='button text-danger'><i class='mdi mdi-delete font-size-18'></i></a>";
                                $button .= "<a href='/menu/poli/". $tipe->id ."/edit/' name='update' id='" . $tipe->id ."' class='button text-primary'><i class='mdi mdi-pen font-size-18'></i></a>";

                                $button .= "</div>";

                                return $button;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('pages.Dashboard.Poli.index');
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
            'nama_poli'     => 'required|string',
            'desc_poli'     => 'required|string|max:10000'
        ]);

        $name = $validate['nama_poli'];

        //split the name to a maximum of 2 array values.
        list ($first_name, $second_names) = explode(' ', $name, 2);

        $first_name = explode(' ', $first_name);

        $second_names = explode(' ', $second_names);

        foreach ($first_name as $key => $value) {
            $first_name[$key] = $value[0];
        }


        foreach ($second_names as $key => $value) {
            $second_names[$key] = $value[0];
        }

        $nama_poli =  implode(' ', $first_name). implode(' ', $second_names);

        $poli = new Poli_m();
        $poli->nama_poli = $validate['nama_poli'];
        $poli->desc_poli = $validate['desc_poli'];
        $poli->is_active = 1;
        
        $poli->save();

        $antrian = new Antrian_m();
        $antrian->id_poli = $poli->id;
        $antrian->status = 'non-active';
        $antrian->no_antrian = $nama_poli . 0;

        $antrian->save();

        if($poli && $antrian)
        {
            toast()->success('Berhasil Membuat Data Poli Baru');

            return redirect()->route('menu.poli.index');
        }else{
            toast()->error('Gagal Membuat Data Poli Baru');

            return redirect()->route('menu.poli.index');
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
        $model = Poli_m::findOrFail($id);


        return view('pages.Dashboard.Poli.update', compact('model'));
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
        $data = $request->all();

        $model = Poli_m::findOrFail($id);
        $model->nama_poli = $data['nama_poli'];
        $model->desc_poli = $data['desc_poli'];
        $model->update();

        if($model)
        {
            toast()->success('Berhasil Update Data Poli');
            return redirect()->route('menu.poli.index');
        }else{
            toast()->error('Gagal Update Data Poli');
            return redirect()->route('menu.poli.index');
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
        //
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $model = Poli_m::findOrFail($id);

        $model->delete();

        $antrian = Antrian_m::where('id_poli', $id)->delete();

        if($model && $antrian)
        {
            toast()->success('Berhasil Hapus Data Poli');
            return redirect()->route('menu.poli.index');
        }else{
            toast()->error('Gagal Hapus Data Poli');
            return redirect()->route('menu.poli.index');
        }


    }
}
