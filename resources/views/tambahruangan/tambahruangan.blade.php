@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">

        <!-- HEADER -->
        <div class="mb-4 text-center">
            <h1 class="mb-1 fs-3 fs-md-2">Daftar Ruangan</h1>
        </div>

        <hr class="my-2">

        <!-- SEARCH -->
        <div class="row mb-4 mt-2 align-items-center">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Cari Ruangan..." style="width: 300px;">
            </div>

            <div class="col ms-auto">
                <a href="{{ route('tambahruangan.form') }}"
                    class="btn btn-primary d-flex align-items-center gap-1 float-end">
                    <i class="bi bi-plus-circle"></i>
                    Tambah
                </a>
            </div>
        </div>


        <div class="services-wrapper2">
            <div class="row g-3">
                @foreach($ruangan as $r)
                <div class="col-12 col-md-6">
                    <div class="card h-100" style="border: 1px solid #ddd;">

                        @if($r->foto)
                        <img src="{{ asset('storage/' . $r->foto) }}" class="card-img-top card-img-fit"
                            alt="Foto Ruangan">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $r->nama_ruangan }}</h5>
                            <p class="card-text">{{ $r->deskripsi }}</p>


                            <div class="d-flex gap-2">
                                <a href="{{ route('tambahruangan.detail', $r->id) }}" class="btn btn-success btn">
                                    <i class="bi bi-list"></i>
                                </a>

                                <a href="{{ route('tambahruangan.edit', $r->id) }}" class="btn btn-warning btn">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('tambahruangan.destroy', $r->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau menghapus ruangan ini?')" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
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
