@extends('layouts.Dashboard.dashboard')


@section('title', 'Update Poli')


@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Poli</h4>
               
            </div>
            <div class="card-body">
                <div class="pt-4">
                    <div class="modal-body">
                        <form method="POST" action="{{ route('menu.poli.update', $model->id) }}">
                            @csrf
                            @method('put')
                            
                            <input type="hidden" name="id" value={{$model->id}} />

                            <label for="nama_poli" class="col-form-label">Nama Poli:</label>
                            <input type="text" class="form-control" id="nama_poli" name="nama_poli" placeholder="Contoh: Poli Anak, Poli Ibu, Poli Umum" value="{{ old('nama_poli', $model->nama_poli) }}" required>
                            
                            <label for="desc_poli" class="col-form-label">Deskripsi Poli:</label>
                            <textarea class="form-control" id="desc_poli" name="desc_poli">{{ $model->desc_poli}}</textarea>
                        
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