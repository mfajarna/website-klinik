@extends('layouts.Dashboard.dashboard')


@section('title', 'Manajemen Dokter Poli')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush




@section('content')

<div class="row pt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Konfigurasi Dokter Poli</h4>

            
               
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('menu/edit-dokter-poli/'.$model->id) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $model->id }}" />
                    <label class="form-label">Nama Dokter</label>
                    <select class="form-select" name="id_dokter">

                    <option value="{{ $model->id_dokter }}">{{ $model->dokter->name }}</option>
             
                    
                    </select>
                    
                    <label for="desc_poli" class="col-form-label">Nama Poli:</label>
                    <select class="form-select" name="id_poli">
                        <option value="{{ $model->id_poli }}">{{ $model->poli->nama_poli }}</option>
                        @foreach ($poli as $key => $val )
                            <option value="{{ $val->id }}">{{ $val->nama_poli }}</option>
                        @endforeach 
                    
                    </select>
                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light mt-4">Simpan</button>

                </form>
            </div>

            
        </div>
    </div>
</div>


@endsection