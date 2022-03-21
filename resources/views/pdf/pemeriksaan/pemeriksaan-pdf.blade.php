<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.Dashboard.meta')
        <link rel="shortcut icon" href="{{ asset('/assets/images/LogoKlinikCS.jpg')}}">

        <!-- Bootstrap Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Cetak PDF Pemeriksaan Pasien | Klinik Citra Sehat</title>
 

    </head>
    <body>
        <div class="row">
            <div class="col-lg-5">
            </div>
            
            <div class="col-lg-12">

                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Tgl: {{ $data['amp;data']['tanggal_periksa'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Nama Pasien: {{ $data['data']['nama_pasien'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> NIKES: {{ $data['amp;data']['nikes'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Umur: {{ $data['amp;data']['umur'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Jenis Kelamin: {{ $data['amp;data']['jenis_kelamin'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Pemeriksaan: {{ $data['amp;data']['pemeriksaan'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Diagnosis: {{ $data['amp;data']['diagnosis'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Terapi: {{ $data['amp;data']['terapi'] }}</p>
                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Dokter: {{ $data['amp;data']['nama_dokter'] }}</p>

            </div>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>