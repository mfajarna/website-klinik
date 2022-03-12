@extends('layouts.Landing.landing')

@section('title', 'Pendaftaran Pemeriksaan')


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
                                <p>A</p>
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
                            
                                                        <form action="{{ route('pendaftaran.store') }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-firstname-input">Nama Lengkap Pasien</label>
                                                                <input type="text" class="form-control" name="nama" id="formrow-firstname-input" placeholder="Masukan nama lengkap anda..." required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="formrow-email-input">NIKES</label>
                                                                        <input type="number" class="form-control" name="nikes" id="formrow-email-input" placeholder="Masukan nikes anda..." required>
                                                                    </div>
                                                                </div>
                            
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="formrow-email-input">No Telepon</label>
                                                                        <input type="number" maxlength="12" class="form-control" name="no_telp" id="formrow-email-input" placeholder="Masukan nomor telepon anda..." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="formrow-email-input">Jenis Kelamin</label>
                                                                        <select class="form-select" name="jenis_kelamin">
                                                                            <option value="L">Laki-Laki</option>
                                                                            <option value="P">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                            
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="form-umur">Umur</label>
                                                                        <input type="number" class="form-control" name="umur" id="form-umur" placeholder="Masukan umur anda disini..." required>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-alamat-input">Alamat</label>
                                                                <textarea class="form-control" name="alamat" id="formrow-alamat-input" placeholder="Masukan Alamat anda disini.." required></textarea>
                                                            </div>
                            
                                                            <div class="mb-3">
                                                                <label class="form-label" for="form-nama_orang_tua">Nama Orang Tua *opsional</label>
                                                                <input type="text" class="form-control" name="nama_orang_tua" id="form-nama_orang_tua" placeholder="Masukan nama orang tua anda...">
                                                            </div>
                                
                                                      
                                                    </div>
                            
                                                    <div class="col-lg-6">
                                                        <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Keluhan Pasien</h5>
                            
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input">Keluhan</label>
                                                            <textarea class="form-control" name="keluhan" id="formrow-firstname-input" placeholder="Masukan Keluhan anda disini.." required></textarea>
                                                        </div>
                            
                                                        <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Tujuan Poli</h5>
                                                            <select class="form-select" name="tujuan_poli">
                                                                    @foreach ($antrian_poli as $key => $val )
                                                                        <option value="{{ $val->id }}">{{ $val->poli->nama_poli }}</option>
                            
                                                                    @endforeach
                                                            </select>
                            
                                                            <p class="card-title-desc">*Hanya poli yang sudah buka yang tersedia</p>
                            
                                                            <div class="mt-4">
                                                                <button type="submit" id="submit_data" class="btn btn-primary w-md">Daftar Periksa</button>
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


@endsection


@push('after-script')

    <script>

    </script>
    
@endpush