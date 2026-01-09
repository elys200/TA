<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('css/tes.css') }}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="">
                    <i class="bi bi-house" style="color: #000;"></i>
                    <span style="color: #1f1f1f;">Dashboard</span>
                </a>
            </li>
             <li>
                <a href="">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
             <li>
                <a href="">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
             <li>
                <a href="">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="main--content">
        <div class="hero-simple" style="background:#fff; padding:40px; border-radius:12px; margin-top:20px;">
                <div class="row align-items-center">

                    <!-- Text -->
                    <div class="col-lg-6">

                        <h1 style="font-weight:700; margin-top:10px; color:#1f1f1f;">
                            Selamat Datang di Apbaru
                        </h1>

                        <p style="color:#555; margin-top:15px; ont-weight:400">
                            Aplikasi peminjaman barang dan ruangan untuk memudahkan akses dan pemantauan ketersediaan.
                        </p>

                        <a href="#" class="btn btn-primary" style="padding:10px 25px; margin-top:15px;">
                            Pinjam Sekarang
                        </a>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('images/hero-img.svg') }}" alt="Hero Image"
                            style="max-width:100%; height:auto;">
                    </div>

                </div>
            </div>

            <div
                style="display: flex; justify-content: center; align-items: center; gap: 40px; flex-wrap: wrap; padding: 50px 0;">

                <div>
                    <img src="{{ asset('images/bem.png') }}" alt="Logo 1"
                        style="max-width: 120px; height: auto; opacity: 0.9; transition: transform 0.2s ease, opacity 0.2s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.opacity='1';"
                        onmouseout="this.style.transform='scale(1)'; this.style.opacity='0.9';">
                </div>

                <div>
                    <img src="{{ asset('images/hmti.png') }}" alt="Logo 2"
                        style="max-width: 160px; height: auto; opacity: 0.9; transition: transform 0.2s ease, opacity 0.2s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.opacity='1';"
                        onmouseout="this.style.transform='scale(1)'; this.style.opacity='0.9';">
                </div>
            </div>

            <div class="services-section">
                <h2 class="services-title"> Ruangan</h2>
                <p class="services-subtitle">
                    Berikut ini list ruangan Ormawa yang dapat digunakan
                </p>

                <div class="container px-4">
                    <div class="services-wrapper2">
                        <div class="row g-4">

                            <div class="col-sm-6">
                                <div class="card h-100" style="border: 1px solid #ddd;">
                                    <img src="{{ asset('images/ruangan2.jpg') }}" class="card-img-top card-img-fit"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build the card...</p>
                                        <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card h-100" style="border: 1px solid #ddd;">
                                    <img src="{{ asset('images/ruangan2.jpg') }}" class="card-img-top card-img-fit"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build the card...</p>
                                        <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <a class="services-btn" href="#">View All Services</a>
            </div>

            <div class="services-section" style="margin-top: 30px">
                <h2 class="services-title"> Barang</h2>
                <p class="services-subtitle">
                    Lorem ipsum dolor sit amet, consectetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                    labore.
                </p>

                <div class="services-wrapper">

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/barang.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Extension</p>
                    </div>

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/nampan.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Nampan</p>
                    </div>

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/spidol.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Spidol</p>
                    </div>

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/barang.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Extension</p>
                    </div>


                </div>

                <a class="services-btn" href="#" style="width">View All Services</a>
            </div>

            <div class="about-section">
                <div class="about-container">

                    <div class="about-left">
                        <img src="{{ asset('images/about-img.svg') }}" alt="About Image">
                    </div>

                    <div class="about-right">
                        <h1 class="about-title">Tentang Aplikasi Kami</h1>
                        <p class="about-desc">
                            Aplikasi peminjaman barang dan ruangan yang memudahkan pengguna
                            untuk melakukan reservasi secara cepat, akurat, dan transparan.
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

                        <a href="#" class="about-btn">Lihat Selengkapnya</a>
                    </div>

                </div>
            </div>
    </div>
</body>
</html>