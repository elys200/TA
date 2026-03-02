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
        <!-- MAIN -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="container-fluid">
                <h3 class="mb-4">Detail Peminjaman Ruangan</h3>

                <!-- CARD -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form>
                            <fieldset disabled>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Code Peminjaman</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->code_peminjaman }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nama Ruangan</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->ruangan->nama_ruangan }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Penanggung Jawab</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->nama_penanggung_jawab }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">NIM</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->nim }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nama Ormawa</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->ormawa->nama_ormawa }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Tanggal Peminjaman</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->tanggal_peminjaman }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Jam Peminjaman</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->jam_mulai }} WIB">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Jam Pengembalian</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->jam_selesai }} WIB">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Alasan Peminjaman</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ $PeminjamanRuangan->alasan_peminjaman }}">
                                    </div>

                                </div>
                            </fieldset>
                        </form>

                        <hr class="my-5">


                        <div class="row text-center justify-content-center mt-2">
                            <div class="col-md-4 mb-4 mt-3">
                                <p class="fw-semibold mb-3">Approve PIC</p>
                                <div class="d-flex justify-content-center gap-2 mb-4">
                                    @if($PeminjamanRuangan->status_peminjaman == '0')
                                    <button type="button" class="btn btn-warning" disabled>Waiting Reviewer</button>
                                    @elseif($PeminjamanRuangan->status_peminjaman == '1')
                                    <button type="button" class="btn btn-success" disabled>Approve</button>
                                    @elseif($PeminjamanRuangan->status_peminjaman == '2')
                                    <div class="d-flex flex-column align-items-center gap-2 mb-4">
                                        <button type="button" class="btn btn-danger btn-lg" disabled>
                                            Rejected
                                        </button>

                                        <a href="#" class="text-danger text-decoration-underline" data-bs-toggle="modal"
                                            data-bs-target="#ModalReasonRejected">
                                            Lihat Alasan Penolakan
                                        </a>
                                    </div>
                                    @endif
                                </div>
                                <p class="mb-0">{{ $PeminjamanRuangan->approver?->nama_lengkap}}</p>
                            </div>
                            <div class="col-md-4 mb-4 mt-3">
                                <p class="fw-semibold mb-3">Pemberian Kunci</p>

                                @if(is_null($PeminjamanRuangan->given_by))
                                <div class="d-flex justify-content-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalPemberianKunci">
                                        Upload Bukti
                                    </button>
                                </div>
                                @else
                                <a href="">
                                    <p class="mb-0 text-center">Lihat Bukti Pemberian Kunci</p>
                                </a>
                                @endif
                            </div>

                            {{-- PENGEMBALIAN KUNCI --}}
                            <div class="col-md-4 mb-4 mt-3">
                                <p class="fw-semibold mb-3">Pengembalian Kunci</p>

                                @if(!is_null($PeminjamanRuangan->given_by) && is_null($PeminjamanRuangan->returned_by))
                                <div class="d-flex justify-content-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalPengembalianKunci">
                                        Upload Bukti
                                    </button>
                                </div>
                                @elseif(!is_null($PeminjamanRuangan->returned_by))
                                <a href="">
                                    <p class="mb-0 text-center">Lihat Bukti Pengembalian Kunci</p>
                                </a>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- JS -->
            <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
            @include('kunci.modal.pemberiankunci')

</body>

</html>
