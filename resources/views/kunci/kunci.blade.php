@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <h3> Kunci</h3>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-body d-flex align-items-center"
                        style="background-color: blue; border-radius: 10px; height: 130px;">
                        <div class="me-3">
                            <i class="bi bi-check2-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>Peminjaman Approve</b></span>
                            <h4 id="counterReviewing" class="mb-0" style="color: white;">{{ $totalApproved }}</h4>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body d-flex align-items-center"
                        style="background-color: #6EC207; border-radius: 10px; height: 130px;">
                        <div class="me-3">
                            <i class="bi bi-arrow-up-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>Pemberian</b></span>
                            <h4 id="counterReviewing" class="mb-0" style="color: white;">{{  $totalGiven }}</h4>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body d-flex align-items-center"
                        style="background-color: #7367f0; border-radius: 10px; height: 130px;">
                        <div class="me-3">
                            <i class="bi bi-arrow-down-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>Pengembalian</b></span>
                            <h4 id="counterApprove" class="mb-0" style="color: white;">{{ $totalReturn }}</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 mt-5">
            <div class="col-12 col-sm-8 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Data Ruangan...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle" style="border-collapse: collapse;">
                <thead>
                    <tr style="background:#f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">No.</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Code Peminjaman</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Nama Penanggung Jawab</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Ruangan</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Tanggal</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Jam Mulai</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Jam Selesai</th>
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamanRuangan as $index => $peminjaman)
                    <tr class="kunci" style="border-bottom: 1px solid #f0f0f0;">
                        <td class="px-3 py-3 text-center text-muted">{{ $peminjamanRuangan->firstItem() + $index }}.</td>
                        <td class="px-3 py-3"><span class="fw-medium">{{ $peminjaman->code_peminjaman }}</span></td>
                        <td class="px-3 py-3">{{ $peminjaman->nama_penanggung_jawab }}</td>
                        <td class="px-3 py-3">{{ $peminjaman->ruangan->nama_ruangan }}</td>
                        <td class="px-3 py-3 text-muted">{{ $peminjaman->tanggal_peminjaman }}</td>
                        <td class="px-3 py-3 text-muted">{{ $peminjaman->jam_mulai }}</td>
                        <td class="px-3 py-3 text-muted">{{ $peminjaman->jam_selesai }}</td>
                        <td class="px-3 py-3 text-center">
                            <a href="{{route('kunci.detail', $peminjaman->id)}}"
                                class="btn btn-sm d-inline-flex align-items-center gap-1"
                                style="background:#3b82f6; color:#fff; border-radius:8px;">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p id="notFound" style="display:none; text-align:center; font-size:20px; color:red;">Oops! Data Tidak Ditemukan!</p>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted small">
                    Menampilkan {{ $peminjamanRuangan->lastItem() }} dari {{ $peminjamanRuangan->total() }} data
                </div>
                <div>
                    {{ $peminjamanRuangan->links() }}
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("keyup", function () {

            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll(".kunci");
            let ditemukan = false;

            rows.forEach(function (row) {

                const textRow = row.textContent.toLowerCase();

                if (textRow.includes(keyword)) {
                    row.style.display = "table-row";
                    ditemukan = true;
                } else {
                    row.style.display = "none";
                }

            });

            if(!ditemukan){
            document.getElementById("notFound").style.display = "block";
        } else {
            document.getElementById("notFound").style.display = "none";
        }

        });

    });

</script>
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
