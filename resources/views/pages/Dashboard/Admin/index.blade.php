@extends('layouts.Dashboard.dashboard')


@section('title', 'Manajemen Admin')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

@include('modal.admin.create')
<div class="row pt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manajemen Admin</h4>
               
            </div>
            <div class="card-body">

                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#ModalView">
                    <i class="bx bxs-add-to-queue font-size-16 align-middle me-2"></i> Tambah Admin
                </button>

                <div class="pt-2">
                    <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Admin</th>
                                <th class="text-center">Email</th>
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
            $(document).ready(function(){
                var t = $('#table-data').DataTable({
                processing: true,
                serverSide: true,
                "order" : [
                    [0, "ASC"],
                    [1, "ASC"],
                ],
                ajax:{
                    url: "{{ route('menu.admin.index') }}"
                },
                columnDefs:[
                    {targets:'_all', visible: true},
                    {
                        "targets": 0,
                        "class": "text-sm",
                        data: "name",
                        name: "name"
                    },
                    {
                        "targets": 1,
                        "class": "text-sm",
                        data: "email",
                        name: "email"
                    },
                    {
                        "targets": 2,
                        "class": "text-sm",
                        data: "aksi",
                        name: "aksi",
                        orderable: false
                    },

                ],
            })
            })
        </script>
@endpush