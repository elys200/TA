@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h3> Form Pemborang Barang</h3>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">

        <form action="{{ route('statuspeminjaman.updatepeminjamanbarang' , $peminjaman->id) }}" method="POST"
            class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="penanggung_jawab" class="form-label">Nama Pengaju</label>
                <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab"
                    placeholder="{{ $peminjaman->user->nama_lengkap }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="penanggung_jawab" class="form-label">No Tlp Pengaju</label>
                <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab"
                    placeholder="{{ $peminjaman->user->no_tlp }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="penanggung_jawab" class="form-label">Nama Penaggung Jawab</label>
                <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab"
                    value="{{ old('nama_penanggung_jawab' , $peminjaman->nama_penanggung_jawab) }}" required>
            </div>
            <div class="col-md-6">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim' , $peminjaman->nim) }}"
                    required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Ormawa</label>
                <select class="form-select" name="ormawa_id" required>
                    <option value="" disabled {{ old('ormawa_id') ? '' : 'selected' }}>
                        -- Pilih Jenis Ormawa --
                    </option>

                    @foreach($ormawa as $ormawas)
                    <option value="{{ $ormawas->id }}"
                        {{ old('ormawa_id', $peminjaman->ormawa_id) == $ormawas->id ? 'selected' : '' }}>
                        {{ $ormawas->nama_ormawa }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal_mulai_peminjaman" class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" id="" name="tanggal_mulai_peminjaman"
                    value="{{ old('tanggal_mulai_peminjaman', $peminjaman->tanggal_mulai_peminjaman) }}"
                    min="{{ now()->addDays(2)->toDateString() }}" required>
            </div>
            <div class="col-md-6">
                <label for="tanggal_selesai_peminjaman" class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="" name="tanggal_selesai_peminjaman"
                    value="{{ old('tanggal_selesai_peminjaman', $peminjaman->tanggal_selesai_peminjaman) }}"
                    min="{{ now()->addDays(2)->toDateString() }}" required>
            </div>
            <div class="col-md-6">
                <label for="alasan_peminjaman" class="form-label">Alasan Peminjaman</label>
                <textarea class="form-control" id="" required
                    name="alasan_peminjaman">{{ old('alasan_peminjaman', $peminjaman->alasan_peminjaman) }}</textarea>
            </div>

            <hr width="2px" style="margin-top: 20px;">



            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10" style="margin-top: 5px;">

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">

                            <thead class="table-light">
                                <tr>
                                    <th style="width: 30%;">Nama Barang</th>
                                    <th style="width: 40%;">Foto Barang</th>
                                    <th style="width: 30%;">Jumlah</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td>
                                        {{ $barang->nama_barang }}
                                        <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                    </td>

                                    <td>
                                        <img src="{{ asset('storage/' . $barang->foto_barang) }}"
                                            class="img-fluid rounded" style="max-width:120px;">
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-2">

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="this.nextElementSibling.stepDown()">-</button>

                                            <input type="number" name="jumlah_barang" value="1" min="1"
                                                max="{{ $barang->jumlah_barang }}" class="form-control text-center"
                                                style="width:70px;">

                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="this.previousElementSibling.stepUp()">+</button>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>



            <button type="submit" class="btn btn-primary">Borang Barang</button>

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
