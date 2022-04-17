@extends('layouts.Dashboard.dashboard')

@section('title', 'Pendaftaran Pemeriksaan')

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">

                        <div class="flex-grow-1">
                            <h5 class="font-size-14 mb-0">Klinik Citra Sehat</h5>
                            <small class="text-muted">klinikcitrasehat@support.com</small>
                        </div>

                        
                    </div>

                    <h4 class="font-size-16 mb-3" >Terimakasih Telah Mendaftar Antrian, Mohon cek data-data dibawah ini !</h4>
                
                    @foreach($data as $item)

                    <input type="hidden" id="id" value={{ $item['id']}}>

                    <div class="row mb-3 mt-2">
                        <div class="col-md-6">
                            <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Nama Pasien: {{ $item['nama'] }}</p>
                            <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> NIKES: {{ $item['nikes'] }}</p>

                            <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Keluhan: {{ $item['keluhan'] }}</p>
                            <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Tujuan Poli: {{ $item['nama_poli'] }}</p>
                            
                            <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Jenis Pendaftaran: Pendaftaran Online</p>
                            <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Waktu Pendaftaran: {{ $item['waktu'] }}</p>
                    
                            <h4 class="font-size-16 mb-3" >NO ANTRIAN: {{ $item['no_antrian'] }}</h4>
                        </div>
                    </div>

                    @endforeach

                    <button id="btn_print" class="btn btn-primary waves-effect btn-label waves-light"><i class="mdi mdi-download label-icon"></i>Download PDF Antrian</button>

            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')

    <script>
        $(document).ready(function()
        {
            $('#btn_print').click(function(){
                var id = $('#id').val();

                var url = '/download-pdf-antrian/'+id;

                window.open(url)
            })
        })
    </script>
    
@endpush
