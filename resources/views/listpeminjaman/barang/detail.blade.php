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
            <div class="container-fluid">

                <h2> Detail Peminjaman</h3>

                    <!-- WRAPPER PUTIH -->
                    <div class="bg-white p-4 rounded-3 shadow-sm">

                        <h4 class="mb-3">001</h4>
                        <hr class="my-2">

                        <div class="row" style="margin-top: 25px;">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label fw-bold" style="font-size: 18px;">Nama</label>
                                <input type="text" class="form-control bg-light" value="Budi" readonly>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label fw-bold" style="font-size: 18px;">Nama</label>
                                <input type="text" class="form-control bg-light" value="Budi" readonly>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label fw-bold" style="font-size: 18px;">Nama</label>
                                <input type="text" class="form-control bg-light" value="Budi" readonly>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label fw-bold" style="font-size: 18px;">Nama</label>
                                <input type="text" class="form-control bg-light" value="Budi" readonly>
                            </div>
                        </div>

                        <hr class="my-2 margin-top: 20px;">

                        <div class="row text-center" style="margin-top: 5px;">
                            <div class="col-md-4 mb-4" style="margin-top: 20px;">
                                <p class="fw-semibold mb-3">Known By</p>

                                <div class="d-flex justify-content-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg">
                                        Approve</button>
                                    <button type="button" class="btn btn-danger btn-lg">
                                        Reject</button>
                                    
                                </div>

                                <p class="mb-0">N/A</p>
                            </div>
                        </div>

                        <hr class="my-2">

                    </div>






                    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
                    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
                    <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
                    <script src="{{asset('js/pages/dashboard.js')}}"></script>
                    <script src="{{asset('js/main.js')}}"></script>
            </div>
        </div>
    </div>
</body>

</html>
