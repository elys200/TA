@extends('layouts.app')
@section('content')
@php
use Carbon\Carbon;
@endphp


<div class="container-fluid">
    <h3 class="mb-4">Detail Peminjaman Ruangan</h3>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form>
                <fieldset disabled>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Code Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->code_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ruangan</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->ruangan->nama_ruangan }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Penanggung Jawab</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->nama_penanggung_jawab }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">NIM</label>
                            <input type="text" class="form-control" placeholder="{{ $PeminjamanRuangan->nim }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ormawa</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->ormawa->nama_ormawa }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->tanggal_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jam Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->jam_mulai }} WIB">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jam Pengembalian</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->jam_selesai }} WIB">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Alasan Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $PeminjamanRuangan->alasan_peminjaman }}">
                        </div>

                    </div>
                </fieldset>
            </form>

            <hr class="my-5">


            <div class="row text-center justify-content-center mt-2">
                <div class="col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Approve PIC</p>
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        @if($PeminjamanRuangan->status_peminjaman == '0')
                        <button type="button" class="btn btn-warning" disabled>Waiting Reviewer</button>
                        @elseif($PeminjamanRuangan->status_peminjaman == '1')
                        <div class="d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-success btn-lg mb-2" disabled>
                                Approved
                            </button>
                            <p class="mb-0 mt-3">
                                {{ $PeminjamanRuangan->approver?->nama_lengkap }}
                            </p>
                        </div>
                        @elseif($PeminjamanRuangan->status_peminjaman == '2')
                        <div class="d-flex flex-column align-items-center gap-2 mb-4">
                            <button type="button" class="btn btn-danger btn-lg" disabled>
                                Rejected
                            </button>

                            <p class="mb-0"> {{ $PeminjamanRuangan->rejector?->nama_lengkap}}
                        </div>
                        @endif
                    </div>

                </div>
                <div class="col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Pemberian Kunci</p>
                    @if(is_null($PeminjamanRuangan->given_by) &&
                    Carbon::parse($PeminjamanRuangan->tanggal_peminjaman)->toDateString() == now()->toDateString())

                    {{-- Bisa upload --}}
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                            data-bs-target="#modalPemberianKunci">
                            Upload Bukti
                        </button>
                    </div>

                    @elseif(!is_null($PeminjamanRuangan->given_by))

                    {{-- Sudah upload --}}
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPemberian">
                        <p class="mb-0 text-center">Lihat Bukti Pemberian Kunci</p>
                    </a>
                    <p class="mb-0 mt-3">{{ $PeminjamanRuangan->given?->nama_lengkap }}</p>
                    <p class="mb-0">{{ $PeminjamanRuangan->time_given }}</p>

                    @else

                    {{-- Belum waktunya --}}
                    <p class="text-center text-muted">Belum bisa upload bukti</p>

                    @endif
                </div>

                {{-- PENGEMBALIAN KUNCI --}}
                <div class="col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Pengembalian Kunci</p>

                    @if(!is_null($PeminjamanRuangan->given_by)
                    && is_null($PeminjamanRuangan->returned_by)
                    && \Carbon\Carbon::parse($PeminjamanRuangan->tanggal_peminjaman)->isToday())
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                            data-bs-target="#modalPengembalianKunci">
                            Upload Bukti
                        </button>
                    </div>
                    @elseif(!is_null($PeminjamanRuangan->returned_by))
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPengembalian">
                        <p class="mb-0 text-center">Lihat Bukti Pengembalian Kunci</p>
                    </a>
                    <p class="mb-0 mt-3"> {{ $PeminjamanRuangan->returned?->nama_lengkap}}
                        <p class="mb-0">{{ $PeminjamanRuangan->time_returned }}</p>
                        @endif
                </div>
            </div>


        </div>
    </div>
</div>

<!-- JS -->
@include('kunci.modal.pemberiankunci')
@include('kunci.modal.pengembaliankunci')
@include('kunci.modal.tampilanbuktipemberian')
@include('kunci.modal.tampilanbuktipengembalian')

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
