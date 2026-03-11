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
                        class="btn btn-primary d-flex align-items-center justify-content-center gap-2 px-3">
                       <i class="bi bi-archive mb-0 lh-1"></i> Barang
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{ route('statuspeminjamanruangan') }}"
                        class="btn btn-outline-secondary d-flex align-items-center justify-content-center  gap-2 px-3">
                        <i class="bi bi-door-open mb-0 lh-1"></i> 
                        <span>Ruangan</span>
                    </a>
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
                            <a class="dropdown-item" href="{{ route('statuspeminjamanbarang') }}">
                                Semua
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanbarang', ['status' => 1]) }}">
                                Approve
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanbarang', ['status' => 2]) }}">
                                Rejected
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('statuspeminjamanbarang', ['status' => 0]) }}">
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
                            <th>No.</th>
                            <th>Code</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Penanggung Jawab</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Status Peminjaman</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach($peminjaman as $index =>$item)
                            <tr class="peminjamanbarang-item">
                            <td style="text-align: center;">{{ $peminjaman->firstItem() + $index}}.</td>
                            <td>{{ $item->code_peminjaman }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td style="text-align: center;">{{ $item->jumlah_barang }}</td>
                            <td>{{ $item->nama_penanggung_jawab }}</td>
                            <td>
                                {{ $item->tanggal_mulai_peminjaman }}
                            </td>
                            <td class="text-center">
                                @if ($item->status_peminjaman == '0')
                                <span class="badge bg-warning">Waiting Review</span>
                                @elseif ($item->status_peminjaman == '1')
                                <span class="badge bg-success">Approve</span>
                                @elseif ($item->status_peminjaman == '2')
                                <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    @if($item->status_peminjaman == '1' || $item->status_peminjaman
                                    == '2')
                                    {{-- Detail --}}
                                    <a href="{{ route('statuspeminjamanbarang.detail', $item->id) }}"
                                        class="btn btn-success">
                                        <i class="bi bi-justify"></i>
                                    </a>

                                    @elseif($item->status_peminjaman == '0')

                                    {{-- Edit --}}
                                    <a href="{{ route('statuspeminjamanbarang.edit', $item->id) }}"
                                        class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('statuspeminjaman.deletepeminjamanbarang' , $item->id) }}"
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
</div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("keyup", function () {

            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll(".peminjamanbarang-item");
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
