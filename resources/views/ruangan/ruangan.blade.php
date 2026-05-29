@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <div class="bg-white p-4 rounded-3 shadow-sm">

        <div class="mb-4 text-center">
            <h2 class="fw-bold mb-1">Daftar Ruangan</h2>
            <p class="text-muted mb-0">Pilih ruangan yang tersedia untuk dipinjam</p>
        </div>

        <hr class="my-3">

        <div class="row mb-4 mt-2">
            <div class="col-12 col-sm-8 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari ruangan...">
            </div>
        </div>

        <div class="row g-3">
            @foreach($ruangan as $ruangans)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 ruang-item">
                <div class="card h-100" style="border:1px solid #e5e7eb; border-radius:12px; overflow:hidden; transition: box-shadow .2s, transform .2s;">

                    <div style="position:relative;">
                        <img src="{{ asset('uploads/' . $ruangans->foto) }}" class="card-img-top" alt=""
                            style="height:180px; object-fit:cover;">
                        <span class="badge bg-primary" style="position:absolute; top:10px; left:10px; font-size:11px;">
                            {{ $ruangans->kode_ruangan }}
                        </span>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold mb-1">{{ $ruangans->nama_ruangan }}</h5>

                        <div class="d-flex gap-3 mb-2">
                            @if($ruangans->lokasi)
                            <small class="text-muted">
                                <i class="bi bi-geo-alt me-1"></i>{{ $ruangans->lokasi }}
                            </small>
                            @endif
                            @if($ruangans->kapasitas)
                            <small class="text-muted">
                                <i class="bi bi-people me-1"></i>{{ $ruangans->kapasitas }} Orang
                            </small>
                            @endif
                        </div>

                        <p class="card-text text-muted small flex-grow-1" style="text-align:left;">
                            {{ \Illuminate\Support\Str::limit($ruangans->deskripsi, 80, '...') }}
                        </p>

                        <a href="{{ route('ruangan.detail', $ruangans->id) }}" class="btn btn-primary w-100 mt-auto">
                            Detail Ruangan
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

            <p id="notFound" style="display:none; text-align:center; font-size:20px; color:red;">Oops! Data Tidak Ditemukan!</p>
        </div>

    </div>
</div>

<style>
    .ruang-item .card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        transform: translateY(-4px);
    }
    @media (max-width: 575px) {
        .ruang-item .card-img-top {
            height: 160px !important;
        }
        .ruang-item .card-title {
            font-size: 1rem;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("keyup", function () {
            const keyword = this.value.toLowerCase();
            const items = document.querySelectorAll(".ruang-item");
            let ditemukan = false;
            items.forEach(function (item) {
                const nama = item.querySelector(".card-title").textContent.toLowerCase();
                if (nama.includes(keyword)) {
                    item.style.display = "";
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
