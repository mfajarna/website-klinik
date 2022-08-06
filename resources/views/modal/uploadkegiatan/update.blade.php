<div class="modal fade" id="ModalViewUpdate" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="menu_title">Update Upload Kegiatan</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form method="POST" action="{{ route('menu.upload-kegiatan.updateKegiatan') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Contoh: Poli Anak, Poli Ibu, Poli Umum">
                    <label for="nama_kegiatan" class="col-form-label">Nama Kegiatan:</label>
                    <input type="text" class="form-control" id="nama_kegiatan_update" name="nama_kegiatan" placeholder="Contoh: Poli Anak, Poli Ibu, Poli Umum">
                    
                    <label for="deskripsi_kegiatan" class="col-form-label">Deskripsi Kegiatan:</label>
                    <textarea class="form-control" id="deskripsi_kegiatan_update" name="deskripsi_kegiatan"></textarea>

                    <label for="gambar_kegiatan">Upload gambar kegiatan:</label>
                    <input class="form-control" type="file" id="gambar_kegiatan" name="gambar_kegiatan">
                    <span class="text-muted">File: png, max size: 2mb</span>
                
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Simpan</button>

            </form>
        </div>
        </div>
    </div>
</div>
