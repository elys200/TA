<!-- <!DOCTYPE html>
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

                <h3> List Peminjaman Ruangan</h3>

                <!-- WRAPPER PUTIH -->
                <!-- <div class="bg-white p-4 rounded-3 shadow-sm">
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

</html> --> -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }
        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 16px 0;
        }
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
        .qty-box input {
            width: 50px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container my-4">

    <h5 class="fw-bold mb-3">Keranjang Saya</h5>

    <!-- HEADER -->
    <div class="bg-white p-3 rounded mb-2 shadow-sm">
        <div class="row text-muted fw-semibold small">
            <div class="col-5">Produk</div>
            <div class="col text-center">Harga</div>
            <div class="col text-center">Jumlah</div>
            <div class="col text-center">Total</div>
            <div class="col text-center">Aksi</div>
        </div>
    </div>

    <!-- LIST BARANG -->
    <div class="bg-white p-3 rounded shadow-sm">

        <!-- ITEM -->
        <div class="row align-items-center cart-item">
            <div class="col-5 d-flex gap-3">
                <input type="checkbox">
                <img src="https://via.placeholder.com/80" class="product-img">
                <div>
                    <div class="fw-semibold">Kawat Tangkai Bunga</div>
                    <small class="text-muted">Variasi: Kawat Batang</small>
                </div>
            </div>

            <div class="col text-center">Rp9.920</div>

            <div class="col text-center">
                <div class="d-flex justify-content-center qty-box">
                    <button class="btn btn-outline-secondary btn-sm">-</button>
                    <input type="text" class="form-control form-control-sm mx-1" value="1">
                    <button class="btn btn-outline-secondary btn-sm">+</button>
                </div>
            </div>

            <div class="col text-center text-danger fw-semibold">
                Rp9.920
            </div>

            <div class="col text-center">
                <a href="#" class="text-danger text-decoration-none">Hapus</a>
            </div>
        </div>

        <!-- ITEM -->
        <div class="row align-items-center cart-item">
            <div class="col-5 d-flex gap-3">
                <input type="checkbox">
                <img src="https://via.placeholder.com/80" class="product-img">
                <div>
                    <div class="fw-semibold">Flower Tape Solasi</div>
                    <small class="text-muted">Variasi: 30 Yard</small>
                </div>
            </div>

            <div class="col text-center">Rp7.225</div>

            <div class="col text-center">
                <div class="d-flex justify-content-center qty-box">
                    <button class="btn btn-outline-secondary btn-sm">-</button>
                    <input type="text" class="form-control form-control-sm mx-1" value="1">
                    <button class="btn btn-outline-secondary btn-sm">+</button>
                </div>
            </div>

            <div class="col text-center text-danger fw-semibold">
                Rp7.225
            </div>

            <div class="col text-center">
                <a href="#" class="text-danger text-decoration-none">Hapus</a>
            </div>
        </div>

    </div>

    <!-- FOOTER CHECKOUT -->
    <div class="bg-white p-3 rounded shadow-sm mt-3 sticky-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <input type="checkbox"> Pilih Semua
                <a href="#" class="ms-3 text-danger text-decoration-none">Hapus</a>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div>
                    <span class="text-muted">Total:</span>
                    <span class="fw-bold text-danger fs-5">Rp17.145</span>
                </div>
                <button class="btn btn-danger px-4">
                    Checkout
                </button>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

