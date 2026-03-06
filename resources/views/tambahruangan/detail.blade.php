@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2> Detail Ruangan {{ $ruangan->kode_ruangan }}</h2>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">

        <form action="#" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-12">
                <label for="formFile" class="form-label fw-bold">Foto Ruangan</label>
                <img src="{{ asset('storage/' . $ruangan->foto) }}" class="img-thumbnail" alt="Foto Ruangan"
                    style="width: 200px height: 100px; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" id="nama_ruangan"
                    value="{{ $ruangan->nama_ruangan }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Kode Ruangan</label>
                <input type="text" name="kode_ruangan" class="form-control" id="kode_ruangan"
                    value="{{$ruangan->kode_ruangan}}" disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Lokasi Ruangan</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{$ruangan->lokasi}}" disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Deskripsi Ruangan</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ $ruangan->deskripsi}}"
                    disabled>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Kapasitas Ruangan</label>
                <input type="number" name="kapasitas" class="form-control" id="kapasitas"
                    value="{{ $ruangan->kapasitas }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label fw-bold">Jam Operasional</label>
                <input class="form-control" name="jam_operasional" type="time" id="jam_operasional"
                    value="{{$ruangan->jam_operasional}}" disabled>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label fw-bold">PIC Ruangan</label>
                <input class="form-control" name="pic_ruangan" type="form-control" id="pic_ruanga"
                    value="{{ $ruangan->pic->nama_lengkap ?? '' }}" disabled>
            </div>
            <div class="col-12">
                <a href="{{route('tambahruangan')}}" class="btn btn-primary" type="submit">Back</a>
            </div>
        </form>
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
