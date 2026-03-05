<div class="modal fade" id="modalReject" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('approvalbarang.rejected', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" style="margin-left: 170px; color: red;">Konfirmasi Reject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Masukkan Password Akun</label>
                        <input type="password" class="form-control" id="" name="password" required>
                        <div id="" class="form-text" ></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alasan Penolakan</label>
                        <input type="text" class="form-control" id="" name="rejected_reason" required>
                        <div id="" class="form-text" ></div>
                    </div>
                </div>

                <input type="hidden" name="status_peminjaman" value="2">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Reject</button>
                </div>

            </form>
        </div>
    </div>
</div>
