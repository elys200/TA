@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3 class="mb-4">Detail Peminjaman Ruangan</h3>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('statuspeminjamanruangan.detailpeminjaman', $peminjaman->id) }}" method="POST">
                <fieldset disabled>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kode Peminjaman</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->code_peminjaman }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ruangan</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->ruangan->nama_ruangan }}"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Penanggung Jawab</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->nama_penanggung_jawab }}"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">NIM</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->nim }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ormawa</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->ormawa->nama_ormawa }}"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Peminjaman</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->tanggal_peminjaman }}"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jam Peminjaman</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->jam_mulai }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jam Pengembalian</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->jam_selesai }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Alasan Peminjaman</label>
                            <input type="text" class="form-control" value="{{ $peminjaman->alasan_peminjaman }}"
                                readonly>
                        </div>

                    </div>
                </fieldset>
            </form>

            <hr class="my-5">



            <div class="row text-center justify-content-center mt-2">

                {{-- ================= APPROVE PIC ================= --}}
                <div class="col-md-4 mb-4 mt-3 d-flex">
                    <div class="w-100">

                        <p class="fw-semibold mb-3">Approve PIC</p>

                        @if($peminjaman->status_peminjaman == '0')
                        <button type="button" class="btn btn-warning">
                            Waiting Reviewer
                        </button>

                        @elseif($peminjaman->status_peminjaman == '1')
                        <button type="button" class="btn btn-success">
                            Approve
                        </button>

                        <p class="mb-0 mt-2">
                            {{ $peminjaman->approver?->nama_lengkap }}
                        </p>

                        @elseif($peminjaman->status_peminjaman == '2')
                        <button type="button" class="btn btn-danger mb-2" disabled>
                            Rejected
                        </button>

                        <a href="#" class="text-danger text-decoration-underline d-block mt-2" data-bs-toggle="modal"
                            data-bs-target="#ModalReasonRejected">
                            Lihat Alasan Penolakan
                        </a>

                        <p class="mb-0 mt-2">
                            {{ $peminjaman->approver?->nama_lengkap }}
                        </p>
                        @endif

                    </div>
                </div>


                {{-- ================= PEMBERIAN KUNCI ================= --}}
                <div class="col-md-4 mb-4 mt-3 d-flex">
                    <div class="w-100">

                        <p class="fw-semibold mb-3">Pemberian Kunci</p>

                        @if(is_null($peminjaman->given_by))
                        <button type="button" class="btn btn-outline-secondary">
                            Waiting
                        </button>
                        @else
                        <a href="#" data-bs-toggle="modal" data-bs-target="#TampilkanBuktiPemberian"
                            class="d-block mb-2">
                            Lihat Bukti Pemberian Kunci
                        </a>

                        <p class="mb-1 mt-3">
                            {{ $peminjaman->given?->nama_lengkap }}
                        </p>

                        <p class="mb-0">
                            {{ $peminjaman->time_given }}
                        </p>
                        @endif

                    </div>
                </div>


                {{-- ================= PENGEMBALIAN KUNCI ================= --}}
                <div class="col-md-4 mb-4 mt-3 d-flex">
                    <div class="w-100">

                        <p class="fw-semibold mb-3">Pengembalian Kunci</p>

                        @if(!is_null($peminjaman->given_by) && is_null($peminjaman->returned_by))
                        <button type="button" class="btn btn-outline-secondary">
                            Waiting
                        </button>

                        @elseif(!is_null($peminjaman->returned_by))
                        <a href="#" data-bs-toggle="modal" data-bs-target="#TampilanBuktiPengembalian"
                            class="d-block mt-2">
                            <p class="mb-0 text-center">Lihat Bukti Pengembalian Kunci</p>
                        </a>

                        <p class="mb-0 mt-3"> {{ $peminjaman->returned?->nama_lengkap}}</p>
                        <p class="mb-0">{{ $peminjaman->time_returned }} </p>
                        @endif



                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@include('statuspeminjaman.modal.modalalasanrejected')
@include('statuspeminjaman.modal.tampilanbuktipemberian')
@include('statuspeminjaman.modal.tampilanbuktipengembalian')

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
