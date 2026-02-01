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

                <h3> List Peminjaman Barang</h3>
                <div class="container my-4" style="background-color: transparent;">
                    <div class="card" style="border:2px solid #a855f7;border-radius:12px;">

                        <!-- HEADER -->
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-semibold">Badan Eksekutif Mahasiswa</h5>
                        </div>

                        <hr class="my-0">

                        <!-- BODY -->
                        <div class="card-body bg-white p-3">

                            <!-- ITEM -->
                            <div class="row align-items-center py-3 border-bottom">

                                <!-- Checkbox + Image -->
                                <div class="col-md-4 d-flex align-items-center gap-3">
                                    <input type="checkbox" class="form-check-input mt-0">
                                    <img src="{{ asset('images/barang.jpg') }}"
                                        style="width:90px;height:90px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;">
                                    <div>
                                        <div class="fw-semibold">Extension 3 Colokan</div>
                                        <small class="text-muted">Barang Elektronik</small>
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-4 text-center">
                                    <div class="d-inline-flex align-items-center">
                                        <button class="btn btn-outline-secondary btn-sm">−</button>
                                        <input type="text" class="form-control form-control-sm mx-2 text-center"
                                            style="width:55px;" value="1">
                                        <button class="btn btn-outline-secondary btn-sm">+</button>
                                    </div>
                                </div>

                                <!-- Action -->
                                <div class="col-md-4 text-end pe-5">
                                    <a href="#" class="text-danger text-decoration-none fw-semibold">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </div>

                            </div>
                            <div class="row align-items-center py-3 border-bottom">

                                <!-- Checkbox + Image -->
                                <div class="col-md-4 d-flex align-items-center gap-3">
                                    <input type="checkbox" class="form-check-input mt-0">
                                    <img src="{{ asset('images/barang.jpg') }}"
                                        style="width:90px;height:90px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;">
                                    <div>
                                        <div class="fw-semibold">Extension 3 Colokan</div>
                                        <small class="text-muted">Barang Elektronik</small>
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-4 text-center">
                                    <div class="d-inline-flex align-items-center">
                                        <button class="btn btn-outline-secondary btn-sm">−</button>
                                        <input type="text" class="form-control form-control-sm mx-2 text-center"
                                            style="width:55px;" value="1">
                                        <button class="btn btn-outline-secondary btn-sm">+</button>
                                    </div>
                                </div>

                                <!-- Action -->
                                <div class="col-md-4 text-end pe-5">
                                    <a href="#" class="text-danger text-decoration-none fw-semibold">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </div>

                            </div>

                            <div class="bg-white p-3 rounded shadow-sm mt-3 sticky-bottom">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <span class="text-muted">Total :</span>
                                            <span class="fw-thin text-danger fs-7">2 Item</span>
                                        </div>
                                        <a href="{{ route('listpeminjamanbarang.form') }}" class="btn btn-danger px-4">
                                            Ajukan Peminjaman
                                        </a>
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
</body>

</html>
