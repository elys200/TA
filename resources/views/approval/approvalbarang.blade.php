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
                    <div class="card-body d-flex align-items-center"
                        style="background-color: #3A9AFF; border-radius: 10px; height: 130px;">
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
                    <div class="card-body d-flex align-items-center"
                        style="background-color: #7367f0; border-radius: 10px; height: 130px;">
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
                    <div class="card-body d-flex align-items-center"
                        style="background-color: #6EC207; border-radius: 10px; height: 130px;">
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
                    <div class="card-body d-flex align-items-center"
                        style="background-color: #FF0000; border-radius: 10px; height: 130px;">
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
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Peminjaman...">
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
                    @foreach ($peminjaman as $item)

                    <tr class="data-row status-{{ $item->status_peminjaman }}">

                        <td class="text-center">{{ $loop->iteration }}</td>

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

            <div class="mt-3">
                {{ $peminjaman->links() }}
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
            const rows = document.querySelectorAll(".data-row");

            rows.forEach(function (row) {

                const textRow = row.textContent.toLowerCase();

                if (textRow.includes(keyword)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }

            });

        });

    });

</script>

@endsection
