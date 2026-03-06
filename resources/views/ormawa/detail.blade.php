@extends('layouts.app')
@section('content')

<div class="page-heading mb-4">
    <h3 class="fw-bold">{{ $ormawa->nama_ormawa }}</h3>
    <p class="text-muted mb-0">Detail Organisasi Mahasiswa</p>
</div>
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="row g-4 align-items-center">

            <!-- Logo / Foto -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/' . $ormawa->foto_organisasi) }}" class="img-fluid rounded mb-2"
                    style="max-height: 300px; object-fit: contain;">
            </div>

            <!-- Informasi -->
            <div class="col-md-8">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="30%">Nama Organisasi</th>
                        <td>:</td>
                        <td>{{ $ormawa->nama_ormawa }}</td>
                    </tr>
                    <tr>
                        <th>Singkatan</th>
                        <td>:</td>
                        <td>{{ $ormawa->singkatan }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Ormawa</th>
                        <td>:</td>
                        <td>{{ $ormawa->jenis_ormawa }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Berdiri</th>
                        <td>:</td>
                        <td>{{ $ormawa->tahun_berdiri }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td>
                            <span
                                class="badge bg-success px-3 py-2">{{ $ormawa->status_ormawa == 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>PIC</th>
                        <td>:</td>
                        <td>{{ $ormawa->users->name ?? 'Tidak Ada PIC' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{ $ormawa->email }}</td>
                    </tr>
                    <tr>
                        <th>Kontak</th>
                        <td>:</td>
                        <td>{{ $ormawa->kontak }}</td>
                    </tr>
                    <tr>
                        <th>Logo</th>
                        <th>:</th>
                        <th>
                            <img src="{{ asset('storage/' . $ormawa->logo) }}" class="img-fluid rounded"
                                style="max-height: 70px; object-fit: contain;">
                        </th>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Daftar Barang</h5>
            <button class="btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal"
                data-bs-target="#modalTambahBarang">
                <i class="bi bi-plus-lg me-1"></i> Tambah
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Qty</th>
                        <th>Deskripsi</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ormawa->barang as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $barang->foto_barang) }}"
                                style="width: 80px; height: 60px; object-fit: contain;">
                        </td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->jumlah_barang }}</td>
                        <td>{{ $barang->deskripsi_barang }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-2">

                                <a href="{{ route('ormawa.barang.detail', ['id' => $ormawa->id, 'barangId' => $barang->id]) }}"
                                    class="btn btn-success btn-sm">
                                    <i class="bi bi-justify"></i>
                                </a>

                                <button class="btn btn-warning btn-sm btn-edit-barang" data-id="{{ $barang->id }}"
                                    data-ormawa="{{ $ormawa->id }}" data-nama="{{ $barang->nama_barang }}"
                                    data-kode="{{ $barang->kode_barang }}"
                                    data-deskripsi="{{ $barang->deskripsi_barang }}"
                                    data-jumlah="{{ $barang->jumlah_barang }}"
                                    data-kondisi="{{ $barang->kondisi_barang }}"
                                    data-status="{{ $barang->status_barang }}" data-foto="{{ $barang->foto_barang }}"
                                    data-bs-toggle="modal" data-bs-target="#modalEditBarang">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <form
                                    action="{{ route('ormawa.barang.destroy', ['id' => $ormawa->id, 'barangId' => $barang->id]) }}"
                                    method="POST" onsubmit="return confirm('Yakin mau menghapus barang ini?')"
                                    class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll('.btn-edit-barang').forEach(button => {

            button.addEventListener('click', function () {

                let id = this.dataset.id;
                let ormawaId = this.dataset.ormawa;

                document.getElementById('editNamaBarang').value = this.dataset.nama;
                document.getElementById('editKodeBarang').value = this.dataset.kode;
                document.getElementById('editDeskripsiBarang').value = this.dataset
                    .deskripsi;
                document.getElementById('editJumlahBarang').value = this.dataset.jumlah;

                document.getElementById('editKondisiBarang').value = this.dataset
                    .kondisi;
                document.getElementById('editStatusBarang').value = this.dataset.status;

                // preview foto
                let foto = this.dataset.foto;
                let preview = document.getElementById('previewFoto');

                if (foto) {
                    preview.innerHTML =
                        `<img src="/storage/${foto}" class="img-thumbnail" style="width:200px;">`;
                } else {
                    preview.innerHTML = "";
                }

                // set action form
                document.getElementById('editBarangForm').action =
                    `/ormawa/${ormawaId}/barang/${id}`;
            });

        });

    });

</script>



@include('ormawa.modal.tambahbarang')
@include('ormawa.modal.editbarang')
@include('ormawa.modal.hapusbarang')

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
