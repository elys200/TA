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
                <div class="bg-white p-4 rounded-3 shadow-sm" style="height:400px;">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="col-lg-9 col-md-12 col-12" style="margin-left: 30px;">
                                <div class="image-wrapper h-100">
                                    <img src="{{ asset('images/baranglokal.jpg') }}" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-12">
                            <h5 class="fw-bold mb-3">Detail Barang</h5>

                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th width="40%">Nama Organisasi</th>
                                        <td>Badan Eksekutif Mahasiswa</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Dibentuk</th>
                                        <td>: 2003</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Pembimbing</th>
                                        <td>: Muhammad Idris Str.M.Kom</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ketua</th>
                                        <td>: Elys Aulia Tanjung</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container my-4" style="background-color: transparent;">
                    <div class="card" style="border:2px solid #a855f7;border-radius:12px;">

                        <!-- Header -->
                        <div class="card-header bg-white">
                            <h5 class="fw-semibold text-primary mb-0">
                                <i class="bi bi-journal-text me-1"></i> Riwayat Peminjaman Extension
                            </h5>
                        </div>

                        <!-- Body -->
                        <div class="card-body">

                            <!-- Timeline -->
                            <div style="position:relative;padding-left:30px;">

                                <!-- Line -->
                                <div style="position:absolute;left:6px;top:0;bottom:0;width:2px;background:#e5e7eb;">
                                </div>

                                <!-- Item -->
                                <div class="mb-4 position-relative">
                                    <div
                                        style="position:absolute;left:-2px;top:6px;width:14px;height:14px;border-radius:50%;background:#fff;border:3px solid #facc15;">
                                    </div>

                                    <div class="ps-4">
                                        <div class="fw-semibold text-warning">Borrowed</div>
                                        <div class="small">
                                            Date : 21 Feb, 2025
                                            <span class="float-end text-muted">10 months ago</span>
                                        </div>
                                        <div class="small">Estimate : 21 Feb, 2025</div>
                                        <div class="small text-muted">
                                            By: Yudha P. (7012207016)
                                        </div>
                                    </div>
                                </div>

                                <!-- Item -->
                                <div class="mb-4 position-relative">
                                    <div
                                        style="position:absolute;left:-2px;top:6px;width:14px;height:14px;border-radius:50%;background:#fff;border:3px solid #6366f1;">
                                    </div>

                                    <div class="ps-4">
                                        <div class="fw-semibold text-primary">Returned</div>
                                        <div class="small">
                                            20 Aug, 2024
                                            <span class="float-end text-muted">1 year ago</span>
                                        </div>

                                        <a href="#" class="badge bg-light text-primary mt-1">return_photo</a>

                                        <div class="small text-muted mt-1">
                                            By: Yudha P. (7012207016) → To: Martauli S. (7011510009)
                                        </div>
                                    </div>
                                </div>

                                <!-- Item -->
                                <div class="mb-4 position-relative">
                                    <div
                                        style="position:absolute;left:-2px;top:6px;width:14px;height:14px;border-radius:50%;background:#fff;border:3px solid #facc15;">
                                    </div>

                                    <div class="ps-4">
                                        <div class="fw-semibold text-warning">Borrowed</div>
                                        <div class="small">
                                            Date : 20 Aug, 2024
                                            <span class="float-end text-muted">1 year ago</span>
                                        </div>
                                        <div class="small">Estimate : 20 Aug, 2024</div>

                                        <a href="#" class="badge bg-light text-primary mt-1">borrow_photo</a>

                                        <div class="small text-muted mt-1">
                                            Perbaiki AC bocor Panin pelita.
                                        </div>
                                    </div>
                                </div>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-end mt-4">
                                    <nav aria-label="Pagination">
                                        <ul class="pagination mb-0">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
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
