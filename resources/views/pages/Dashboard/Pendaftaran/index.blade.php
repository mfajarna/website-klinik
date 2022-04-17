@extends('layouts.Dashboard.dashboard')


@section('title', 'Pendaftaran Pasien')

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
                                               
            <div class="nav nav-pills flex-column flex-sm-row nav-justified" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                    <i class= "bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Pasien yang sudah terdaftar</p>
                </a>
                <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false"> 
                    <i class= "bx bx-add-to-queue d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Buat pasien baru</p>
                </a>

            </div>

            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                            

                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <h4 class="card-title">Formulir pasien klinik citra sehat yang telah terdaftar !</h4>
                                    <p class="card-title-desc">Mohon untuk memasukan kode nikes untuk melihat data yang telah terdaftar</p>
                                    <label class="mt-2">Masukan kode nikes: </label>
                                    <input type="number" data-pristine-required-message="Masukan kode nikes..." id="kode_nikes" class="form-control mb-3">
                                    
                                    <button type="button" id="btn_cari" class="btn btn-info waves-effect btn-label waves-light"><i class="bx bx-file-find label-icon mb-2"></i> Cari...</button>
                                </div>

                                <div class="col-lg-6">
                                    <div class="alert alert-info alert-dismissible fade show px-4 mb-0 text-center mt-2" role="alert">
                                        <i class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>
                                        <h5 class="text-info">Informasi!</h5>
                                        <p>Mohon untuk menginput kode nikes yang telah terdaftar sebelumnya di klinik citra sehat!</p>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                            <h4 class="card-title">Formulir Pendaftaran Pemeriksaan Klinik Citra Sehat</h4>
                                            <p class="card-title-desc">Mohon untuk mengisikan data keperluan pemeriksaan!</p>
                                        <div class="p-4">
                                            <div class="row">
                        
                                                @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Error</strong> - {{ $error }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                @endforeach
                        
                                                @endif
                        
                                                <div class="col-lg-5">
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Data Diri Pasien</h5>
                        
                                                    <form method="post" action={{ route('menu.pendaftaran.store') }}>
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nama">Email Pasien</label>
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email lengkap anda..." required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nama">Username Pasien</label>
                                                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username lengkap anda..." required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nama">Nama Lengkap Pasien</label>
                                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama lengkap anda..." required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="nikes">NIKES</label>
                                                                    <input type="number" class="form-control" name="nikes" id="nikes" placeholder="Masukan nikes anda..." required>
                                                                </div>
                                                            </div>
                        
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="no_telp">No Telepon</label>
                                                                    <input type="number" maxlength="12" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan nomor telepon anda..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Jenis Kelamin</label>
                                                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                                                        <option value="L">Laki-Laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                        
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="umur">Umur</label>
                                                                    <input type="number" class="form-control" name="umur" id="umur" placeholder="Masukan umur anda disini..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        <div class="mb-3">
                                                            <label class="form-label" for="alamat">Alamat</label>
                                                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat anda disini.." required></textarea>
                                                        </div>
                        
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nama_orang_tua">Nama Orang Tua *opsional</label>
                                                            <input type="text" class="form-control" name="nama_orang_tua" id="nama_orang_tua" placeholder="Masukan nama orang tua anda...">
                                                        </div>
                            
                                                  
                                                </div>
                        
                                                <div class="col-lg-6">
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Keluhan Pasien</h5>
                        
                                                    <div class="mb-3">
                                                        <label class="form-label" for="keluhan">Keluhan</label>
                                                        <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukan Keluhan anda disini.." required></textarea>
                                                    </div>
                        
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Tujuan Poli</h5>
                                                        <select class="form-select" name="tujuan_poli" id="tujuan_poli">
                                                                @foreach ($antrian_poli as $key => $val )
                                                                    <option value="{{ $val->id }}">{{ $val->poli->nama_poli }}</option>
                        
                                                                @endforeach
                                                        </select>
                        
                                                        <p class="card-title-desc">*Hanya poli yang sudah buka yang tersedia</p>
                        
                                                        <div class="mt-4">
                                                            <button type="submit" id="onSubmit" class="btn btn-primary w-md">Daftar Periksa</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('modal.cekpasien.index', ['antrian_poli' => $antrian_poli])



@endsection


@push('after-script')
<script>
    $(document).ready(function(){
        $('#btn_cari').click(function(){
            var kode_nikes = $('#kode_nikes').val();

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
        })
    })

</script>
@endpush