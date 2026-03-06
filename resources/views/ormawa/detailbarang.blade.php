@extends('layouts.app')
@section('content')

<div class="container-fluid py-1">

    <!-- CARD DETAIL -->
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div class="row align-items-center">

            <!-- GAMBAR -->
            <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                <div class="image-wrapper">
                    <img src="{{ asset('storage/'.$barang->foto_barang) }}" class="img-fluid shadow-sm"
                        style="object-fit:cover; max-height:350px;">
                </div>
            </div>

            <!-- TABEL DETAIL -->
            <div class="col-12 col-lg-7">
                <h5 class="fw-bold mb-3">Detail Barang</h5>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th width="35%">Nama Barang</th>
                                <td width="5%">:</td>
                                <td>{{ $barang->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kode Barang</th>
                                <td>:</td>
                                <td>{{ $barang->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Barang</th>
                                <td>:</td>
                                <td>{{ $barang->jumlah_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Barang</th>
                                <td>:</td>
                                <td>{{ $barang->kondisi_barang }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi Barang</th>
                                <td>:</td>
                                <td>{{ $barang->deskripsi_barang }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- TIMELINE CARD -->
    <div class="card mt-4 shadow-sm" style="border-radius:12px;">
        <div class="card-header bg-white">
            <h5 class="fw-semibold text-primary mb-0">
                <i class="bi bi-journal-text me-1"></i> Riwayat Peminjaman
            </h5>
        </div>

        <div class="card-body">
            <div class="position-relative ps-4">

                <!-- Garis -->
                <div class="position-absolute" style="left:8px; top:0; bottom:0; width:2px; background:#e5e7eb;">
                </div>

                <!-- Item 1 -->
                <div class="mb-4 position-relative">
                    <div
                        style="position:absolute; left:-1px; top:5px; width:14px; height:14px; border-radius:50%; background:#fff; border:3px solid #facc15;">
                    </div>
                    <div class="ps-4">
                        <div class="fw-semibold text-warning">Borrowed</div>
                        <div class="small">21 Feb 2025</div>
                        <div class="small text-muted">By: Yudha P.</div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="mb-4 position-relative">
                    <div
                        style="position:absolute; left:-1px; top:5px; width:14px; height:14px; border-radius:50%; background:#fff; border:3px solid #6366f1;">
                    </div>
                    <div class="ps-4">
                        <div class="fw-semibold text-primary">Returned</div>
                        <div class="small">20 Aug 2024</div>
                        <div class="small text-muted">By: Yudha P.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


@endsection
@push('scripts')
<script>
    document.querySelectorAll('.faq-item').forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });

</script>
@endpush
