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
                <div class="bg-white p-4 rounded-3 shadow-sm">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-12">
                            <img src="{{ asset('images/baranglokal.jpg') }}" style="margin-bottom:10px;" width="100%"
                                height="60%">
                            <div class="small-img-group">
                                <div class="small-img-col">
                                    <img src="{{ asset('images/baranglokal.jpg')}}" width="80%" class="small-img"
                                        alt="">
                                </div>
                                <div class="small-img-col">
                                    <img src="{{ asset('images/baranglokal.jpg')}}" width="80%" class="small-img"
                                        alt="">
                                </div>
                                <div class="small-img-col">
                                    <img src="{{ asset('images/baranglokal.jpg')}}" width="80%" class="small-img"
                                        alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <h6 class="text-muted">Barang / Extension</h6>

                            <h3 class="fw-bold mb-2">Extension 3 Colokan</h3>

                            <p class="mb-2">
                                Stok Tersedia :
                                <span class="badge bg-primary">1</span>
                            </p>

                            <div class="d-flex align-items-center gap-3 my-3">
                                <input type="number" value="1" min="1" class="form-control w-25 text-center">
                                <button class="btn btn-primary px-4">
                                    Masukkan ke List
                                </button>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold mb-3">Detail Barang</h5>

                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th width="40%">Nama Barang</th>
                                        <td>: Extension 3 Colokan</td>
                                    </tr>
                                    <tr>
                                        <th>Ormawa Pemilik</th>
                                        <td>: HMTI</td>
                                    </tr>
                                    <tr>
                                        <th>Kondisi</th>
                                        <td>: 
                                            <button class="btn btn-success btn-sm">
                                                Bagus
                                            </button>
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Deskripsi</th>
                                        <td>: Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi, animi deleniti facere corporis, laboriosam enim cupiditate voluptate, quasi magnam sapiente. Sequi adipisci labore debitis expedita, eos consequatur. Ullam, qui.</td>
                                    </tr>
                                </tbody>
                            </table>
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
