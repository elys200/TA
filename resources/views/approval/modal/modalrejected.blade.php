<div class="modal fade" id="modalReject" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('approvalruangan.approval', $peminjamanRuangan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Reject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Yakin ingin menolak peminjaman ini?
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