<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.Dashboard.meta')

        <title>Antrian Pasien | Klinik Citra Sehat</title>


        {{-- @include('includes.Dashboard.style')   --}}

    </head>

    <body data-topbar="dark">
        <div id="layout-wrapper">

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
                        
                        

                                <div class="row mb-3 mt-2">
                                    <div class="col-md-6">
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Nama Pasien: {{ $data['nama'] }}</p>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> NIKES: {{ $data['nikes'] }}</p>

                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Keluhan: {{ $data['keluhan'] }}</p>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Tujuan Poli: {{ $data['nama_poli'] }}</p>
                                        
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Jenis Pendaftaran: Pendaftaran Online</p>
                                        <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>Waktu Pendaftaran: {{ $data['waktu'] }}</p>
                                
                                        <h4 class="font-size-16 mb-3" >NO ANTRIAN: {{ $data['no_antrian'] }}</h4>
                                    </div>
                                </div>

                        

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>