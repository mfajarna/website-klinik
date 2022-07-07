<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="menu_title">Tambah Upload Kegiatan</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form method="POST" action="{{ route('menu.upload-kegiatan.store') }}" enctype="multipart/form-data">
                    @csrf

                    <label for="nama_kegiatan" class="col-form-label">Nama Kegiatan:</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Contoh: Poli Anak, Poli Ibu, Poli Umum" value="{{ old('nama_kegiatan') }}" required>
                    
                    <label for="deskripsi_kegiatan" class="col-form-label">Deskripsi Kegiatan:</label>
                    <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan"></textarea>

                    <label for="gambar_kegiatan">Upload gambar kegiatan:</label>
                    <input class="form-control" type="file" id="gambar_kegiatan" name="gambar_kegiatan" required>
                    <span class="text-muted">File: png, max size: 2mb</span>
                
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Simpan</button>

            </form>

            
        </div>
        </div>
    </div>
</div>
