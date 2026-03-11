@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h3 class="mb-4">Status Peminjaman</h3>

    <!-- CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <!-- TOP ACTION -->
            <div class="row align-items-center g-2 mb-4">
                <div class="col-auto">
                    <a href="{{ route('statuspeminjamanbarang') }}"
                        class="btn btn-outline-secondary d-flex align-items-center gap-2 px-3">
                        <i class="bi bi-archive"></i> Barang
                    </a>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary d-flex align-items-center gap-2 px-3">
                        <i class="bi bi-door-open"></i> Ruangan
                    </button>
                </div>
                <div class="col-md-4 ms-auto">
                    <input type="text" class="form-control" id="searchInput" placeholder="Cari data...">
                </div>
            </div>

            <!-- FILTER -->
            <div class="d-flex flex-wrap align-items-center gap-3 p-3 border rounded mb-4">
                <i class="bi bi-filter fs-5 text-muted"></i>

                <div class="btn-group">
                    <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        @if(request('status') == 1)
                        Approve
                        @elseif(request('status') == 2)
                        Rejected
                        @elseif(request('status') == 0)
                        Reviewing
                        @else
                        Semua Status
                        @endif
                    </button>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanruangan') }}">
                                Semua
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanruangan', ['status' => 1]) }}">
                                Approve
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanruangan', ['status' => 2]) }}">
                                Rejected
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanruangan', ['status' => 0]) }}">
                                Reviewing
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode peminjaman</th>
                            <th>Ruangan</th>
                            <th>Penanggung Jawab</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Status</th>
                            <th width="160">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($peminjamanRuangan as $index => $peminjaman)
                        <tr class="peminjamanruangan-item">
                            <td class="text-center">{{ $peminjamanRuangan->firstItem() + $index }}.</td>
                            <td>{{ $peminjaman->code_peminjaman }}</td>
                            <td>{{ $peminjaman->ruangan->nama_ruangan }}</td>
                            <td>{{ $peminjaman->nama_penanggung_jawab }}</td>
                            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                            <td class="text-center">
                                @if ($peminjaman->status_peminjaman == '0')
                                <span class="badge bg-warning">Waiting Review</span>
                                @elseif ($peminjaman->status_peminjaman == '1')
                                <span class="badge bg-success">Approve</span>
                                @elseif ($peminjaman->status_peminjaman == '2')
                                <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    @if($peminjaman->status_peminjaman == '1' || $peminjaman->status_peminjaman == '2')
                                    {{-- Detail --}}
                                    <a href="{{ route('statuspeminjamanruangan.detailpeminjaman', $peminjaman->id) }}"
                                        class="btn btn-success">
                                        <i class="bi bi-justify"></i>
                                    </a>

                                    @elseif($peminjaman->status_peminjaman == '0')

                                    {{-- Edit --}}
                                    <a href="{{ route('statuspeminjamanruangan.editpeminjaman', $peminjaman->id) }}"
                                        class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('statuspeminjamanruangan.deletepeminjaman', $peminjaman->id) }}"
                                        method="POST" onsubmit="return confirm('Yakin mau menghapus peminjaman ini?')"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p id="notFound" style="display:none; text-align: center; font-size: 20px; color: red; ">Oops!
                            Data Tidak Ditemukan!</p>
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
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("keyup", function () {

            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll(".peminjamanruangan-item");
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
