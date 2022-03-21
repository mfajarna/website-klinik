<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = User::where('role', 'admin')->latest()->get();

        if(request()->ajax())
        {
            return DataTables::of($model)
            ->addColumn('aksi', function($data)
            {
                $button = '<div class="btn-group" role="group">';
                $button .= '<button id="btnGroupVerticalDrop1" type="button" class="btn btn-success waves-effect btn-label waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Edit <i class="mdi mdi-chevron-down"></i>
                                                <i class="bx bx-edit-alt label-icon"></i>
                            </button>';
                $button .=  '<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                <a class="dropdown-item" id="btn_active" href="#">Update Data</a>
                                                <a class="dropdown-item" id="btn_non_active" href="/menu/hapus-admin?id='. $data->id . '">Hapus Data</a>
                            </div>';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('pages.Dashboard.Admin.index');
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
            'nama_admin'   => 'required|string',
            'email'  => 'required|email|unique:users,email',
        ]);

        $user = new User();

        $user->name = $validation['nama_admin'];
        $user->email = $validation['email'];
        $user->password = Hash::make('Admin123');
        $user->role = 'admin';

        $user->save();

        if($user)
        {
            toast()->success('Berhasil membuat data admin');

            return redirect()->route('menu.admin.index');
        }else{
            toast()->error('Gagal membuat data admin');

            return redirect()->route('menu.admin.index');
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

    public function hapusAdmin(Request $request)
    {
        $id = $request->id;

        $model = User::findOrFail($id);
        $model->delete();

        if($model)
        {
            toast()->success('Berhasil hapus data admin');

            return redirect()->route('menu.admin.index');
        }else{
            toast()->error('Gagal hapus data admin');

            return redirect()->route('menu.admin.index');
        }
    }
}
