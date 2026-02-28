<div class="modal fade" id="modalApprove" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('approvalruangan.approval', $peminjamanRuangan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Approval</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Yakin ingin menyetujui peminjaman ini?
                </div>

                <input type="hidden" name="status_peminjaman" value="1">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Approve</button>
                </div>

            </form>
        </div>
    </div>
</div>