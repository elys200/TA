<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/logo/logo1.png') }}" type="image/x-icon">


</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo/logo1.png" alt="Logo" srcset=""></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('ruangan') }}" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span> Ruangan </span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('barang') }}" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span> Barang </span>
                            </a>
                        </li>
                        <li class="sidebar-title">Peminjaman</li>
                        <li class="sidebar-item  ">
                            <a href="ui-file-uploader.html" class='sidebar-link'>
                                <i class="bi bi-list"></i>
                                <span>List Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('statuspeminjaman') }}" class='sidebar-link'>
                                <i class="bi bi-exclamation-circle-fill"></i>
                                <span>Status Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Pamdal Menu</li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('kunci') }}" class='sidebar-link'>
                                <i class="bi bi-key-fill"></i>
                                <span>Kunci</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Other</li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('tambahruangan') }}" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span>Kelola Ruangan</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ url('/ormawa') }}" class='sidebar-link'>
                                <i class="bi bi-diagram-3"></i>
                                <span>Ormawa</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('user') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('role') }}" class='sidebar-link'>
                                <i class="bi bi-shield-lock"></i>
                                <span>Role</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="container-fluid">

                <h2>Formulir Pemborangan Ruangan</h2>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">

                    <form class="row g-3">

                        <!-- Nama Kegiatan -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Contoh: Seminar Nasional">
                        </div>

                        <!-- Jenis Kegiatan -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jenis Kegiatan</label>
                            <select class="form-select">
                                <option selected disabled>-- Pilih Jenis Kegiatan --</option>
                                <option>Seminar</option>
                                <option>Pelatihan</option>
                                <option>Rapat</option>
                                <option>Lomba</option>
                                <option>Kegiatan Internal</option>
                            </select>
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Pinjam</label>
                            <input type="date" class="form-control">
                        </div>

                        <!-- Tanggal Kembali -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Pengembalian</label>
                            <input type="date" class="form-control">
                        </div>

                        <hr class="my-4" style="border-top: 1.5px dashed #f90000;">

                        <!-- Daftar Barang -->
                        <div class="col-12">
                            <label class="form-label fw-bold">Barang yang Dipinjam</label>

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width:40%">Gambar Barang</th>
                                            <th style="width:20%">Nama Barang</th>
                                            <th style="width:20%">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images/barang.jpg') }}" alt="Barang"
                                                    style="width: 100px; height: auto;">
                                            </td>
                                            <td>Proyektor</td>
                                            <td>5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-4" style="border-top: 1.5px dashed #f90000;">

                        <!-- Penanggung Jawab -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Penanggung Jawab</label>
                            <input type="text" class="form-control" placeholder="Nama PJ Kegiatan">
                        </div>

                        <!-- No HP PJ -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">No. HP Penanggung Jawab</label>
                            <input type="text" class="form-control" placeholder="08xxxxxxxxxx">
                        </div>

                        <!-- Catatan -->
                        <div class="col-12">
                            <label class="form-label fw-bold">Catatan Tambahan</label>
                            <textarea class="form-control" rows="3"
                                placeholder="Catatan khusus untuk admin..."></textarea>
                        </div>


                        <!-- Tombol -->
                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-success px-4">
                                Ajukan Peminjaman
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
        <script src="{{asset('js/pages/dashboard.js')}}"></script>
        <script src="{{asset('js/main.js')}}">
        </script>
    </div>
</body>

</html>
