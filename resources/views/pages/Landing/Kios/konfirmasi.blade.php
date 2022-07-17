<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.Landing.meta')

    <title>@yield('title') | Klinik Citra Sehat</title>

    @include('includes.Landing.style')
    <link rel="stylesheet" type="text/css" href="{{ url('https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css')}}">
    <style>
        body{
            background-color: aqua;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center pt-4">
        <div class="row">
            <img src="{{ url('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="150">
            <h4 class="pt-4 text-center">
                KLINIK CITRA SEHAT
            </h4>
        </div>
    </div>


        <div class="d-flex justify-content-center pt-4">
            <div class="row">


                <h1>Nama Pasien: {{ $model->nama }}</h1>
                <h1>NIKES: {{ $model->nikes }}</h1>

                <div class="row pt-2">
                    <div class="col-md-3">
                        <form action="{{ url('/pendaftaranbykios') }}" method="POST">
                            @csrf
        
                            <input type="hidden" name="id_pasien" value="{{ $model->id }}"  />
                            <input type="hidden" name="nikes" value="{{ $model->nikes }}"  />
                            <input type="hidden" name="nama" value="{{ $model->nama }}"  />
                            <input type="hidden" name="keluhan" value="Disampaikan diklinik"  />
                            <input type="hidden" name="id_poli" value="{{ $id_poli }}"  />
                            

                            <div class="col-md-3">
                                <button type="submit" id="btn_benar" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px; width:200px">
                                    <h5 class="text-white">BENAR</h5>
                                 </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="btn_salah"  value="0" class="btn btn-danger waves-effect waves-light w-xl" style="height: 100px">
                            <h5 class="text-white">SALAH</h5>
                         </button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="btn_kembali"  value="0" class="btn btn-warning waves-effect waves-light w-xl" style="height: 100px">
                            <h5 class="text-white">KEMBALI</h5>
                         </button>
                    </div>
                </div>
            </div>

        </div>

        @include('includes.Landing.script')
        <script>
            $(document).ready(function() {
                $('#btn_salah').on('click', function(){
                    location.href = '/kios'
                })
                $('#btn_kembali').on('click', function(){
                    location.href = '/kios'
                })
            })
        </script>

    
</body>
</html>