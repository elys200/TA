@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="bg-white p-4 rounded-3 shadow-sm">

        <div class="mb-4 text-center">
            <h1 class="mb-1 fs-3 fs-md-2">Kelola Ruangan</h1>
        </div>

        <hr class="my-2">

        <div class="row mb-4 mt-2 align-items-center">
            <div class="col-12 col-sm-8 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Ruangan...">
            </div>
            <div class="col ms-auto text-end">
                <a href="{{ route('tambahruangan.form') }}" class="btn btn-primary d-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
        </div>

        <div class="services-wrapper2">
            <div class="row g-3">
                @foreach($ruangan as $r)
                <div class="col-12 col-md-6 ruangan-item">
                    <div class="card h-100" style="border: 1px solid #ddd;">

                        @if($r->foto)
                        <img src="{{ asset('storage/' . $r->foto) }}" class="card-img-top card-img-fit" alt="Foto Ruangan">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $r->nama_ruangan }}</h5>
                            <p class="card-text text-muted small flex-grow-1">{{ \Illuminate\Support\Str::limit($r->deskripsi, 20, '...') }}</p>

                            <div class="d-flex gap-2 mt-auto">
                                <a href="{{ route('tambahruangan.detail', $r->id) }}" class="btn btn-success btn-sm d-flex align-items-center justify-content-center" style="width:34px;height:34px;">
                                    <i class="bi bi-eye text-black"></i>
                                </a>
                                <a href="{{ route('tambahruangan.edit', $r->id) }}" class="btn btn-warning btn-sm d-flex align-items-center justify-content-center" style="width:34px;height:34px;">
                                    <i class="bi bi-pencil-square text-black"></i>
                                </a>
                                <form action="{{ route('tambahruangan.destroy', $r->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau menghapus ruangan ini?')" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width:34px;height:34px;">
                                        <i class="bi bi-trash text-black"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>
                @endforeach
                <p id="notFound" style="display:none; text-align:center; font-size:20px; color:red;">Oops! Data Tidak Ditemukan!</p>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("keyup", function () {
            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll(".ruangan-item");
            let ditemukan = false;
            rows.forEach(function (row) {
                const text = row.textContent.toLowerCase();
                if (text.includes(keyword)) {
                    row.style.display = "";
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
