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
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
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
                            <a href="{{route('listpeminjamanbarang')}}" class='sidebar-link'>
                                <i class="bi bi-list"></i>
                                <span>List Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('statuspeminjamanbarang') }}" class='sidebar-link'>
                                <i class="bi bi-exclamation-circle-fill"></i>
                                <span>Status Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-title">PIC Menu</li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('approvalruangan') }}" class='sidebar-link'>
                                <i class="bi bi-door-closed"></i>
                                <span>Approval Ruangan</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('approvalbarang') }}" class='sidebar-link'>
                                <i class="bi bi-box-seam"></i>
                                <span>Approval Barang</span>
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

            <div class="page-heading mb-4">
                <h3 class="fw-bold">Badan Eksekutif Mahasiswa</h3>
                <p class="text-muted mb-0">Detail Organisasi Mahasiswa</p>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row g-4 align-items-center">

                        <!-- Logo / Foto -->
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/ormawa/bem.jpg') }}" class="img-fluid rounded mb-2"
                                style="max-height: 300px; object-fit: contain;">
                        </div>

                        <!-- Informasi -->
                        <div class="col-md-8">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th width="30%">Nama Organisasi</th>
                                    <td>:</td>
                                    <td>Badan Eksekutif Mahasiswa</td>
                                </tr>
                                <tr>
                                    <th>Singkatan</th>
                                    <td>:</td>
                                    <td>BEM</td>
                                </tr>
                                <tr>
                                    <th>Jenis Ormawa</th>
                                    <td>:</td>
                                    <td>BEM</td>
                                </tr>
                                <tr>
                                    <th>Tahun Berdiri</th>
                                    <td>:</td>
                                    <td>10 November 2004</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                        <span class="badge bg-success px-3 py-2">Aktif</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>PIC</th>
                                    <td>:</td>
                                    <td>Elys Aulia Tanjung</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>bempolibatam@gmail.com</td>
                                </tr>
                                <tr>
                                    <th>Kontak</th>
                                    <td>:</td>
                                    <td>081270889291</td>
                                </tr>
                                <tr>
                                    <th>Logo</th>
                                    <th>:</th>
                                    <th>
                                        <img src="{{ asset('images/bem.png') }}" class="img-fluid rounded"
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
                        <button class="btn btn-primary btn-sm d-flex align-items-center"
                        data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
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
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="{{ asset('images/logo/logo1.png') }}"
                                            style="width: 80px; height: 60px; object-fit: contain;">
                                    </td>
                                    <td>Kain Hitam</td>
                                    <td>5</td>
                                    <td>Kain Hitam 3 meter</td>
                                    <td class="text-center">
                                        <a href="{{ route('ormawa.detailbarang') }}" class="btn btn-success  me-1 align-items-center">
                                         <i class="bi bi-justify"></i>
                                        </a>
                                        <button class="btn btn-warning  me-1 align-items-center"
                                         data-bs-toggle="modal" data-bs-target="#modalEditBarang">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-danger align-items-center" data-bs-toggle="modal" data-bs-target="#modalHapusBarang" >
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

        <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
        <script src="{{asset('js/pages/dashboard.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        @include('ormawa.modal.tambahbarang')
        @include('ormawa.modal.editbarang')
        @include('ormawa.modal.hapusbarang')

</body>

</html>
