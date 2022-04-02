<div class="modal bs-example-modal-xl fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="menu_title">Tambah Data Admin</h6>
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

                <form method="POST" action="{{ route('menu.admin.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan nama admin..." value="{{ old('username') }}" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="nama_admin" class="col-form-label">Nama Admin:</label>
                            <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukan nama admin..." value="{{ old('nama_admin') }}" required>
                        </div>

                        <div class="col-lg-4">
                            <label for="email" class="col-form-label">Email Admin:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email..." value="{{ old('email') }}" required>
                        </div>
                    </div>
                    
                
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Simpan</button>

            </form>
            <button type="button" class="btn btn-link text-gray text-gradient px-4 mb-0 mt-2 close-modal" onClick="closeModal()" data-dismiss="modal">Close</button>
            
        </div>
        </div>
    </div>
</div>
