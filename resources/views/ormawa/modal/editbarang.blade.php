<div class="modal fade" id="modalEditBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama barang">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" placeholder="Jumlah barang">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3"
                                  placeholder="Deskripsi singkat barang"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Gambar</label>
                        <input class="form-control" type="file">
                        <small class="text-muted">
                            Format JPG/PNG, max 2MB
                        </small>
                    </div>

                </form>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Save
                </button>
                <button type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>
            </div>

        </div>
    </div>
</div>
