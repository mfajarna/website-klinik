<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="menu_title">Tambah Data Dokter Poli</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form method="POST" action="{{ route('menu.dokter-poli.store') }}">
                    @csrf

                    <label class="form-label">Nama Dokter</label>
                    <select class="form-select" name="data_dokter">

                        @foreach ($dokter as $key => $val )
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    
                    </select>
                    
                    <label for="desc_poli" class="col-form-label">Nama Poli:</label>
                    <select class="form-select" name="data_poli">

                        @foreach ($poli as $key => $val )
                            <option value="{{ $val->id }}">{{ $val->nama_poli }}</option>
                        @endforeach
                    
                    </select>
                    
                
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Simpan</button>

            </form>
            <button type="button" class="btn btn-link text-gray text-gradient px-4 mb-0 mt-2 close-modal" onClick="closeModal()" data-dismiss="modal">Close</button>
            
        </div>
        </div>
    </div>
</div>
