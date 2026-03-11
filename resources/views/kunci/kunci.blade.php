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
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <td>No.</td>
                        <th>Code Peminjaman</th>
                        <th>Nama Penanggung Jawab</th>
                        <th>Ruangan</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($peminjamanRuangan as $index =>$peminjaman)
                    <tr class="kunci">
                        <td style="text-align: center;">{{ $peminjamanRuangan->firstItem() + $index }}.</td>
                        <td>{{ $peminjaman->code_peminjaman }}</td>
                        <td>{{ $peminjaman->nama_penanggung_jawab }}</td>
                        <td>{{ $peminjaman->ruangan->nama_ruangan }}</td>
                        <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                        <td>{{ $peminjaman->jam_mulai}}</td>
                        <td>{{ $peminjaman->jam_selesai }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{route('kunci.detail', $peminjaman->id)}}">
                                    <button class="btn btn-success btn-sm">
                                        <i class="bi bi-justify"></i> Detail
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
              <p id="notFound" style="display:none; text-align: center; font-size: 20px; color: red; ">Oops! Data Tidak Ditemukan!</p>
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
