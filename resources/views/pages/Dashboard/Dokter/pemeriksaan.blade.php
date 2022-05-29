@extends('layouts.Dashboard.dashboard')


@section('title', 'Pemeriksaan Pasien')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pemeriksaan Pasien</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('menu.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pemeriksaan Pasien</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg">
                            <div class="avatar-title bg-soft-primary text-primary display-4 m-0 rounded-circle">
                                <i class="bx bxs-user-circle"></i>
                            </div>
                        </div>
                        <div class="flex-1 ms-3">
                            <h5 class="font-size-15 mb-1"><a href="#" class="text-dark"></a>
                                @if($pasien['jenis_kelamin'] == "L")
                                Tn. {{ $pasien['nama'] }}</h5>
                                
                                @else
                                Ny. {{ $pasien['nama'] }}</h5></p>
                                @endif

                                
                    <p class="text-muted mb-0">Pasien</p>
                        </div>
                    </div>
                    <div class="mt-3 pt-1">

                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><i class="mdi mdi-format-list-numbered font-size-15 align-middle pe-2 text-primary"></i>
                                    Nikes: {{ $pasien['nikes']}} </p>
                                <p class="text-muted mb-0 mt-2"><i class="mdi mdi-list-status font-size-15 align-middle pe-2 text-primary"></i>
                                    No Telepon : {{ $pasien['no_telp']}} </p>

                                <p class="text-muted mb-0 mt-2"><i class="mdi mdi-list-status font-size-15 align-middle pe-2 text-primary"></i>
                                    Jenis Kelamin : 
                                        @if($pasien['jenis_kelamin'] == "L")
                                            Laki-Laki </p>
                                            
                                        @else
                                            Perempuan </p>
                                        @endif
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><i class="mdi mdi-account-clock font-size-15 align-middle pe-2 text-primary"></i>
                                    Alamat : {{ $pasien['alamat'] }}</p>

                                <p class="text-muted mb-0 mt-2"><i class="mdi mdi-account-clock font-size-15 align-middle pe-2 text-primary"></i>
                                    Umur : {{ $pasien['umur'] }} Tahun</p>
                            </div>

                            <h5 class="font-size-15 mb-1 mt-2"> Keluhan Pasien </h5>
                            <p class="text-muted mb-0 mt-2">
                                    {{ $keluhan['keluhan']}}
                            </p>
                        </div>

                    </div>
                </div>

            </div>
            <!-- end card -->
        </div>
        
        <div class="col-xl-6 col-sm-6">
           <div class="card">
               <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table-view" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                            <thead>
                                <input type="hidden" id="id_pasien" value="{{ $pasien['id'] }}" />
                                <tr role="row">
                                    <th class="text-center">Tgl</th>
                                    <th class="text-center">Pemeriksaan</th>
                                    <th class="text-center">Diagnosis</th>
                                    <th class="text-center">Terapi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
               </div>
           </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Formulir Pemeriksaan</h4>
                    <p class="card-title-desc">Mohon inputkan data diagnosa pasien pada formulir dibawah ini</p>
                </div>

                <div class="card-body">
                <form action="{{ route('menu.dokter.pemeriksaan.create') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id_pasien" value="{{ $pasien['id'] }}">
                    <input type="hidden" name="id_dokter" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_antrian" value="{{ $id_pasien }}">


                    <div class="row">
                        <div class="col-xl-5 col-md-6">
                            <div class="form-group mb-3">
                                <label>Pemeriksaan</label>
                                <textarea name="pemeriksaan" required placeholder="Masukan hasil pemeriksaan..." class="form-control"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Diagnosis</label>
                                <textarea name="diagnosis" required placeholder="Masukan hasil diagnosis..." class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-xl-5 col-md-6">
                            <div class="form-group mb-3">
                                <label>Terapi</label>
                                <textarea name="terapi" required placeholder="Masukan hasil terapi..." class="form-control"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Catatan</label>
                                <textarea name="catatan" required placeholder="Masukan catetan..." class="form-control"></textarea>
                            </div>
                        
                        </div>

                        <div class="col-lg-5">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Submit Pemeriksaan
                            </button>
                        </div>

                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('after-script')

    <script>
        $(document).ready(function(){

            getData();

            function getData()
            {
                var id = $('#id_pasien').val();
                var ts = $('#table-view').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [
                                        
                                        [1, "ASC"],
                                        [2, "ASC"]
                                ],
                                ajax: {
                                        url: "{{ route('menu.riwayat-kesehatan.getriwayat') }}",
                                        data: {id:id}
                                },
                                columnDefs: [
                                        {targets:'_all', visible: true},
                                        {
                                                "targets": 0,
                                                "class": "text-sm",
                                                data: "render_tanggal",
                                                name: "render_tanggal",
                                        },
                                        {
                                                "targets": 1,
                                                "class": "text-sm",
                                                data: "pemeriksaan",
                                                name: "pemeriksaan"
                                        },
                                        {
                                                "targets": 2,
                                                "class": "text-sm",
                                                data: "diagnosis",
                                                name: "diagnosis",
                                        },
                                        {
                                                "targets": 3,
                                                "class": "text-sm",
                                                data: "terapi",
                                                name: "terapi",
                                                
                                        },   
                                ]
                        })
            }
        })
    </script>

@endpush