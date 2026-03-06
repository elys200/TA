@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h3 class="mb-4">Detail Peminjaman Ruangan</h3>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form class="{{ route('approvalruangan.detail', $peminjamanRuangan->id) }}" method="POST">
                <fieldset disabled>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Code Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->code_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ruangan</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->ruangan->nama_ruangan }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Penanggung Jawab</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->nama_penanggung_jawab }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">NIM</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjamanRuangan->nim }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ormawa</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->ormawa->nama_ormawa }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->tanggal_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jam Peminjaman</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjamanRuangan->jam_mulai}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jam Pengembalian</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjamanRuangan->jam_selesai }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Alasan Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->alasan_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Pengaju</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjamanRuangan->user->nama_lengkap }}">
                        </div>

                    </div>
                </fieldset>
            </form>

            <hr class="my-5">


            <div class="row text-center justify-content-center mt-2">

                <div class="col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Approve PIC</p>
                    @if($peminjamanRuangan->status_peminjaman == '0')
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                            data-bs-target="#modalApprove">Approved</button>
                        <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                            data-bs-target="#modalReject">Rejected</button>
                    </div>

                    @elseif($peminjamanRuangan->status_peminjaman == '1')
                    <div class="d-flex flex-column align-items-center gap-2 mb-4">
                        <button type="button" class="btn btn-success btn-lg" disabled>Approved</button>
                        <p class="mb-0 mt-3"> {{ $peminjamanRuangan->approver?->nama_lengkap}}
                    </div>
                    @elseif($peminjamanRuangan->status_peminjaman == '2')
                    <div class="d-flex flex-column align-items-center gap-2 mb-4">
                        <button type="button" class="btn btn-danger btn-lg" disabled>
                            Rejected
                        </button>

                        <a href="#" class="text-danger text-decoration-underline" data-bs-toggle="modal"
                            data-bs-target="#ModalReasonRejected">
                            Lihat Alasan Penolakan
                        </a>
                        <p class="mb-0"> {{ $peminjamanRuangan->rejector?->nama_lengkap}}
                    </div>

                    @endif


                    </p>
                </div>

                <div class="col-md-4 mb-4 mt-3 d-flex">
                    <div class="w-100">

                        <p class="fw-semibold mb-3">Pemberian Kunci</p>

                        @if(is_null($peminjamanRuangan->given_by))
                        <button type="button" class="btn btn-outline-secondary">
                            Waiting
                        </button>
                        @else
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPemberian"
                            class="d-block mb-2">
                            Lihat Bukti Pemberian Kunci
                        </a>

                        <p class="mb-1 mt-3">
                            {{ $peminjamanRuangan->given?->nama_lengkap }}
                        </p>

                        <p class="mb-0">
                            {{ $peminjamanRuangan->time_given }}
                        </p>
                        @endif

                    </div>
                </div>


                {{-- ================= PENGEMBALIAN KUNCI ================= --}}
                <div class="col-md-4 mb-4 mt-3 d-flex">
                    <div class="w-100">

                        <p class="fw-semibold mb-3">Pengembalian Kunci</p>

                        @if(!is_null($peminjamanRuangan->given_by) && is_null($peminjamanRuangan->returned_by))
                        <button type="button" class="btn btn-outline-secondary">
                            Waiting
                        </button>

                        @elseif(!is_null($peminjamanRuangan->returned_by))
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPengembalian"
                            class="d-block mt-2">
                            <p class="mb-0 text-center">Lihat Bukti Pengembalian Kunci</p>
                        </a>

                        <p class="mb-0 mt-3"> {{ $peminjamanRuangan->returned?->nama_lengkap}}</p>
                        <p class="mb-0">{{ $peminjamanRuangan->time_returned }} </p>
                        @endif

                    </div>

                </div>


            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @include('approval.modal.modalapprove')
    @include('approval.modal.modalrejected')
    @include('approval.modal.modalalasanrejected')
    @include('approval.modal.tampilanbuktipemberian')
    @include('approval.modal.tampilanbuktipengembalian')
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
