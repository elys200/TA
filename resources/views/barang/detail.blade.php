@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="bg-white p-4 rounded-3 shadow-sm">

        <div class="row g-4 align-items-start flex-column-reverse flex-lg-row">

            {{-- FOTO --}}
            <div class="col-12 col-lg-5">
                <div style="border-radius:12px; overflow:hidden; border:1px solid #e5e7eb;">
                    <img src="{{ asset('uploads/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}"
                        style="width:100%; max-height:380px; object-fit:cover;">
                </div>
            </div>

            {{-- DETAIL --}}
            <div class="col-12 col-lg-7">

                <div class="d-flex align-items-center gap-2 mb-1">
                    @if($barang->jumlah_barang > 0)
                    <span class="badge bg-success">Available</span>
                    @else
                    <span class="badge bg-danger">Habis</span>
                    @endif
                    <span class="badge bg-primary">Stok: {{ $barang->jumlah_barang }}</span>
                </div>

                <h3 class="fw-bold mb-3">{{ $barang->nama_barang }}</h3>

                <hr class="my-3">

                <table class="table table-borderless" style="font-size:15px;">
                    <tbody>
                        <tr>
                            <th style="width:150px; font-weight:600; color:#555;">Ormawa Pemilik</th>
                            <td>: {{ $barang->ormawa->nama_ormawa }}</td>
                        </tr>
                        <tr>
                            <th style="font-weight:600; color:#555;">Kondisi</th>
                            <td>:
                                @if($barang->kondisi_barang == 'baik')
                                <span class="badge bg-success">Bagus</span>
                                @else
                                <span class="badge bg-danger">Rusak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="font-weight:600; color:#555;">Deskripsi</th>
                            <td>: {{ $barang->deskripsi_barang ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-grid mt-3">
                    @if($barang->jumlah_barang == 0)
                    <button class="btn btn-primary" disabled>Ajukan Peminjaman</button>
                    @else
                    <a href="{{ route('barang.form', $barang->id) }}" class="btn btn-primary">
                        <i class="bi bi-box-arrow-right me-1"></i> Ajukan Peminjaman
                    </a>
                    @endif
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
