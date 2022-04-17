<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="menu_title">Formulir Pendaftaran Pemeriksaan</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

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
                                @foreach ($antrian_poli as $key => $val )
                                    <option value="{{ $val->id }}">{{ $val->poli->nama_poli }}</option>

                                @endforeach
                        </select>

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
