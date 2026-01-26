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

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm">

                    <!-- HEADER -->
                    <div class="mb-4 text-center">
                        <h1 class="mb-1 fs-3 fs-md-2">Daftar Ruangan</h1>
                    </div>

                    <hr class="my-2">


                    <!-- SEARCH -->
                    <div class="row mb-4 mt-2 align-items-center">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Cari Ruangan..." style="width: 300px;">
                        </div>

                        <div class="col ms-auto">
                            <a href="{{ route('tambahruangan.form') }}" class="btn btn-primary d-flex align-items-center gap-1 float-end">
                                <i class="bi bi-plus-circle"></i>
                                Tambah
                            </a>
                        </div>
                    </div>


                    <div class="services-wrapper2">
                        <div class="row g-3">

                            <div class="col-12 col-md-6">
                                <div class="card h-100" style="border: 1px solid #ddd;">
                                    <img src="{{ asset('images/ruangan2.jpg') }}" class="card-img-top card-img-fit"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build the card...</p>
                                          <button class="btn btn-success  align-items-center" data-bs-toggle="modal"
                                            data-bs-target="#modalHapusBarang">
                                            <i class="bi bi-list"></i>
                                        </button>
                                        <button class="btn btn-warning  me-1 align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#modalEditBarang">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-danger  align-items-center" data-bs-toggle="modal"
                                            data-bs-target="#modalHapusBarang">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="card h-100" style="border: 1px solid #ddd;">
                                    <img src="{{ asset('images/ruangan2.jpg') }}" class="card-img-top card-img-fit"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build the card...</p>

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
</body>

</html>
