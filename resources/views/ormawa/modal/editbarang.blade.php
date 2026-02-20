<div class="modal fade" id="modalEditBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('ormawa.barang.update', ['id' => $barang->ormawa_id, 'barangId' => $barang->id]) }}" enctype="multipart/form-data"
                    method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" placeholder="Masukkan kode barang" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Deskripsi Barang</label>
                        <input type="text" class="form-control" placeholder="Masukkan deskripsi barang"
                            name="deskripsi_barang" value="{{ old('deskripsi_barang', $barang->deskripsi_barang) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" placeholder="Jumlah barang" name="jumlah_barang" value="{{ old('jumlah_barang', $barang->jumlah_barang) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kondisi Barang</label>
                        <select class="form-select" name="kondisi_barang">
                            <option value="" disabled {{ old('kondisi_barang', $barang->kondisi_barang ?? '') == '' ? 'selected' : '' }}>
                                    -- Pilih Kondisi Barang --
                                </option>
                            <option value="baik" {{ old('kondisi_barang', $barang->kondisi_barang) == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak" {{ old('kondisi_barang', $barang->kondisi_barang) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status Barang</label>
                        <select class="form-select" name="status_barang">
                                <option value="" disabled {{ old('status_barang', $barang->status_barang ?? '') == '' ? 'selected' : '' }}>
                                        -- Pilih Status Barang --
                                    </option>
                            <option value="0" {{ old('status_barang', $barang->status_barang) == 0 ? 'selected' : '' }}>Tersedia</option>
                            <option value="1" {{ old('status_barang', $barang->status_barang) == 1 ? 'selected' : '' }}>Dipinjam</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Foto Barang</label>
                        @if(!empty($barang->foto_barang))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $barang->foto_barang) }}" alt="Foto Barang" class="img-thumbnail" style="width: 200px; height: auto;">
                            </div>
                            @endif
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
