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
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span> Ruangan </span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>

                                <span> Barang </span>
                            </a>
                        </li>
                        <li class="sidebar-title">Peminjaman</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-list"></i>
                                <span>List Peminjaman</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <i class="bi bi-door-open" style="font-size: 1.1rem;"></i>
                                    <a href="error-403.html">Ruangan</a>
                                </li>
                                <li class="submenu-item ">
                                    <i class="bi bi-archive" style="font-size: 1.1rem;"></i>
                                    <a href="error-404.html">Barang</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="ui-file-uploader.html" class='sidebar-link'>
                                <i class="bi bi-exclamation-circle-fill"></i>
                                <span>Status Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="ui-file-uploader.html" class='sidebar-link'>
                                <i class="bi bi-clock-history"></i>
                                <span>Riwayat Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Pamdal Menu</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-key-fill"></i>
                                <span>Kunci</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <i class="bi bi-box-arrow-up-right" style="font-size: 1.1rem;"></i>
                                    <a href="error-403.html">Pemberian</a>
                                </li>
                                <li class="submenu-item ">
                                    <i class="bi bi-box-arrow-down-left" style="font-size: 1.1rem;"></i>
                                    <a href="error-404.html">Pengembalian</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-title">Other</li>
                        <li class="sidebar-item  ">
                            <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                                <i class="bi bi-shield-lock"></i>
                                <span>Role</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ url('/ormawa') }}" class='sidebar-link'>
                                <i class="bi bi-diagram-3"></i>
                                <span>Ormawa</span>
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

                <h3> Kunci</h3>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card-body d-flex align-items-center"
                                    style="background-color: #6EC207; border-radius: 10px; height: 130px;">
                                    <div class="me-3">
                                        <i class="bi bi-arrow-up-circle" style="font-size: 50px; color: white;"></i>
                                    </div>
                                    <div style="margin-left: 5px;">
                                        <span style="color: white; font-size: 25px;"><b>Pemberian</b></span>
                                        <h4 id="counterReviewing" class="mb-0" style="color: white;">1</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card-body d-flex align-items-center"
                                    style="background-color: #7367f0; border-radius: 10px; height: 130px;">
                                    <div class="me-3">
                                        <i class="bi bi-arrow-down-circle" style="font-size: 50px; color: white;"></i>
                                    </div>
                                    <div style="margin-left: 5px;">
                                        <span style="color: white; font-size: 25px;"><b>Pengembalian</b></span>
                                        <h4 id="counterApprove" class="mb-0" style="color: white;">1</h4>
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
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Position</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kode Nama</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Admin</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>Masteradmin</td>
                                    <td>Jimmy@mtpindo.com</td>
                                    <td>-</td>
                                    <td>
                                        <span class="badge bg-primary">Super Admin</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                             <button class="btn btn-success btn-sm">
                                               <i class="bi bi-justify"></i> Detail
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
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
