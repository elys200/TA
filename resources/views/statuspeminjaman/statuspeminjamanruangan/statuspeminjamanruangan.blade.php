@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="bg-white p-4 rounded-3 shadow-sm">

        <div class="mb-3">
            <h4 class="fw-bold mb-0">Status Peminjaman Ruangan</h4>
            <p class="text-muted small mb-0">Pantau status pengajuan peminjaman ruangan</p>
        </div>

        <hr class="my-3">

        {{-- Tab Navigasi --}}
        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('statuspeminjamanbarang') }}"
                class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
                <i class="bi bi-archive"></i> Barang
            </a>
            <a href="{{ route('statuspeminjamanruangan') }}"
                class="btn btn-primary d-inline-flex align-items-center gap-2">
                <i class="bi bi-door-open"></i> Ruangan
            </a>
        </div>

        {{-- Search & Filter --}}
        <div class="d-flex flex-column flex-md-row align-items-md-center gap-2 mb-4">
            <div class="btn-group">
                <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-filter me-1"></i>
                    @if(request('status') == 1) Approve
                    @elseif(request('status') == 2) Rejected
                    @elseif(request('status') == 0) Reviewing
                    @else Semua Status
                    @endif
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('statuspeminjamanruangan') }}">Semua</a></li>
                    <li><a class="dropdown-item" href="{{ route('statuspeminjamanruangan', ['status' => 1]) }}">Approve</a></li>
                    <li><a class="dropdown-item" href="{{ route('statuspeminjamanruangan', ['status' => 2]) }}">Rejected</a></li>
                    <li><a class="dropdown-item" href="{{ route('statuspeminjamanruangan', ['status' => 0]) }}">Reviewing</a></li>
                </ul>
            </div>
            <div class="flex-grow-1">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari data...">
            </div>
        </div>

        {{-- Tabel --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle" style="border-collapse: collapse;">
                <thead>
                    <tr style="background:#f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">No</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Kode Peminjaman</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Ruangan</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Penanggung Jawab</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Tgl. Peminjaman</th>
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Status</th>
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamanRuangan as $index => $peminjaman)
                    <tr class="peminjamanruangan-item" style="border-bottom: 1px solid #f0f0f0;">
                        <td class="px-3 py-3 text-center text-muted">{{ $peminjamanRuangan->firstItem() + $index }}.</td>
                        <td class="px-3 py-3"><span class="fw-medium">{{ $peminjaman->code_peminjaman }}</span></td>
                        <td class="px-3 py-3">{{ $peminjaman->ruangan->nama_ruangan }}</td>
                        <td class="px-3 py-3">{{ $peminjaman->nama_penanggung_jawab }}</td>
                        <td class="px-3 py-3 text-muted">{{ $peminjaman->tanggal_peminjaman }}</td>
                        <td class="px-3 py-3 text-center">
                            @if ($peminjaman->status_peminjaman == '0')
                                <span style="display:inline-flex; align-items:center; gap:5px; background:#f59e0b; color:#fff; border-radius:20px; padding:4px 12px; font-size:.8rem; font-weight:600;">
                                    Waiting Review
                                </span>
                            @elseif ($peminjaman->status_peminjaman == '1')
                                <span style="display:inline-flex; align-items:center; gap:5px; background:#10b981; color:#fff; border-radius:20px; padding:4px 12px; font-size:.8rem; font-weight:600;">
                                    Approve
                                </span>
                            @elseif ($peminjaman->status_peminjaman == '2')
                                <span style="display:inline-flex; align-items:center; gap:5px; background:#ef4444; color:#fff; border-radius:20px; padding:4px 12px; font-size:.8rem; font-weight:600;">
                                    Rejected
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center">
                            <div class="d-flex justify-content-center gap-2">
                                @if($peminjaman->status_peminjaman == '1' || $peminjaman->status_peminjaman == '2')
                                    <a href="{{ route('statuspeminjamanruangan.detailpeminjaman', $peminjaman->id) }}"
                                        class="btn btn-sm d-inline-flex align-items-center gap-1"
                                        style="background:#3b82f6; color:#fff; border-radius:8px;">
                                        Detail
                                    </a>
                                @elseif($peminjaman->status_peminjaman == '0')
                                    <a href="{{ route('statuspeminjamanruangan.editpeminjaman', $peminjaman->id) }}"
                                        class="btn btn-sm d-inline-flex align-items-center gap-1"
                                        style="background:#f59e0b; color:#fff; border-radius:8px;">
                                        Edit
                                    </a>
                                    <form action="{{ route('statuspeminjamanruangan.deletepeminjaman', $peminjaman->id) }}"
                                        method="POST" onsubmit="return confirm('Yakin mau menghapus peminjaman ini?')"
                                        class="d-inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-inline-flex align-items-center gap-1"
                                            style="background:#ef4444; color:#fff; border-radius:8px;">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p id="notFound" style="display:none; text-align:center; font-size:20px; color:red;">
                Oops! Data Tidak Ditemukan!
            </p>

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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("keyup", function () {
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll(".peminjamanruangan-item");
        let ditemukan = false;
        rows.forEach(function (row) {
            if (row.textContent.toLowerCase().includes(keyword)) {
                row.style.display = "table-row";
                ditemukan = true;
            } else {
                row.style.display = "none";
            }
        });
        document.getElementById("notFound").style.display = ditemukan ? "none" : "block";
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
