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
                        <li class="sidebar-title">PIC Menu</li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('kunci') }}" class='sidebar-link'>
                                <i class="bi bi-door-closed"></i>
                                <span>Approval Ruangan</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('kunci') }}" class='sidebar-link'>
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

                <h3> List Pemborangan Barang</h3>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card-body d-flex align-items-center"
                                    style="background-color: #7367f0; border-radius: 10px; height: 130px;">
                                    <div class="me-3">
                                        <i class="bi bi-bell" style="font-size: 50px; color: white;"></i>
                                    </div>
                                    <div style="margin-left: 5px;">
                                        <span style="color: white; font-size: 25px;"><b>Reviewing</b></span>
                                        <h4 id="counterReviewing" class="mb-0" style="color: white;">1</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card-body d-flex align-items-center"
                                    style="background-color: #6EC207; border-radius: 10px; height: 130px;">
                                    <div class="me-3">
                                        <i class="bi bi-check2-circle" style="font-size: 50px; color: white;"></i>
                                    </div>
                                    <div style="margin-left: 5px;">
                                        <span style="color: white; font-size: 25px;"><b>Approve</b></span>
                                        <h4 id="counterApprove" class="mb-0" style="color: white;">1</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card-body d-flex align-items-center"
                                    style="background-color: #FF0000; border-radius: 10px; height: 130px;">
                                    <div class="me-3">
                                        <i class="bi bi-x-circle" style="font-size: 50px; color: white;"></i>
                                    </div>
                                    <div style="margin-left: 5px;">
                                        <span style="color: white; font-size: 25px;"><b>Rejected</b></span>
                                        <h4 id="counterRejected" class="mb-0" style="color: white;">0</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4 mt-5">
                        <div class="col-12 col-sm-8 col-md-4">
                            <input type="text" class="form-control" placeholder="Cari Ruangan...">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>Code</th>
                                    <th>Jumlah</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>2 Item</td>
                                    <td>Elys Aulia Tanjung</td>
                                    <td>20 April 2026</td>
                                    <td>20 April 2026</td>
                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark">Reviewing</span>
                                    </td>
                                    <td class="text-center" style="width:100px;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('approvalbarang.detail') }}" class="btn btn-success btn-sm">
                                                Detail
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
</body>

</html>
