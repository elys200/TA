@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h2> Ruangan Baru</h2>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">

        <form action="{{ route('ruangan.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" id="nama_ruangan" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Kode Ruangan</label>
                <input type="text" name="kode_ruangan" class="form-control" id="kode_ruangan" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Lokasi Ruangan</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Deskripsi Ruangan</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Kapasitas Ruangan</label>
                <input type="number" name="kapasitas" class="form-control" id="kapasitas" required>
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label fw-bold">Foto Ruangan</label>
                <input class="form-control" name="foto" type="file" id="formFile" required>
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label fw-bold">Jam Operasional</label>
                <input class="form-control" name="jam_operasional" type="time" id="jam_operasional" required>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label fw-bold">PIC Ruangan</label>
                <select name="pic_id" id="inputState" class="form-select">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit</button>
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
