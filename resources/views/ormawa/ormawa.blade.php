@extends('layouts.app')
@section('content')

<div class="page-heading mb-3">
    <h3>Organisasi Mahasiswa</h3>
</div>

<div class="bg-white p-4 rounded-3 shadow-sm">
    <div class="main" style="padding: 20px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="input-group" style="max-width: 250px;">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Cari organisasi...">
            </div>
            <a href="{{ route('ormawa.form') }}">
                <button class="btn btn-primary d-flex align-items-center gap-1">
                    <i class="bi bi-plus-circle"></i>
                    Tambah
                </button>
            </a>
        </div>

        <div class="row g-4">
            @foreach ($ormawa as $ormawas)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">


                <div class="card h-100 shadow-sm border-0 card-hover">


                    <img src="{{ asset('storage/' . $ormawas->foto_organisasi) }}" class="card-img-top"
                        style="height: 220px; object-fit: cover;" alt="BEM">

                    <div class="card-body d-flex flex-column">

                        <h6 class="fw-bold mb-2">
                            {{ $ormawas->nama_ormawa}}
                        </h6>

                        <p class="text-muted small flex-grow-1">
                            {{ $ormawas->deskripsi}}
                        </p>

                        <div class="d-flex gap-2">
                            <a href="{{ route('ormawa.detail', $ormawas->id) }}"
                                class="btn btn-success btn d-flex align-items-center gap-2">
                                <i class="bi bi-justify"></i>
                            </a>
                            <a href="{{ route('ormawa.edit', $ormawas->id) }}"
                                class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('ormawa.destroy', $ormawas->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau menghapus organisasi ini?')" class="m-0">
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
