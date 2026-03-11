@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <h3> List Pemborangan Barang</h3>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">

        <!-- CARD STATUS -->
        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <div id="btnAll" class="card-body d-flex align-items-center"
                        style="background-color: #3A9AFF; border-radius: 10px; height: 130px; cursor:pointer;">
                        <div class="me-3">
                            <i class="bi bi-justify" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div>
                            <span style="color: white; font-size: 25px;"><b>All</b></span>
                            <h4 class="mb-0" style="color: white;">{{$totalSeluruh}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div id="btnReview" class="card-body d-flex align-items-center"
                        style="background-color: #7367f0; border-radius: 10px; height: 130px; cursor:pointer;">
                        <div class="me-3">
                            <i class="bi bi-bell" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div>
                            <span style="color: white; font-size: 25px;"><b>Reviewing</b></span>
                            <h4 class="mb-0" style="color: white;">{{$totalReview}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div id="btnApprove" class="card-body d-flex align-items-center"
                        style="background-color: #6EC207; border-radius: 10px; height: 130px; cursor:pointer;">
                        <div class="me-3">
                            <i class="bi bi-check2-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div>
                            <span style="color: white; font-size: 25px;"><b>Approve</b></span>
                            <h4 class="mb-0" style="color: white;">{{$totalApprove}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div id="btnRejected" class="card-body d-flex align-items-center"
                        style="background-color: #FF0000; border-radius: 10px; height: 130px; cursor:pointer;">
                        <div class="me-3">
                            <i class="bi bi-x-circle" style="font-size: 50px; color: white;"></i>
                        </div>
                        <div>
                            <span style="color: white; font-size: 25px;"><b>Rejected</b></span>
                            <h4 class="mb-0" style="color: white;">{{$totalRejected}}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- SEARCH -->
        <div class="row mb-4 mt-5">
            <div class="col-12 col-sm-8 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Data Peminjaman...">
            </div>
        </div>

        <!-- TABEL -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">

                <thead class="table-light text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode Peminjaman</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Penanggung Jawab</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($peminjaman as $index =>$item)

                    <tr class="approvebarang data-row status-{{$item->status_peminjaman}}">

                        <td class="text-center">{{ $peminjaman->firstItem() + $index }}.</td>

                        <td>{{ $item->code_peminjaman }}</td>

                        <td>{{ $item->barang->nama_barang }}</td>

                        <td class="text-center">{{ $item->jumlah_barang }}</td>

                        <td>{{ $item->nama_penanggung_jawab }}</td>

                        <td>{{ $item->tanggal_mulai_peminjaman }}</td>

                        <td class="text-center">
                            @if($item->status_peminjaman == 0)
                            <span class="badge bg-warning text-dark">Reviewing</span>

                            @elseif($item->status_peminjaman == 1)
                            <span class="badge bg-success">Approve</span>

                            @elseif($item->status_peminjaman == 2)
                            <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>

                        <td class="text-center" style="width:100px;">
                            <a href="{{ route('approvalbarang.detail' , $item->id) }}" class="btn btn-success btn-sm">
                                Detail
                            </a>
                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>
            <p id="notFound" style="display:none; text-align: center; font-size: 20px; color: red; ">Oops! Data Tidak Ditemukan!</p>
           <div class="d-flex justify-content-between align-items-center mt-3">
                    <div style="margin-top: 5px;">
                        Menampilkan {{ $peminjaman->lastItem() }}
                        dari {{ $peminjaman->total() }} data
                    </div>

                    <div>
                        {{ $peminjaman->links() }}
                    </div>

            </div>

        </div>

    </div>
</div>

<!-- SCRIPT SEARCH -->
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("keyup", function () {

            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll(".approvebarang");
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
