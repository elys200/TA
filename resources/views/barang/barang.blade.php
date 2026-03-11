@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <div class="bg-white p-4 rounded-3 shadow-sm">

        <div class="mb-4 text-center">
            <h2 class="mb-1">Daftar Barang</h2>
            <p class="text-muted mb-0">Pilih barang yang tersedia untuk dipinjam</p>
        </div>

        <hr class="my-2">

        <div class="row mb-4" style="margin-top: 10px;">
            <div class="col-12 col-md-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari barang...">
            </div>
        </div>

        <div class="row g-3">

            @foreach ($barang as $item)

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 barang-item">

                <a href="{{ route('barang.detail', $item->id) }}" class="text-decoration-none text-dark">

                    <div class="card product-card h-100 border-0" style="border:1px solid #e5e7eb !important;">

                        <img src="{{ asset('storage/'. $item->foto_barang) }}" alt="Barang">

                        <div class="card-body p-2">

                            <p class="product-title mb-1">
                                {{ $item->nama_barang }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="stock-text">
                                    Stok: <strong>{{ $item->jumlah_barang }}</strong>
                                </span>

                                @if($item->jumlah_barang > 0)
                                <span class="badge bg-success">Available</span>
                                @else
                                <span class="badge bg-danger">Not Available</span>
                                @endif

                            </div>
                        </div>

                    </div>

                </a>
            </div>

            @endforeach
            <p id="notFound" style="display:none; text-align: center; font-size: 20px; color: red; ">Oops! Data Tidak Ditemukan!</p>

        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const searchInput = document.getElementById("searchInput");

        searchInput.addEventListener("keyup", function () {

            const keyword = this.value.toLowerCase();
            const items = document.querySelectorAll(".barang-item");
            let ditemukan = false;

            items.forEach(function (item) {

                const nama = item.querySelector(".product-title").textContent.toLowerCase();

                if (nama.includes(keyword)) {
                    item.style.display = "";
                    ditemukan = true;
                } else {
                    item.style.display = "none";
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
