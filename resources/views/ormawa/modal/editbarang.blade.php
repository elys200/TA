<div class="modal fade" id="modalEditBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form enctype="multipart/form-data" id="editBarangForm"
                    {{-- action="{{ route('ormawa.barang.update', ['id' => $barang->ormawa_id, 'barangId' => $barang->id]) }}"  --}}
                    method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control"  name="nama_barang" id="editNamaBarang">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" class="form-control"  name="kode_barang" id="editKodeBarang">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Deskripsi Barang</label>
                        <input type="text" class="form-control" 
                            name="deskripsi_barang" id="editDeskripsiBarang">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control"  name="jumlah_barang" id="editJumlahBarang">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kondisi Barang</label>
                        <select class="form-select" name="kondisi_barang" id="editKondisiBarang">
                            <option value="" disabled>
                                    -- Pilih Kondisi Barang --
                                </option>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status Barang</label>
                        <select class="form-select" name="status_barang" id="editStatusBarang">
                                <option value="" disabled>
                                        -- Pilih Status Barang --
                                    </option>
                            <option value="0">Tersedia</option>
                            <option value="1">Dipinjam</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Foto Barang</label>
                        
                            <div id="previewFoto" class="mb-2">
                                {{-- <img src="{{ asset('storage/' . $barang->foto_barang) }}" alt="Foto Barang" class="img-thumbnail" style="width: 200px; height: auto;"> --}}
                            </div>
                        
                        <input class="form-control" type="file" name="foto_barang">
                        <small class="text-muted">
                            Format JPG/PNG, max 2MB
                        </small>
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
