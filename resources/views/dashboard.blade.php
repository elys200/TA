@extends('layouts.app')

@section('content')

{{-- HERO --}}
<div style="background: linear-gradient(135deg, #435ebe 0%, #2c3e8c 100%); border-radius: 16px; padding: clamp(24px, 5vw, 48px) clamp(16px, 5vw, 40px); margin-bottom: 30px;">
    <div class="row align-items-center g-4">
        <div class="col-lg-6">
            <span class="badge mb-3 px-3 py-2" style="background:rgba(255,255,255,0.2); color:#fff; font-size:13px; border-radius:20px;">
                <i class="bi bi-box-seam me-1"></i> Sistem Peminjaman Ormawa
            </span>
            <h1 class="fw-bold text-white" style="font-size:2.2rem; line-height:1.3;">
                Selamat Datang di <span style="color:#ffd166;">Apbaru</span>
            </h1>
            <p style="color:rgba(255,255,255,0.8); margin-top:12px; font-size:15px;">
                Aplikasi peminjaman barang dan ruangan untuk memudahkan akses dan pemantauan ketersediaan.
            </p>
            <a href="#ruangan" class="btn mt-3 px-4 py-2 fw-semibold"
                style="background:#ffd166; color:#1f1f1f; border-radius:8px; text-decoration:none;">
                <i class="bi bi-box-arrow-right me-1"></i> Pinjam Sekarang
            </a>
        </div>
        <div class="col-lg-6 text-center">
            <img src="{{ asset('images/hero-img.svg') }}" alt="Hero Image"
                style="max-width:100%; max-height:270px; filter: drop-shadow(0 10px 30px rgba(0,0,0,0.2));">
        </div>
    </div>
</div>

{{-- RUANGAN --}}
<div class="services-section" id="ruangan" style="padding: 40px 0; margin-bottom: 10px;">
    <h2 class="services-title">Ruangan</h2>
    <p class="services-subtitle">
        Berikut ini list ruangan Ormawa yang dapat digunakan
    </p>

    <div class="container">
        <div class="services-wrapper2 mx-4 mt-4">
            <div class="row g-3">
                @foreach ($ruangan->take(2) as $ruang)
                <div class="col-sm-6">
                    <div class="card h-100" style="border: 1px solid #ddd; border-radius:12px; overflow:hidden;">
                        <img src="{{ asset('storage/'. $ruang->foto) }}" class="card-img-top card-img-fit" alt="">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $ruang->nama_ruangan }}</h5>
                            <p class="card-text text-muted small flex-grow-1" style="text-align:left;">{{ \Illuminate\Support\Str::limit($ruang->deskripsi, 100, '...') }}</p>
                            <a href="{{ route('ruangan.detail', $ruang->id) }}" class="btn btn-primary w-100 mt-auto">Detail Ruangan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <a href="{{ route('ruangan') }}" class="btn btn-outline-primary btn-sm mt-4 px-4" style="border-radius: 20px;">Lihat Semua Ruangan</a>
</div>

{{-- BARANG --}}
<div class="services-section" style="padding: 40px 0; margin-top: 10px;">
    <h2 class="services-title">Barang</h2>
    <p class="services-subtitle">
        Berikut ini merupakan list barang Ormawa yang dapat dipinjam
    </p>

    <div class="services-wrapper">
        @foreach($barang->take(4) as $item)
        <div class="service-card" style="position:relative;">
            @if($item->jumlah_barang > 0)
            <span class="badge bg-success" style="position:absolute; top:12px; right:12px; font-size:11px;">Available</span>
            @else
            <span class="badge bg-danger" style="position:absolute; top:12px; right:12px; font-size:11px;">Habis</span>
            @endif
            <div class="icon bg-1">
                <img src="{{ asset('storage/' . $item->foto_barang) }}" alt="{{ $item->nama_barang }}">
            </div>
            <p style="margin-top: 10px; font-weight: bold; color: #0a2d62;">{{ $item->nama_barang }}</p>
        </div>
        @endforeach
    </div>

    <a href="{{ route('barang') }}" class="btn btn-outline-primary btn-sm mt-4 px-4" style="border-radius: 20px;">Lihat Semua Barang</a>
</div>

{{-- TENTANG --}}
<div class="about-section">
    <div class="about-container">
        <div class="about-left">
            <img src="{{ asset('images/about-img.svg') }}" alt="About Image">
        </div>
        <div class="about-right">
            <h1 class="about-title">Tentang Aplikasi Kami</h1>
            <p class="about-desc">
                Platform peminjaman barang dan ruangan yang dirancang untuk mempermudah proses reservasi secara cepat, terstruktur, dan transparan.
            </p>

            <div class="about-accordion">
                <div class="faq-item">
                    <div class="faq-question">Apa saja yang bisa dipinjam?</div>
                    <div class="faq-answer">
                        Anda bisa meminjam barang seperti laptop, proyektor, kamera,
                        serta berbagai ruang rapat dan ruang kelas.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Bagaimana cara mengajukan peminjaman?</div>
                    <div class="faq-answer">
                        Cukup pilih barang atau ruangan, tentukan tanggal, lalu ajukan permintaan.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Apa ada batas waktu peminjaman?</div>
                    <div class="faq-answer">
                        Setiap barang dan ruangan memiliki aturan durasi masing-masing.
                    </div>
                </div>
            </div>

            <a href="https://drive.google.com/drive/folders/1bTYTzVrjjpDyeheeJxyNTqqGTzeLkI_K?usp=sharing"
                class="about-btn" target="_blank">Lihat Selengkapnya</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
    });
</script>

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
