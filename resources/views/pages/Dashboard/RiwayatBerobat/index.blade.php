@extends('layouts.Dashboard.dashboard')


@section('title', 'Daftar Berobat Pasien')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')
<div class="row">
    <div class="col-xl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Berobat Pasien</h4>
            </div>

            <div class="card-body">
                <table id="table-view" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                    <thead>
                        <tr role="row">
                            <th class="text-center">Tgl</th>
                            <th class="text-center">Pemeriksaan</th>
                            <th class="text-center">Diagnosis</th>
                            <th class="text-center">Terapi</th>
                            <th class="text-center">Catatan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        
    </div>
</div>




@endsection


@push('after-script')
    <script>

        $(document).ready(function() {
            var ts = $('#table-view').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [
                                        
                                        [1, "ASC"],
                                        [2, "ASC"]
                                ],
                                ajax: {
                                        url: "{{ route('menu.riwayat-berobat-pasien.index') }}"
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
                                        {
                                                "targets": 4,
                                                "class": "text-sm",
                                                data: "catatan",
                                                name: "catatan",
                                                
                                        },
                                ]
                        })
        })

    </script>

@endpush