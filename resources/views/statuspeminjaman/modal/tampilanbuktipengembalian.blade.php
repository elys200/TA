<div class="modal fade" id="TampilanBuktiPengembalian" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Bukti Pengembalian Kunci</h4>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $peminjaman->foto_pengembalian) }}"
                    class="img-fluid rounded mx-auto d-block" style="max-height:400px; margin-bottom: 10px;" alt="Bukti Pemberian">
            </div>
        </div>
    </div>
</div>
