@extends('layouts.Dashboard.dashboard')


@section('title', 'Upload Jadwal Kegiatan')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

@include('modal.uploadkegiatan.create')

<div class="row pt-4">
    <div class="col-xl-12">
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manajemen Upload Kegiatan Klinik</h4>
                       
                    </div>
                    <div class="card-body">
                        
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#ModalView">
                            <i class="bx bxs-add-to-queue font-size-16 align-middle me-2"></i> Upload Kegiatan
                        </button>
                        <div class="pt-2">
                            <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center">Nama Kegiatan</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
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
        $(document).ready(function(){
            var t = $('#table-data').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [
                                        [0, "ASC"],
                                        [1, "ASC"],
                                ],
                                ajax: {
                                        url: "{{ route('menu.upload-kegiatan.index') }}",
                                },
                                columnDefs: [
                                        {targets:'_all', visible: true},
                                        {
                                                "targets": 0,
                                                "class": "text-sm",
                                                data: "nama_kegiatan",
                                                name: "nama_kegiatan"
                                        },
                                        {
                                                "targets": 1,
                                                "class": "text-sm",
                                                data: "deskripsi_kegiatan",
                                                name: "deskripsi_kegiatan"
                                        },
                                        {
                                                "targets": 2,
                                                "class": "text-sm",
                                                data: "gambar_kegiatan",
                                                name: "gambar_kegiatan",
                                                orderable: false
                                        },
                                        {
                                                "targets": 3,
                                                "class": "text-sm",
                                                data: "status_kegiatan",
                                                name: "status_kegiatan",
                                        },
                                        {
                                                "targets": 4,
                                                "class": "text-sm",
                                                data: "aksi",
                                                name: "aksi",
                                                orderable: false
                                        },
                                        
                                ]
                        })
        
                    })
    </script>
    
@endpush