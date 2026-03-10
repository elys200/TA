@extends('layouts.app')
@section('content')

<div class="container-fluid py-1">

    <!-- CARD DETAIL -->
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div class="row align-items-center">

            <!-- GAMBAR -->
            <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                <div class="image-wrapper">
                    <img src="{{ asset('storage/'.$barang->foto_barang) }}" class="img-fluid shadow-sm"
                        style="object-fit:cover; max-height:350px;">
                </div>
            </div>

            <!-- TABEL DETAIL -->
            <div class="col-12 col-lg-7">
                <h5 class="fw-bold mb-3">Detail Barang</h5>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th width="35%">Nama Barang</th>
                                <td width="5%">:</td>
                                <td>{{ $barang->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kode Barang</th>
                                <td>:</td>
                                <td>{{ $barang->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Barang</th>
                                <td>:</td>
                                <td>{{ $barang->jumlah_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Barang</th>
                                <td>:</td>
                                <td>{{ $barang->kondisi_barang }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi Barang</th>
                                <td>:</td>
                                <td>{{ $barang->deskripsi_barang }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- TIMELINE CARD -->
    <div class="card mt-4 shadow-sm" style="border-radius:12px;">
        <div class="card-header bg-white">
            <h5 class="fw-semibold text-primary mb-0">
                <i class="bi bi-journal-text me-1"></i> Riwayat Peminjaman
            </h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Penanggung Jawab</th>
                            <th>Jumlah</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Bukti Pemberian</th>
                            <th>Bukti Pengembalian</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($peminjaman as $item)
                        <td style="text-align: center;">{{ $loop->iteration }}.</td>
                        <td>{{ $item->code_peminjaman }}</td>
                        <td>{{ $item->nama_penanggung_jawab}}</td>
                        <td style="text-align: center;">{{ $item->jumlah_barang }}</td>
                        <td style="text-align: center;">{{ $item->tanggal_mulai_peminjaman }}</td>
                        <td style="text-align: center;">{{ $item->tanggal_selesai_peminjaman }}</td>
                        <td>
                            @if($item->foto_pemberian == null)
                            <button class="btn btn-secondary">Waiting</button>
                            @else
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPemberian{{ $item->id }}">
                                Lihat Bukti
                            </a>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if($item->foto_pengembalian == null)
                            <button class="btn btn-secondary">Waiting</button>
                            @else
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPengembalian{{ $item->id }}">
                                Lihat Bukti
                            </a>
                            @endif
                        </td>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@include('ormawa.modal.tampikanbuktipemberian')
@include('ormawa.modal.tampilkanbuktipengembalian')
@endsection
