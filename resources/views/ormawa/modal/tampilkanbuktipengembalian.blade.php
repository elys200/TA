<div class="modal fade" id="modalTampilkanBuktiPengembalian" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title w-100 text-center">Bukti Pengembalian Barang</h1>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $item->foto_pengembalian) }}"
                    class="img-fluid rounded mx-auto d-block" style="max-height:400px; margin-bottom: 10px;" alt="Bukti Pemberian">
                <table>
                    <thead>
                    <th>Diberikan Oleh:</th>
                    <th>Tanggal dan Waktu Pemberian:</th>
                    </thead>
                    <tbody>
                        <td>{{ $item->return?->nama_lengkap }}</td>
                        <td>{{ $item->waktu_pengembalian }}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
