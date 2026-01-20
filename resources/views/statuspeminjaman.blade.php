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

                <h3> Status Peminjaman</h3>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <button class="btn btn-primary d-flex align-items-center justify-content-center gap-1"
                                style="min-width: 120px; padding: 8px 16px;">
                                <i class="bi bi-archive"></i>
                                <span>Barang</span>
                            </button>
                        </div>

                        <div class="col-auto">
                            <button class="btn btn-primary d-flex align-items-center justify-content-center gap-1"
                                style="min-width: 120px; padding: 8px 16px;">
                                <i class="bi bi-door-open"></i>
                                <span>Ruangan</span>
                            </button>
                        </div>

                        <!-- Search -->
                        <div class="col-12 col-md-4 ms-md-auto mt-2 mt-md-0">
                            <input type="text" class="form-control" placeholder="Cari barang...">
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 15px; border: 1px solid #dee2e6; border-radius: 8px; padding: 10px 15px; background-color: #fff; margin-bottom: 1rem;">
                        <div class="btn-group">
                            <i class="bi bi-filter" style="margin-right: 15px; font-size: 1.5rem;"></i>
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Status Pengajuan
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Approve</a></li>
                                <li><a class="dropdown-item" href="#">Rejected</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Status Peminjaman
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Diajukan</a></li>
                                <li><a class="dropdown-item" href="#">Sedang Dipinjam</a></li>
                                <li><a class="dropdown-item" href="#">Selesai</a></li>
                            </ul>
                        </div>
                    </div>




                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" style="margin-top: 10px">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Position</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kode Nama</th>
                                    <th>Role</th>
                                    <th>Nama Kelompok / Pribadi</th>
                                    <th>Signature</th>
                                    <th>Contact</th>
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
                                    <td>N/A</td>
                                    <td class="text-danger">Not Exist</td>
                                    <td>-</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Aidil Adha</td>
                                    <td>-</td>
                                    <td>Sales</td>
                                    <td>Aidil</td>
                                    <td>Aidil@mtpindo.com</td>
                                    <td>AA</td>
                                    <td>
                                        <span class="badge bg-info">Sales</span>
                                    </td>
                                    <td>Aidil</td>
                                    <td class="text-danger">Not Exist</td>
                                    <td>+62 811-6930-965</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
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
