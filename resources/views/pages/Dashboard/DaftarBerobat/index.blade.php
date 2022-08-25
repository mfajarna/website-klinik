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
<div class="checkout-tabs">

        
    <div class="row">
        <div class="col-xl-12">

                <div class="card">
                        <div class="card-body">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Error</strong> - {{ $error }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                @endforeach
                    
                                @endif
                    
                                <form action="{{ route('menu.pendaftaran.pasienbaru') }}" method="POST">
                                    @csrf
                    
                                    <input type="hidden" id="id_pasien" name="id_pasien">
                                    <input type="hidden" id="nikes" name="nikes" value="{{ $nikes }}">
                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Nama Pasien</h5>
                                                <input type="text" name="nama_pasien_terdaftar" id="nama_pasien_terdaftar" data-pristine-required-message="Please Enter a username" class="form-control" disabled>
                                            </div>
                            
                                            <div class="mb-3">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Nikes</h5>
                                                <input type="text" name="nikes_pasien_terdaftar" id="nikes_pasien_terdaftar" data-pristine-required-message="Please Enter a username" class="form-control" disabled>
                                            </div>
                            
                                            <div class="mb-3">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> No Telepon</h5>
                                                <input type="text" name="no_telepon_pasien_terdaftar" id="no_telepon_pasien_terdaftar" data-pristine-required-message="Please Enter a username" class="form-control" disabled>
                                            </div>
                            
                                            <div class="mb-3">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Jenis Kelamin</h5>
                                                <input type="text" name="jenis_kelamin_pasien_terdaftar" id="jenis_kelamin_pasien_terdaftar" data-pristine-required-message="Please Enter a username" class="form-control" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Umur Pasien</h5>
                                                <input type="text" name="umur_pasien_terdaftar" id="umur_pasien_terdaftar" data-pristine-required-message="Please Enter a username" class="form-control" disabled>
                                            </div>
                                        </div>
                    
                                        <div class="col-lg-5">
                                            
                                                
                                            <div class="mb-3">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Keluhan Pasien</h5>
                                                <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukan Keluhan anda disini.." required></textarea>
                                            </div>
                    
                                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Tujuan Poli</h5>
                                            <select class="form-select" name="tujuan_poli" id="tujuan_poli">
                                                        <option value="{{ $antrian_poli->id_poli }}">{{ $antrian_poli->poli->nama_poli }}</option>
                    
                                            </select>

                                            <div class="mb-3 mt-4">
                                                <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Nama Dokter</h5>


                                                <input type="text" data-pristine-required-message="Please Enter a username" value="{{ $dokter->dokter->name }}" class="form-control" disabled>
                                            </div>

                                            <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Jadwal Dokter</h5>

                    
                                            <h6 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Hari Kerja: {{ $jadwal_dokter->hari_kerja }}</h6>
                                            <h6 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Jam Kerja: {{ $jadwal_dokter->jam_mulai_kerja }} -  {{ $jadwal_dokter->jam_selesai_kerja }}</h6>
                                        </div>
                                            <p class="card-title-desc">*Hanya poli yang sudah buka yang tersedia</p>
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Daftar Periksa</button>
                            </form>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</div>




@endsection


@push('after-script')
<script>
        $(document).ready(function(){


                var kode_nikes = $('#nikes').val();

                function getPasien()
                {
                        $.ajax({
                        type: 'GET',
                        url: '{{ route("menu.pendaftaran.getpasien") }}',
                        data: {nikes: kode_nikes},
                        success: function(res)
                        {
                                console.log(res);
        
                                if(res.nikes != null)
                                {
                                $('#ModalView').modal('show');
        
        
                                var id = $('input[name=id_pasien]').val(res.id)
                                var nama = $('input[name=nama_pasien_terdaftar]').val(res.nama)
                                var nikes = $('input[name=nikes_pasien_terdaftar]').val(res.nikes)
                                var no_telepon = $('input[name=no_telepon_pasien_terdaftar]').val(res.no_telp)
                                var jenis_kelamin = $('input[name=jenis_kelamin_pasien_terdaftar').val(res.jenis_kelamin)
                                var umur = $('input[name=umur_pasien_terdaftar]').val(res.umur)
                                }else{
                                alert("Data Tidak Ada")
                                }
        
                        }
                        })
                }
                
                getPasien()

            })
 
    
    </script>
@endpush