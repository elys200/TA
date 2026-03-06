@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">

        <!-- HEADER -->
        <div class="mb-4 text-center">
            <h1 class="mb-1 fs-3 fs-md-2">Daftar Ruangan</h1>
            <p class="text-muted mb-0 fs-6 fs-md-5">
                Pilih Ruangan yang tersedia untuk dipinjam
            </p>
        </div>

        <hr class="my-2">

        <!-- SEARCH -->
        <div class="row mb-4 mt-2">
            <div class="col-12 col-sm-8 col-md-4">
                <input 
                    type="text" 
                    class="form-control" 
                    id="searchInput" 
                    placeholder="Cari Ruangan..."
                >
            </div>
        </div>

        <!-- LIST RUANGAN -->
        <div class="services-wrapper2">
            <div class="row g-3">

                @foreach($ruangan as $ruangans)

                <div class="col-12 col-md-6 ruang-item">
                    <div class="card h-100" style="border: 1px solid #ddd;">
                        
                        <img src="{{ asset('storage/'.$ruangans->foto) }}" 
                             class="card-img-top card-img-fit" 
                             alt="">

                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $ruangans->nama_ruangan }}
                            </h5>

                            <p class="card-text">
                                {{ $ruangans->deskripsi }}
                            </p>

                            <a href="{{ route('ruangan.detail', $ruangans->id) }}" 
                               class="btn btn-primary w-100">
                                Detail Ruangan
                            </a>
                        </div>

                    </div>
                </div>

                @endforeach

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
        const items = document.querySelectorAll(".ruang-item");

        items.forEach(function(item){

            const nama = item.querySelector(".card-title").textContent.toLowerCase();

            if(nama.includes(keyword)){
                item.style.display = "";
            } else {
                item.style.display = "none";
            }

        });

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