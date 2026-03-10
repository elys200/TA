<div class="modal fade" id="modalTampilkanBuktiPemberian{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="modalLabel{{ $item->id }}">
                    Bukti Pemberian Barang
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">

                <img src="{{ asset('storage/' . $item->foto_pemberian) }}"
                    class="img-fluid rounded"
                    style="max-height:400px; margin-bottom:15px;"
                    alt="Bukti Pemberian">

                <table class="table table-borderless" style="margin-top: 10px;">
                    <tr>
                        <th width="40%">Diberikan Oleh</th>
                        <td>{{ $item->given?->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal dan Waktu Pemberian</th>
                        <td>{{ $item->waktu_pemberian }}</td>
                    </tr>
                </table>

            </div>

        </div>
    </div>

</div>