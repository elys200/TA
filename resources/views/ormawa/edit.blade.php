@extends('layouts.app')
@section('content')

            <div class="container-fluid">

                <h2> Edit Ormawa</h2>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">

                    <form action={{route('ormawa.update', $ormawa->id)}} method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="" class="form-label fw-bold">Nama Ormawa</label>
                            <input type="text" class="form-control" id="" name="nama_ormawa" value="{{ old('nama_ormawa', $ormawa->nama_ormawa) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label fw-bold">Singkatan</label>
                            <input type="text" class="form-control" id="" name="singkatan" value="{{ old('singkatan', $ormawa->singkatan) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label fw-bold">Jenis Ormawa</label>
                            <select id="inputState" class="form-select" name="jenis_ormawa">
                                <option value="" disabled {{ old('jenis_ormawa', $ormawa->jenis_ormawa ?? '') == '' ? 'selected' : '' }}>
                                    -- Pilih Jenis Ormawa --
                                </option>
                                <option value="bem" {{ old('jenis_ormawa', $ormawa->jenis_ormawa ?? '') == 'bem' ? 'selected' : '' }}>BEM</option>
                                <option value="himpunan" {{ old('jenis_ormawa', $ormawa->jenis_ormawa ?? '') == 'himpunan' ? 'selected' : '' }}>
                                    Himpunan</option>
                                <option value="ukm" {{ old('jenis_ormawa', $ormawa->jenis_ormawa ?? '') == 'ukm' ? 'selected' : '' }}>UKM</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label fw-bold">Status Ormawa</label>
                            <select id="inputState" class="form-select" name="status_ormawa">
                                <option value="" disabled {{ old('status_ormawa', $ormawa->status_ormawa ?? '') == '' ? 'selected' : '' }}>
                                    -- Pilih Status Ormawa --
                                </option>
                                <option value="1" {{ old('status_ormawa', $ormawa->status_ormawa ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('status_ormawa', $ormawa->status_ormawa ?? '') == '0' ? 'selected' : '' }}>Non Aktif</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label fw-bold">Tahun Berdiri</label>
                            <input type="date" class="form-control" id="tanggal" name="tahun_berdiri" value="{{ old('tahun_berdiri', $ormawa->tahun_berdiri) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label fw-bold">Ketua</label>
                            <input type="text" class="form-control" id="" name="ketua" value="{{ old('ketua', $ormawa->ketua) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label fw-bold">Foto Organisasi</label>
                            @if(!empty($ormawa->foto_organisasi))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ormawa->foto_organisasi) }}" alt="Foto Organisasi" class="img-thumbnail" style="max-width: 500px;">
                            </div>
                            @endif
                            <input class="form-control" type="file" id="formFile" name="foto_organisasi">
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label fw-bold">Logo</label>
                            @if(!empty($ormawa->logo))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ormawa->logo) }}" alt="Logo" class="img-thumbnail" style="max-width: 300px;">
                            </div>
                            @endif
                            <input class="form-control" type="file" id="formFile" name="logo">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label fw-bold">Email</label>
                            <input type="text" class="form-control" id="" name="email" value="{{ old('email', $ormawa->email) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label fw-bold">Kontak</label>
                            <input type="text" class="form-control" id="" name="kontak" value="{{ old('kontak', $ormawa->kontak) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label fw-bold">PIC Ormawa</label>
                            <select id="inputState" class="form-select" name="pic_id">
                                <option value="" disabled {{ old('pic_id', $ormawa->pic_id ?? '') == '' ? 'selected' : '' }}>
                                    -- Pilih PIC Ormawa --
                                </option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('pic_id', $ormawa->pic_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="deskripsi">{{ old('deskripsi', $ormawa->deskripsi) }}</textarea>
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
