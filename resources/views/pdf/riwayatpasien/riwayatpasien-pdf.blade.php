<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.Dashboard.meta')
        <link rel="shortcut icon" href="{{ asset('/assets/images/LogoKlinikCS.jpg')}}">

        <!-- Bootstrap Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Cetak PDF Riwayat Pasien | Klinik Citra Sehat</title>
 

    </head>
    <body>
        <div class="row">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-12">
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Nama Pasien: {{$data[0]['pasien']['nama']}} </p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> NIKES: {{$data[0]['pasien']['nikes']}}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Umur: {{$data[0]['pasien']['umur']}}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Jenis Kelamin: {{$data[0]['pasien']['jenis_kelamin']}}</p>

                <h5 class="mt-4 mb-2">Riwayat Pemeriksaan</h5>

                        @foreach ($data as $item)
                        <div class="mt-4"></div>
                            <p class="text-muted">Tgl: {{$item->updated_at}}</p>
                            <p class="text-muted">Pemeriksaan: {{$item->pemeriksaan }}</p>
                            <p class="text-muted">Diagnosis: {{$item->diagnosis }}</p>
                            <p class="text-muted">Terapi: {{$item->terapi }} </p>
                            
                            
                        @endforeach
            </div>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>