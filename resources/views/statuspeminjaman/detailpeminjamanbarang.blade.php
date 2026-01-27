<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Peminjaman</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons & CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/logo/logo1.png') }}">
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
        <!-- MAIN -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="container-fluid">
                <h3 class="mb-4">Detail Peminjaman Barang</h3>

                <!-- CARD -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form>
                            <fieldset disabled>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Code</label>
                                        <input type="text" class="form-control" placeholder="001">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nama Kegiatan</label>
                                        <input type="text" class="form-control" placeholder="Sekolah Advokasi">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Tanggal Peminjaman</label>
                                        <input type="text" class="form-control" placeholder="20 April 2026">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Tanggal Pengembalian</label>
                                        <input type="text" class="form-control" placeholder="20 April 2026">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Penanggung Jawab</label>
                                        <input type="text" class="form-control" placeholder="Elys Aulia Tanjung">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">No HP</label>
                                        <input type="text" class="form-control" placeholder="089505631279">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Catatan</label>
                                        <input type="textarea" class="form-control" placeholder="Tidak ada catatan">
                                    </div>
                                </div>
                            </fieldset>
                        </form>



                        <div class="row align-items-center py-3 border rounded-3 mb-4" style="margin-top: 20px;">
                            <div class="col-md-6 d-flex align-items-center gap-3">
                                <img src="{{ asset('images/barang.jpg') }}" class="rounded"
                                    style="width:90px;height:90px;object-fit:cover;border:1px solid #e5e7eb;">

                                <div>
                                    <div class="fw-semibold">Extension 3 Colokan</div>
                                    <small class="text-muted">Barang Elektronik</small>
                                </div>
                            </div>

                            <div class="col-md-6 text-md-end text-center">
                                <span class="badge bg-secondary fs-6 px-3 py-2">
                                    Jumlah: 2
                                </span>
                            </div>
                        </div>
                    </div>

                   <div class="row text-center justify-content-center mt-2">

                <!-- APPROVE PIC -->
                <div class="col-12 col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Approve PIC</p>

                    <div class="d-flex justify-content-center gap-2 flex-wrap mb-4">
                        <button type="button" class="btn btn-success px-4"
                            data-bs-toggle="modal" data-bs-target="#modalPemberianKunci">
                            Approved
                        </button>

                        <button type="button" class="btn btn-success px-4"
                            data-bs-toggle="modal" data-bs-target="#modalPemberianKunci">
                            Approved
                        </button>

                        <button type="button" class="btn btn-success px-4"
                            data-bs-toggle="modal" data-bs-target="#modalPemberianKunci">
                            Approved
                        </button>
                    </div>

                    <p class="mb-0">Elys Aulia Tanjung</p>
                </div>

                <!-- PEMBERIAN BARANG -->
                <div class="col-12 col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Pemberian Barang</p>

                    <div class="d-flex justify-content-center mb-4">
                        <button type="button" class="btn btn-success px-4"
                            data-bs-toggle="modal" data-bs-target="#modalPengembalianKunci">
                            Berhasil
                        </button>
                    </div>

                    <a href="#" class="text-decoration-none">
                        <p class="mb-0">Lihat Bukti Pemberian</p>
                    </a>
                </div>

                <!-- PENGEMBALIAN BARANG -->
                <div class="col-12 col-md-4 mb-4 mt-3">
                    <p class="fw-semibold mb-3">Pengembalian Barang</p>

                    <div class="d-flex justify-content-center mb-4">
                        <button type="button" class="btn btn-success px-4"
                            data-bs-toggle="modal" data-bs-target="#modalPengembalianKunci">
                            Berhasil
                        </button>
                    </div>

                    <a href="#" class="text-decoration-none">
                        <p class="mb-0">Lihat Bukti Pengembalian</p>
                    </a>
                </div>

            </div>


                </div>
            </div>
        </div>

        <!-- JS -->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
