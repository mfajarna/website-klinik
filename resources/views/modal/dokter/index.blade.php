<div class="modal bs-example-modal-xl fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="menu_title">Tambah Data Dokter</h6>
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

                <form method="POST" action="{{ route('menu.dokter.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nama_dokter" class="col-form-label">Nama Dokter:</label>
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Masukan nama dokter..." value="{{ old('nama_dokter') }}" required>
                        </div>

                        <div class="col-lg-4">
                            <label for="username" class="col-form-label">Username Dokter:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username dokter..." value="{{ old('username') }}" required>
                        </div>

                        <div class="col-lg-4">
                            <label for="email" class="col-form-label">Email Dokter:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email..." value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="no_hp" class="col-form-label">Alamat</label>
                            <textarea  class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required> </textarea>
                        </div>

                        <div class="col-lg-4">
                            <label for="username" class="col-form-label">Tempat Tanggal Lahir:</label>
                            <textarea  class="form-control" id="tempat tanggal lahir" name="tempat tanggal lahir" placeholder="Masukan tempat tanggal lahir" required> </textarea>
                        </div>

                        <div class="col-lg-4">
                            <label for="no_hp" class="col-form-label">No Hp:</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan no_hp..." value="{{ old('no_hp') }}" required>
                        </div>
                    </div>

                    <hr class="mt-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="bidang_keahlian" class="col-form-label">Bidang Keahlian:</label>
                            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian[]" placeholder="Masukan bidang keahlian" required>

                            <div id="newBidangKeahlian"></div>
                        </div>

                        
                    </div>

                    <button type="button" id="btn_tambah_bidang_keahlian" class="btn btn-link mt-2 waves-effect">Tambah bidang keahlian</button>

                    <hr class="mt-2">

                    <div class="row">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="hari_kerja" class="col-form-label">Hari Kerja:</label>
                                <select class="form-select" name="hari_kerja[]" required>
                                    <option disabled>-- Pilih Hari Kerja --</option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                    <option value="minggu">Minggu</option>
                                </select>
                            </div>
    
                            <div class="col-lg-4">
                                <label for="jam_mulai_kerja" class="col-form-label">Jam Mulai Kerja:</label>
                                <input class="form-control" type="time" name="jam_mulai_kerja[]" value="08:30:00" id="example-time-input" required>
                            </div>
    
                            <div class="col-lg-4">
                                <label for="jam_selesai_kerja" class="col-form-label">Jam Selesai Kerja:</label>
                                <input class="form-control" type="time" name="jam_selesai_kerja[]" value="17:00:00" id="example-time-input" required>
                            </div>
                        </div>

                        <div id="newJamKerja"></div>

                    </div>

                    <button type="button" id="btn_tambah_jam_kerja" class="btn btn-link mt-2 waves-effect">Tambah Jam Kerja</button>
                    

                    
                
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Simpan</button>

            </form>
            <button type="button" class="btn btn-link text-gray text-gradient px-4 mb-0 mt-2 close-modal" onClick="closeModal()" data-dismiss="modal">Close</button>
            
        </div>
        </div>
    </div>
</div>
