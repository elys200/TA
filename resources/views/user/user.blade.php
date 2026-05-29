@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="bg-white p-4 rounded-3 shadow-sm">

        <div class="mb-3">
            <h4 class="fw-bold mb-0">Kelola User</h4>
            <p class="text-muted small mb-0">Manajemen data pengguna sistem</p>
        </div>

        <hr class="my-3">

        <div class="row mb-4 mt-2 align-items-center">
            <div class="col-12 col-sm-8 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari User...">
            </div>
            <div class="col ms-auto text-end">
                <a href="{{ route('user.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle" style="border-collapse: collapse;">
                <thead>
                    <tr style="background:#f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">No.</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">NIM</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Nama Lengkap</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Jurusan</th>
                        <th class="px-3 py-3 text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Program Studi</th>
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Role</th>
                        <th class="px-3 py-3 text-center text-muted fw-semibold" style="font-size:.82rem; text-transform:uppercase; letter-spacing:.04em;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    @php
                        $role = $user->roles->isEmpty() ? 'PENDING' : strtoupper($user->getRoleNames()->first());
                        $badgeColor = match($role) {
                            'PENDING'      => '#6b7280',
                            'ADMIN'        => '#3b82f6',
                            'MAHASISWA'    => '#10b981',
                            'PAMDAL'       => '#f59e0b',
                            'PIC_BARANG'   => '#06b6d4',
                            'PIC_RUANGAN'  => '#ef4444',
                            default        => '#6b7280',
                        };
                    @endphp
                    <tr class="user-item" style="border-bottom: 1px solid #f0f0f0;">
                        <td class="px-3 py-3 text-center text-muted">{{ $users->firstItem() + $index }}.</td>
                        <td class="px-3 py-3"><span class="fw-medium">{{ $user->nim }}</span></td>
                        <td class="px-3 py-3">{{ $user->nama_lengkap }}</td>
                        <td class="px-3 py-3 text-muted">{{ $user->jurusan }}</td>
                        <td class="px-3 py-3 text-muted">{{ $user->program_studi }}</td>
                        <td class="px-3 py-3 text-center">
                            <span style="display:inline-flex; align-items:center; background:{{ $badgeColor }}; color:#fff; border-radius:20px; padding:4px 12px; font-size:.8rem; font-weight:600;">
                                {{ $role }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-sm d-inline-flex align-items-center justify-content-center"
                                    style="background:#f59e0b; color:#fff; border-radius:8px; width:34px; height:34px;">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau menghapus user ini?')" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm d-inline-flex align-items-center justify-content-center"
                                        style="background:#ef4444; color:#fff; border-radius:8px; width:34px; height:34px;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p id="notFound" style="display:none; text-align:center; font-size:20px; color:red;">Oops! Data Tidak Ditemukan!</p>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted small">
                    Menampilkan {{ $users->lastItem() }} dari {{ $users->total() }} data
                </div>
                <div>
                    {{ $users->links() }}
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
        const items = document.querySelectorAll(".user-item");
        let ditemukan = false;
        items.forEach(function (item) {
            if (item.textContent.toLowerCase().includes(keyword)) {
                item.style.display = "table-row";
                ditemukan = true;
            } else {
                item.style.display = "none";
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
