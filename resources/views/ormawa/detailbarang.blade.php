<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
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
    <style>
        .image-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 12px;
        }

        @media (max-width: 768px) {
            h5 {
                text-align: center;
            }
        }

    </style>


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
                        <div class="position-relative ps-4">

                            <!-- Garis -->
                            <div class="position-absolute"
                                style="left:8px; top:0; bottom:0; width:2px; background:#e5e7eb;">
                            </div>

                            <!-- Item 1 -->
                            <div class="mb-4 position-relative">
                                <div
                                    style="position:absolute; left:-1px; top:5px; width:14px; height:14px; border-radius:50%; background:#fff; border:3px solid #facc15;">
                                </div>
                                <div class="ps-4">
                                    <div class="fw-semibold text-warning">Borrowed</div>
                                    <div class="small">21 Feb 2025</div>
                                    <div class="small text-muted">By: Yudha P.</div>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="mb-4 position-relative">
                                <div
                                    style="position:absolute; left:-1px; top:5px; width:14px; height:14px; border-radius:50%; background:#fff; border:3px solid #6366f1;">
                                </div>
                                <div class="ps-4">
                                    <div class="fw-semibold text-primary">Returned</div>
                                    <div class="small">20 Aug 2024</div>
                                    <div class="small text-muted">By: Yudha P.</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
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
    </div </body> </html>
