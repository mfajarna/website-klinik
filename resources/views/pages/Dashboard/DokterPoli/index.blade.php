@extends('layouts.Dashboard.dashboard')


@section('title', 'Manajemen Dokter Poli')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush




@section('content')

@include('modal.dokterpoli.index', ['dokter' => $dokter, 'poli' => $poli])

<div class="row pt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manajemen Dokter Poli</h4>
               
            </div>
            <div class="card-body">

                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#ModalView">
                    <i class="bx bxs-add-to-queue font-size-16 align-middle me-2"></i> Tambah Dokter Poli
                </button>

                <div class="pt-2">
                    <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Nama Poli</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
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
        $(document).ready(function (){
            var t = $('#table-data').DataTable({
                    processing: true,
                    serverSide: true,
                    "order" : [
                    [0, "ASC"],
                    [1, "ASC"],
                    [2, "ASC"],
                ],
                ajax:{
                    url: "{{ route('menu.dokter-poli.index') }}"
                },
                columnDefs:[
                    {targets:'_all', visible: true},
                    {
                        "targets": 0,
                        "class": "text-sm",
                        data: "dokter.nama_dokter",
                        name: "dokter.nama_dokter"
                    },
                    {
                        "targets": 1,
                        "class": "text-sm",
                        data: "poli.nama_poli",
                        name: "poli.nama_poli"
                    },
                    {
                        "targets": 2,
                        "class": "text-sm",
                        data: "status",
                        name: "status"
                    },
                ],
            })
        })

    </script>
    
@endpush