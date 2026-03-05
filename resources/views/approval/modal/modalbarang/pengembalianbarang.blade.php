<div class="modal fade" id="modalPengembalianBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Konfirmasi Pemberian Kunci</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form action="{{ route('approvalbarang.return', $peminjaman->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="formFile" class="form-label fw-bold">Foto Pengembalian</label>
                        <input class="form-control" type="file" id="formFile" name="foto_pengembalian" required>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label fw-bold">Password Akun</label>
                        <input type="password" class="form-control" id="" placeholder="Masukkan Sandi Akun Anda" name="password" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Save
                        </button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
