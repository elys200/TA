@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-12 overflow-hidden">
                <img src="{{ asset('storage/' . $barang->foto_barang) }}" class="w-100 rounded"
                    style="max-height: 400px; object-fit: cover; transform: scale(1.05);">
            </div>

            <div class="col-lg-6 col-md-12">
                <h3 class="fw-bold mb-2">{{ $barang->nama_barang }}</h3>

                <p class="mb-2">
                    Stok Tersedia :
                    <span class="badge bg-primary">{{ $barang->jumlah_barang }}</span>
                </p>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Detail Barang</h5>

                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th width="40%">Nama Barang</th>
                            <td>: {{ $barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Ormawa Pemilik</th>
                            <td>: {{ $barang->ormawa->nama_ormawa}}</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>:
                                @if($barang->kondisi_barang == 'baik')
                                <button class="btn btn-success btn-sm">
                                    Bagus
                                </button>
                                @else($barang->kondisi_barang == 'rusak')
                                <button class="btn btn-danger btn-sm">
                                    Rusak
                                </button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>: {{ $barang->deskripsi_barang }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-grid gap-2">
                    @if($barang->jumlah_barang == 0)
                    <button class="btn btn-primary" disabled>
                        Ajukan Peminjaman
                    </button>
                    @else
                    <a href="{{ route('barang.form' , $barang->id) }}" class="btn btn-primary">
                        Ajukan Peminjaman
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</div>
</div>
</div> 
@endsection 
@push('scripts') <script>
document.querySelectorAll('.faq-item').forEach(item => {
item.addEventListener('click', () => {
item.classList.toggle('active');
});
});
</script>
@endpush
