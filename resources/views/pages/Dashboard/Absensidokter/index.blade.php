@extends('layouts.Dashboard.dashboard')


@section('title', 'Absensi Dokter')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')
    <div class="row">

        @if (Auth::user()->role == "dokter")
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Absensi Dokter</h4>
                    <div class="row">
                        <p class="card-title-desc" id="tgl"></p>
                    </div>
                </div>
                <div class="card-body">
    
                    <div class="d-flex justify-content-center">
                        <h1 class="mb-sm-0  font-size-18" id="span"></h1>
                    </div>

                    <div class="d-flex justify-content-lg-center  pt-4">
                         <div class="row">
                                <button type="button" class="btn btn-primary waves-effect waves-light mb-2" id="clock_in">Clock In</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="clock_out">Clock Out</button>
                         </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Log Absensi</h4>
                </div>
                <div class="card-body">
    
                </button>
                <div>
                    <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Clock In</th>
                                <th class="text-center">Clock Out</th>
                        </thead>

                    </table>
                </div>
                </div>
            </div>
        </div>
        @endif

        @if(Auth::user()->role == "superadmin")
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Log Absensi Dokter</h4>
                </div>
                <div class="card-body">
    
                </button>
                <div>
                    <table id="table-data-dokter" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Clock In</th>
                                <th class="text-center">Clock Out</th>
                        </thead>

                    </table>
                </div>
                </div>
            </div>
        </div>        

        @endif

        @if (Auth::user()->role == "admin")
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Log Absensi Dokter</h4>
                </div>
                <div class="card-body">
    
                </button>
                <div>
                    <table id="table-data-dokter" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Clock In</th>
                                <th class="text-center">Clock Out</th>
                        </thead>

                    </table>
                </div>
                </div>
            </div>
        </div>
        @endif



    </div>
@endsection

@push('after-script')
    <script>

            const date = new Date();
            const tgl = date.toDateString();

            var s = date.getSeconds();
            var m = date.getMinutes();
            var h = date.getHours();

            var clock_now = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);

            document.getElementById('tgl').innerHTML = tgl;
            function time() {
            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();
            span.textContent = 
                ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
            }

            setInterval(time, 1000);

            $(document).ready(function() {

                var t = $('#table-data').DataTable({
                processing: true,
                serverSide: true,
                "order" : [
                    [0, "ASC"],
                    [1, "ASC"],
                    [2, "ASC"],
                    [3, "ASC"]
                ],
                ajax:{
                    url: "{{ route('menu.absensi-dokter.index') }}"
                },
                columnDefs:[
                    {targets:'_all', visible: true},
                    {
                        "targets": 0,
                        "class": "text-sm",
                        data: "user.name",
                        name: "user.name"
                    },
                    {
                        "targets": 1,
                        "class": "text-sm",
                        data: "tanggal_absensi",
                        name: "tanggal_absensi"
                    },
                    {
                        "targets": 2,
                        "class": "text-sm",
                        data: "clock_in",
                        name: "clock_in"
                    },
                    {
                        "targets": 3,
                        "class": "text-sm",
                        data: "clock_out",
                        name: "clock_out",
                        orderable: false
                    },

                ],
            })
                var clock = $('#span').text();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var datetime = new Date();
                var dateString = new Date(
                datetime.getTime() - datetime.getTimezoneOffset() * 60000
                );
                var curr_time = dateString.toISOString().replace("T", " ").substr(0, 19);

                const clock_in = $('#clock_in');
                const clock_out = $('#clock_out');

                clock_in.on('click', function(e){
                    e.preventDefault();
                    var param = "clock_in"

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("menu.absensi-dokter.store") }}',
                        data:{param_tanggal:curr_time, param_clock : clock_now, param: param, },
                        success: function(data)
                        {
                            location.reload()
                        }
                    })
                })

                clock_out.on('click', function(e){
                    e.preventDefault();
                    var param = "clock_out"

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("menu.absensi-dokter.store") }}',
                        data:{param_tanggal:curr_time, param_clock : clock_now, param: param, },
                        success: function(data)
                        {
                            location.reload()
                        }
                    })
                })


            })
    </script>
    <script>
        $(document).ready(function() {
            var td = $('#table-data-dokter').DataTable({
                processing: true,
                serverSide: true,
                "order" : [
                    [0, "ASC"],
                    [1, "ASC"],
                    [2, "ASC"],
                    [3, "ASC"]
                ],
                ajax:{
                    url: "{{ route('menu.absensidokter.get') }}"
                },
                columnDefs:[
                    {targets:'_all', visible: true},
                    {
                        "targets": 0,
                        "class": "text-sm",
                        data: "user.name",
                        name: "user.name"
                    },
                    {
                        "targets": 1,
                        "class": "text-sm",
                        data: "tanggal_absensi",
                        name: "tanggal_absensi"
                    },
                    {
                        "targets": 2,
                        "class": "text-sm",
                        data: "clock_in",
                        name: "clock_in"
                    },
                    {
                        "targets": 3,
                        "class": "text-sm",
                        data: "clock_out",
                        name: "clock_out",
                        orderable: false
                    },

                ],
            })

        })
    </script>
@endpush