@extends('layouts.app')
@section('content')

            <div class="container-fluid">

                <h3> Form Pemborang Ruangan</h3>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm">
                    @if ($errors->any())
                    <div id="error-alert" class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{route('ruangan.borang', $ruangan->id)}}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="disabledTextInput" class="form-label">Nama Ruangan</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                value="{{ $ruangan->nama_ruangan }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="disabledTextInput" class="form-label">Nama Pengaju</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                value="{{ $user->nama_lengkap }}" disabled>
                        </div>
                         <div class="col-md-6">
                            <label for="disabledTextInput" class="form-label">No Tlp Pengaju</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                value="{{ $user->no_tlp }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Nama Penaggung Jawab</label>
                            <input type="text" class="form-control" id="nama_penanggung_jawab"
                                aria-describedby="emailHelp" name="nama_penanggung_jawab"
                                value="{{old('nama_penanggung_jawab')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{old('nim')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ormawa</label>
                            <select class="form-select" name="ormawa_id" required>
                                <option value="" disabled {{ old('ormawa_id') ? '' : 'selected' }}>
                                    -- Pilih Jenis Ormawa --
                                </option>

                                @foreach($ormawa as $ormawas)
                                <option value="{{ $ormawas->id }}"
                                    {{ old('ormawa_id') == $ormawas->id ? 'selected' : '' }}>
                                    {{ $ormawas->nama_ormawa }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal_peminjaman"
                                value="{{old('tanggal_peminjaman')}}" min="{{ now()->addDays(2)->toDateString() }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Jam Penggunaan</label>
                            <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror"
                                id="exampleInputPassword1" name="jam_mulai" value="{{old('jam_mulai')}}" required>

                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Jam Pengembalian</label>
                            <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror"
                                id="exampleInputPassword1" name="jam_selesai" value="{{old('jam_selesai')}}" required>

                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Alasan Peminjaman</label>
                            <textarea class="form-control" id="exampleInputPassword1" required
                                name="alasan_peminjaman">{{ old('alasan_peminjaman') }} </textarea>
                        </div>
                        <small class="text-danger">
                            Senin – Jumat: 08:00–21:00 <br>
                            Sabtu - Minggu: 08:00–17:00 <br>
                        </small>
                        <button type="submit" class="btn btn-primary">Ajukan</button>

                    </form>
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
