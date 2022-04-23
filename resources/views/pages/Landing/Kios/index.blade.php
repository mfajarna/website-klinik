@extends('layouts.Landing.landing')

@section('title', 'Pendaftaran KiosK')


@section('content')

    

    <div class="checkout-tabs">

        
        <div class="row">
            <div class="col-xl-12">
                                                   
                <div class="nav nav-pills flex-column flex-sm-row nav-justified" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                        <i class= "bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Pasien yang sudah terdaftar</p>
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
                    url: '{{ route("kios.getpasienkios") }}',
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