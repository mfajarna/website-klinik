@extends('layouts.Dashboard.dashboard')


@section('title', 'Data Dokter')

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
                <h4 class="card-title">Manajemen Dokter</h4>
               
            </div>
            <div class="card-body">

                <div class="pt-2">
                    <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Bidang Keahlian</th>
               
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
    $(document).ready(function() {


        var t = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            "order" : [
                [0, "ASC"],
                [1, "ASC"],
                [2, "ASC"],
 
            ],
            ajax:{
                url: "{{ route('menu.dokter.index') }}"
            },
            columnDefs:[
                {targets:'_all', visible: true},
                {
                    "targets": 0,
                    "class": "text-sm",
                    data: "nama_dokter",
                    name: "nama_dokter"
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
                    data: "bidang_keahlian",
                    name: "bidang_keahlian"
                },


            ],
        })

        t.on('click', '#btn_jadwal', function() {
            $tr = $(this).closest('tr');
                    if($($tr).hasClass('child')){
                        $tr = $tr.prev('.parent')
                    }

                var data = t.row($tr).data();
                var id = data.id_user;

                $.ajax({
                    method: 'get',
                    url: '{{ route("menu.dokter.view-jadwal") }}',
                    data: {id:id},
                    success: function(res)
                    {
                        $('#ModalJadwal').modal('show');

                        console.log(res)

                        jQuery.each(res, function(index, item){

                            
                            var html = ''
                               
                                html += '<div class="col-xl-3 col-sm-6">'
                                
                                    html += ' <div class="card">'
                                        html += ' <div class="card-body">'
                                            html += '<div class="dropdown float-end">'
                                            html += ' </div>'
                                            
                                            html += '<div class="d-flex align-items-center">'
                                            html += '<div class="flex-1 ms-3">'
                                                html += '<h5 class="font-size-15 mb-1" id="nama_dokter">Jadwal Praktek ' + item.dokter.name + ' </h5>'
                                            html += ' </div>'
                                            html += ' </div>'
                                            
                                            html += '<div class="mt-3 pt-1">'
                                                html += ' <p class="text-muted mb-0" id="hari_kerja"><i class="mdi mdi-calendar font-size-15 align-middle pe-2 text-primary"></i>Jadwal Praktek: ' + item.hari_kerja + ' </p>'

                                                html += '<p class="text-muted mb-0 mt-2" id="jam_mulai"><i class="mdi mdi-clock-time-eight-outline font-size-15 align-middle pe-2 text-primary"></i>Mulai Praktek: ' + item.jam_mulai_kerja + ' </p>'
                                                
                                                html += '<p class="text-muted mb-0 mt-2" id="jam_selesai"><i class="mdi mdi-clock-time-eight-outline font-size-15 align-middle pe-2 text-primary"></i>Selesai Praktek: ' + item.jam_selesai_kerja + '</p>'
                                            html += ' </div>'

                                        html += ' </div>'
                                    
                                    html += '</div>'

                                html += '</div>'
                          


                            $('#newJadwalKerja').append(html)
                        })
                        
                    }
                })
        })

        $('#ModalJadwal').on('hidden.bs.modal', function () {
            location.reload();
        })

        $('#btn_tambah_bidang_keahlian').click(function (){
            var html = ''

            html += '<div class="row" id="inputTambahKeahlian">'
            html += '<div class="col-lg-6">'
            html += '<input type="text" class="form-control mt-2" id="bidang_keahlian" name="bidang_keahlian[]" placeholder="Masukan bidang keahlian" required>'
            
            html += '</div>'
            html += '<div class="col-lg-6">'
            html += '<button type="button" id="btn_hapus_bidang_keahlian" class="btn mt-2 btn-soft-light waves-effect">Hapus</button>'
            html += '</div>'
            html += '</div>'

            $('#newBidangKeahlian').append(html)
        })

        $('#btn_tambah_jam_kerja').click(function()
        {
            var html = ''

            html += '<div class="row mt-2" id="inputTambahJamKerja">'
            html += '<div class="col-lg-3">'
            html += '<label for="hari_kerja" class="col-form-label">Hari Kerja:</label>'
            html += '<select class="form-select" name="hari_kerja[]" required>'
            html += '<option value="senin">Senin</option>'
            html += '<option value="selasa">Selasa</option>'
            html += '<option value="rabu">Rabu</option>'
            html += '<option value="kamis">Kamis</option>'
            html += '<option value="jumat">Jumat</option>'
            html += '<option value="sabtu">Sabtu</option>'
            html += '<option value="minggu">Minggu</option>'
            html += '</select>'
            html += '</div>'
            html += '<div class="col-lg-3">'
            html += '<label for="jam_mulai_kerja" class="col-form-label">Jam Mulai Kerja:</label>'
            html += '<input class="form-control" type="time" name="jam_mulai_kerja[]" value="08:30:00" id="example-time-input" required>'
            html += '</div>'
            html += '<div class="col-lg-3">'
            html += '<label for="jam_selesai_kerja" class="col-form-label">Jam Selesai Kerja:</label>'
            html += '<input class="form-control" type="time" name="jam_selesai_kerja[]" value="17:00:00" id="example-time-input" required>'
            html += '</div>'
            html += '<div class="col-lg-3 mt-4">'
            html += '<button type="button" id="btn_hapus_jadwal_kerja" class="btn mt-2 btn-soft-light waves-effect">Hapus</button>'
            html += '</div>'
            html += '</div>'

            $('#newJamKerja').append(html)
        })


    })


    $(document).on('click', '#btn_hapus_bidang_keahlian', function()
    {
        $(this).closest('#inputTambahKeahlian').remove();
    })

    $(document).on('click', '#btn_hapus_jadwal_kerja', function()
    {
        $(this).closest('#inputTambahJamKerja').remove();
    })
</script>
@endpush