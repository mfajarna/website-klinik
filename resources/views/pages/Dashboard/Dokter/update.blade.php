@extends('layouts.Dashboard.dashboard')


@section('title', 'Update Dokter')


@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Dokter</h4>
               
            </div>
            <div class="card-body">
                <div class="pt-4">
                    <div class="modal-body">

                        <form method="POST" action="{{ route('menu.dokter.update', $model->id) }}">
                            @method('PUT')
                            @csrf
        
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="nama_dokter" class="col-form-label">Nama Dokter:</label>
                                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Masukan nama dokter..." value="{{ old('nama_dokter', $model->nama_dokter) }}" required>
                                </div>
        
                                <div class="col-lg-4">
                                    <label for="username" class="col-form-label">Username Dokter:</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username dokter..." value="{{ old('username', $model->user->username) }}" required>
                                </div>
        
                                <div class="col-lg-4">
                                    <label for="email" class="col-form-label">Email Dokter:</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email..." value="{{ old('email', $model->email) }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="no_hp" class="col-form-label">Alamat</label>
                                    <textarea  class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required> {{ $model->alamat}} </textarea>
                                </div>
        
                                <div class="col-lg-4">
                                    <label for="username" class="col-form-label">Tempat Tanggal Lahir:</label>
                                    <textarea  class="form-control" id="tempat tanggal lahir" name="tempat_tanggal_lahir" placeholder="Masukan tempat tanggal lahir" required> {{ $model->tempat_tanggal_lahir}}</textarea>
                                </div>
        
                                <div class="col-lg-4">
                                    <label for="no_hp" class="col-form-label">No Hp:</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan no_hp..." value="{{ old('no_hp', $model->no_hp) }}" required>
                                </div>
                            </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                    </form>
                    
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection