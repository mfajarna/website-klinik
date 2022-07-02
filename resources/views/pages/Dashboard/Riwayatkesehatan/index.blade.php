@extends('layouts.Dashboard.dashboard')


@section('title', 'Manajemen Poli')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

@include('modal.riwayatpasien.view')

<div class="row pt-4">
        <div class="col-xl-12">
                <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manajemen Riwayat Kesehatan Pasien</h4>
                           
                        </div>
                        <div class="card-body">
                        
                         <div class="row">

                         </div>
            
                            <div class="pt-2">
                                <table id="table-data" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">Nama Pasien</th>
                                            <th class="text-center">No HP</th>
                                            <th class="text-center">Detail</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Email</th>
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
                        	
                        $.fn.dataTable.ext.errMode = 'none';
                        var t = $('#table-data').DataTable({
                                processing: true,
                                serverSide: true,
                                "order": [
                                        [0, "ASC"],
                                        [1, "ASC"],
                                ],
                                ajax: {
                                        url: "{{ route('menu.riwayat-kesehatan.index') }}",
                                },
                                columnDefs: [
                                        {targets:'_all', visible: true},
                                        {
                                                "targets": 0,
                                                "class": "text-sm",
                                                data: "nama",
                                                name: "nama"
                                        },
                                        {
                                                "targets": 1,
                                                "class": "text-sm",
                                                data: "no_telp",
                                                name: "no_telp"
                                        },
                                        {
                                                "targets": 2,
                                                "class": "text-sm",
                                                data: "view",
                                                name: "view",
                                                orderable: false
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
                                                data: "user.email",
                                                name: "user.email",
                                        },
                                        {
                                                "targets": 5,
                                                "class": "text-sm",
                                                data: "action",
                                                name: "action",
                                                orderable: false
                                        },
                                        
                                ]
                        })

                        t.on('click', '#btn_view', function(){
                                $('#ModalView').modal('show');

                                $tr = $(this).closest('tr')
                                if($($tr).hasClass('child'))
                                {
                                        $tr = $tr.prev('.parent')
                                }
                                
                                var data = t.row($tr).data();
                                var id = data.id;

                                $.ajax({
                                        method: 'get',
                                        url: '{{ route("menu.pendaftaran.getpasien") }}',
                                        data: {id:id},
                                        success: function(res){
                                                console.log(res)

                                                $('#nama_pasien').text(res.nama)
                                                $('#nikes').text("Nikes: " + res.nikes)
                                                $('#jenis_kelamin').text("Jenis Kelamin: " + res.jenis_kelamin)
                                                $('#no_telp').text("No Telepon: " + res.no_telp)
                                                $('#alamat').text("Alamat: " + res.alamat)
                                                $('#nama_orang_tua').text("Nama orang tua: " + res.nama_orang_tua)
                                                $('#umur').text("No Telepon: " + res.umur)
                                                $('#id_pasien').val(res.id)
                                                
                                        }
                                })
                        
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
                                        {
                                                "targets": 4,
                                                "class": "text-sm",
                                                data: "catatan",
                                                name: "catatan",
                                                
                                        },
                                        
                                ]
                        })
                  })
                })
        </script>

@endpush