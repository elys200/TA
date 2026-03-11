@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3> List Peminjaman Ruangan</h3>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-body d-flex align-items-center" id="btnAll"
                        style="background-color: #3A9AFF; border-radius: 10px; height: 130px; cursor: pointer;">
                        <div class="me-3">
                            <i class="bi bi-justify" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>All</b></span>
                            <h4 id="counterReviewing" class="mb-0" style="color: white;">{{$totalSeluruh}}
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body d-flex align-items-center" id="btnReview"
                        style="background-color: #7367f0; border-radius: 10px; height: 130px; cursor: pointer;">
                        <div class="me-3">
                            <i class="bi bi-bell" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>Reviewing</b></span>
                            <h4 id="counterReviewing" class="mb-0" style="color: white;">{{ $totalReview }}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-body d-flex align-items-center" id="btnApprove"
                        style="background-color: #6EC207; border-radius: 10px; height: 130px; cursor: pointer;">
                        <div class="me-3">
                            <i class="bi bi-check2-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>Approve</b></span>
                            <h4 id="counterApprove" class="mb-0" style="color: white;">{{ $totalApprove }}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="margin-top: 10px;">
                    <div class="card-body d-flex align-items-center" id="btnRejected"
                        style="background-color: #FF0000; border-radius: 10px; height: 130px; cursor: pointer;">
                        <div class="me-3">
                            <i class="bi bi-x-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div style="margin-left: 5px;">
                            <span style="color: white; font-size: 25px;"><b>Rejected</b></span>
                            <h4 id="counterRejected" class="mb-0" style="color: white;">{{ $totalRejected }}
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 mt-3">
            <div class="col-12 col-sm-8 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Data Peminjaman...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode Peminjaman</th>
                        <th>Nama Ruangan</th>
                        <th>Penanggung Jawab</th>
                        <th>Nama Ormawa</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status Peminjaman</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($peminjamanRuangan as $index =>$peminjaman)
                    <tr class="data-row approveruangan status-{{$peminjaman->status_peminjaman}}">
                        <td style="text-align: center;">{{$peminjamanRuangan->firstItem() + $index}}.</td>
                        <td>{{$peminjaman->code_peminjaman}}</td>
                        <td>{{$peminjaman->ruangan->nama_ruangan}}</td>
                        <td>{{$peminjaman->nama_penanggung_jawab}}</td>
                        <td>{{$peminjaman->ormawa->singkatan}}</td>
                        <td>{{$peminjaman->tanggal_peminjaman}}</td>
                        <td class="text-center">
                            @if($peminjaman->status_peminjaman == 0)
                            <span class="badge bg-warning">Reviewing</span>
                            @elseif($peminjaman->status_peminjaman == 1)
                            <span class="badge bg-success">Approved</span>
                            @elseif($peminjaman->status_peminjaman == 2)
                            <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td class="text-center" style="width: 140px">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{route('approvalruangan.detail', $peminjaman->id)}}"
                                    class="btn btn-success btn-sm">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="notFound" style="display:none; text-align: center; font-size: 20px; color: red; ">Oops! Data Tidak
                Ditemukan!</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div style="margin-top: 5px;">
                    Menampilkan {{ $peminjamanRuangan->lastItem() }}
                    dari {{ $peminjamanRuangan->total() }} data
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
            const rows = document.querySelectorAll(".approveruangan");
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

            if (!ditemukan) {
                document.getElementById("notFound").style.display = "block";
            } else {
                document.getElementById("notFound").style.display = "none";
            }

        });

    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const rows = document.querySelectorAll(".data-row");

        function showRows(status) {
            rows.forEach(row => {
                if (status === "all") {
                    row.style.display = "";
                } else {
                    if (row.classList.contains("status-" + status)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        }

        document.getElementById("btnAll").addEventListener("click", function () {
            showRows("all");
        });

        document.getElementById("btnReview").addEventListener("click", function () {
            showRows("0");
        });

        document.getElementById("btnApprove").addEventListener("click", function () {
            showRows("1");
        });

        document.getElementById("btnRejected").addEventListener("click", function () {
            showRows("2");
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
