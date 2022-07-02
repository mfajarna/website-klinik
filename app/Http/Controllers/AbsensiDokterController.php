<?php

namespace App\Http\Controllers;

use App\Models\Absensidokter_m;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AbsensiDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $model = Absensidokter_m::with('user')->where('id_dokter', $id)->latest()->get();


        if(request()->ajax())
        {
            return DataTables::of($model)->make(true);
        }

        return view('pages.Dashboard.Absensidokter.index');
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
        $param = $request->param;
        $clock = $request->param_clock;
        $param_tanggal = $request->param_tanggal;
        $id = Auth::user()->id;

        $time = Carbon::now();
        $now = $time->toDateString();

        try{

            $check = Absensidokter_m::where('id_dokter', $id)->whereDate('created_at', $now)->first();


            if($param == "clock_in")
            {
                if($check)
                {
                    $check->clock_in = $clock;
                    $check->save();

                    return response()->json([
                        'code' => 200,
                        'message' => 'success mengupdate absensi baru'
                    ]);
                }else{
                    $model = new Absensidokter_m;
                    $model->id_dokter = $id;
                    $model->tanggal_absensi = $param_tanggal;
                    $model->clock_in = $clock;
                    $model->save();


                    return response()->json([
                        'code' => 200,
                        'message' => 'success mendaftarkan absensi baru'
                    ]);
                }
            }if($param == "clock_out")
            {
                if($check)
                {
                    $check->clock_out = $clock;
                    $check->save();

                    return response()->json([
                        'code' => 200,
                        'message' => 'success mengupdate absensi baru'
                    ]);
                }
            }
    
        }catch(Exception $e)
        {
            return response()->json([
                'code' => 404,
                'message' => $e->getMessage()
            ]);
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

    public function getDokterAbsensi()
    {
        $model = Absensidokter_m::with('user')->latest()->get();

        if(request()->ajax())
        {
            return DataTables::of($model)->make(true);
        }
    }

}
