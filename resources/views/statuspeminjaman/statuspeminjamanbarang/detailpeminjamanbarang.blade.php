@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Detail Peminjaman Barang</h3>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form>
                <fieldset disabled>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kode Peminjaman</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjaman->code_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Pengaju</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjaman->user->nama_lengkap }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">No Tlp Pengaju</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjaman->user->no_tlp }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Alasan Peminjaman</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjaman->alasan_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Peminjaman</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjaman->tanggal_mulai_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Pengembalian</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjaman->tanggal_selesai_peminjaman }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Penanggung Jawab</label>
                            <input type="text" class="form-control"
                                placeholder="{{ $peminjaman->nama_penanggung_jawab }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">NIM</label>
                            <input type="text" class="form-control" placeholder="{{ $peminjaman->nim }}">
                        </div>
                    </div>
                </fieldset>
            </form>



            <div class="row align-items-center py-3 border rounded-3 mb-4" style="margin-top: 20px;">
                <div class="col-md-6 d-flex align-items-center gap-3">
                    <img src="{{ asset('storage/' . $peminjaman->barang->foto_barang) }}" class="rounded"
                        style="width:90px;height:90px;object-fit:cover;border:1px solid #e5e7eb;">

                    <div>
                        <div class="fw-semibold">{{ $peminjaman->barang->nama_barang }}</div>
                    </div>
                </div>

                <div class="col-md-6 text-md-end text-center">
                    <span class="badge bg-secondary fs-6 px-3 py-2">
                        Jumlah : {{ $peminjaman->jumlah_barang }}
                    </span>
                </div>
            </div>
        </div>

        <div class="row text-center justify-content-center mt-2 mb-4">

            <!-- APPROVE PIC -->
            <div class="col-12 col-md-4 mb-4 mt-3">
                <p class="fw-semibold mb-3">Approve PIC</p>

                @if($peminjaman->status_peminjaman == '0')
                <button type="button" class="btn btn-warning" style="pointer-events: none;">
                    Waiting Reviewer
                </button>

                @elseif($peminjaman->status_peminjaman == '1')
                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                        <button type="button" class="btn btn-success btn-lg" disabled>Approved</button>
                        <p class="mb-0 mt-3"> {{ $peminjaman->approver?->nama_lengkap}}
                </div>

                @elseif($peminjaman->status_peminjaman == '2')
                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                        <button type="button" class="btn btn-danger btn-lg" disabled>
                            Rejected
                        </button>

                        <a href="#" class="text-danger text-decoration-underline" data-bs-toggle="modal"
                            data-bs-target="#ModalReasonRejected">
                            Lihat Alasan Penolakan
                        </a>
                        <p class="mb-0"> {{ $peminjaman->rejector?->nama_lengkap}}
                    </div>
                @endif
            </div>

            <!-- PEMBERIAN BARANG -->
            <div class="col-12 col-md-4 mb-4 mt-3">
                <p class="fw-semibold mb-3">Pemberian Barang</p>


                @if(is_null($peminjaman->given_by))
                <button type="button" class="btn btn-warning">
                    Waiting Approval
                </button>
                @else
                <a href="#" data-bs-toggle="modal" data-bs-target="#TampilkanBuktiPemberian" class="d-block mb-2">
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

            <!-- PENGEMBALIAN BARANG -->
            <div class="col-12 col-md-4 mb-4 mt-3">
                <p class="fw-semibold mb-3">Pengembalian Barang</p>

                @if(!is_null($peminjaman->given_by) && is_null($peminjaman->returned_by))
                <button type="button" class="btn btn-outline-secondary">
                    Waiting
                </button>

                @elseif(!is_null($peminjaman->returned_by))
                <a href="#" data-bs-toggle="modal" data-bs-target="#TampilanBuktiPengembalian" class="d-block mt-2">
                    <p class="mb-0 text-center">Lihat Bukti Pengembalian Kunci</p>
                </a>

                <p class="mb-0 mt-3"> {{ $peminjaman->returned?->nama_lengkap}}</p>
                <p class="mb-0">{{ $peminjaman->time_returned }} </p>
                @endif

            </div>
        </div>


    </div>
</div>
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
