@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2> Edit Ruangan {{ $ruangan->kode_ruangan }}</h2>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">

        <form action="{{ route('tambahruangan.update', $ruangan->id) }}" method="POST" class="row g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" id="nama_ruangan"
                    value="{{old('nama_ruangan', $ruangan->nama_ruangan)}}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Kode Ruangan</label>
                <input type="text" name="kode_ruangan" class="form-control" id="kode_ruangan"
                    value="{{old('kode_ruangan', $ruangan->kode_ruangan)}}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Lokasi Ruangan</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi"
                    value="{{old('lokasi', $ruangan->lokasi)}}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Deskripsi Ruangan</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                    value="{{old('deskripsi', $ruangan->deskripsi)}}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Kapasitas Ruangan</label>
                <input type="number" name="kapasitas" class="form-control" id="kapasitas"
                    value="{{old('kapasitas', $ruangan->kapasitas)}}">
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label fw-bold">Foto Ruangan</label>
                <input class="form-control" name="foto" type="file" id="formFile"
                    value="{{old('foto', $ruangan->foto)}}">
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label fw-bold">Jam Operasional</label>
                <input class="form-control" name="jam_operasional" type="time" id="jam_operasional"
                    value="{{old('jam_operasional', $ruangan->jam_operasional)}}" required>
            </div>
            <div class="col-md-6">
                <label for="pic_id" class="form-label fw-bold">PIC Ruangan</label>
                <select name="pic_id" id="pic_id" class="form-select">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('pic_id', $ruangan->pic_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->nama_lengkap }}</option>
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
