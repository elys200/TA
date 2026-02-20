<!-- Modal Tambah Barang -->
<div class="modal fade" id="modalTambahBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form action="{{ route('ormawa.barang.store', $ormawa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" placeholder="Masukkan kode barang" name="kode_barang" value="{{ old('kode_barang') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Deskripsi Barang</label>
                            <input type="text" class="form-control" placeholder="Masukkan deskripsi barang" name="deskripsi_barang" value="{{ old('deskripsi_barang') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" placeholder="Jumlah barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kondisi Barang</label>
                            <select class="form-select" name="kondisi_barang" required>
                                <option value="baik" {{ old('kondisi_barang') == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak" {{ old('kondisi_barang') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status Barang</label>
                            <select class="form-select" name="status_barang" required>
                                <option value="0" {{ old('status_barang') == '0' ? 'selected' : '' }}>Tersedia</option>
                                <option value="1" {{ old('status_barang') == '1' ? 'selected' : '' }}>Dipinjam</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Foto Barang</label>
                            <input class="form-control" type="file" name="foto_barang" accept="image/*">
                            <small class="text-muted">Format JPG/PNG, max 2MB</small>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
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