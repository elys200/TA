<div class="modal fade" id="modalTampilkanBuktiPengembalian{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalLabelPengembalian{{ $item->id }}" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="modalLabelPengembalian{{ $item->id }}">
                    Bukti Pengembalian Barang
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">

                <img src="{{ asset('storage/' . $item->foto_pengembalian) }}"
                    class="img-fluid rounded"
                    style="max-height:400px; margin-bottom:15px;"
                    alt="Bukti Pengembalian">

                <table class="table table-borderless" style="margin-top: 10px;">
                    <tr>
                        <th width="40%">Dikembalikan Oleh</th>
                        <td>{{ $item->returned?->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal dan Waktu Pengembalian</th>
                        <td>{{ $item->waktu_pengembalian }}</td>
                    </tr>
                </table>

            </div>

        </div>
    </div>

</div>
