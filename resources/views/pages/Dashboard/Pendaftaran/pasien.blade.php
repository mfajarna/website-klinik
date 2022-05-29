@extends('layouts.Dashboard.dashboard')


@section('title', 'Data Pasien')

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
                <h4 class="card-title">Data Pasien</h4>
               
            </div>
            <div class="card-body">

                <div class="pt-2">
                    <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Pasien</th>
                                <th class="text-center">Nikes</th>
                                <th class="text-center">No Telp</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Umur</th>
                                <th class="text-center">Jenis Kelamin</th>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('after-script')
    <script>
                    var ts = $('#table-data').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [
                                        
                                        [1, "ASC"],
                                        [2, "ASC"]
                                ],
                                ajax: {
                                        url: "{{ route('menu.pendaftaran.allpasien') }}",
                                },
                                columnDefs: [
                                        {targets:'_all', visible: true},
                                        {
                                                "targets": 0,
                                                "class": "text-sm",
                                                data: "nama",
                                                name: "nama",
                                        },
                                        {
                                                "targets": 1,
                                                "class": "text-sm",
                                                data: "nikes",
                                                name: "nikes"
                                        },
                                        {
                                                "targets": 2,
                                                "class": "text-sm",
                                                data: "no_telp",
                                                name: "no_telp",
                                        },
                                        {
                                                "targets": 3,
                                                "class": "text-sm",
                                                data: "alamat",
                                                name: "alamat",
                                                
                                        },
                                        {
                                                "targets": 4,
                                                "class": "text-sm",
                                                data: "umur",
                                                name: "umur",
                                                
                                        },
                                        {
                                                "targets": 5,
                                                "class": "text-sm",
                                                data: "jenis_kelamin",
                                                name: "jenis_kelamin",
                                                
                                        },
                                        
                                ]
                        })
    </script>
@endpush