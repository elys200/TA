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
                <h3 class="mb-4">Detail Peminjaman Barang</h3>

                <!-- CARD -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form action="" method="POST" class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_penanggung_jawab" class="form-label">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control" id="nama_penanggung_jawab"
                                    name="nama_penanggung_jawab" value="{{ $peminjaman->nama_penanggung_jawab }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" name="nim"
                                    value="{{ $peminjaman->nim }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nama Ormawa</label>
                                <input type="text" class="form-control" id="ormawa_id" name="ormawa_id"
                                    value="{{$peminjaman->ormawa->nama_ormawa }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_mulai_peminjaman" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="" name="tanggal_mulai_peminjaman"
                                    value="{{$peminjaman->tanggal_mulai_peminjaman }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_selesai_peminjaman" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" id="" name="tanggal_selesai_peminjaman" disabled
                                    value="{{$peminjaman->tanggal_selesai_peminjaman }}">

                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_selesai_peminjaman" class="form-label">Nama Pengaju</label>
                                <input type="" class="form-control" id="" name="users_id" disabled
                                    value="{{$peminjaman->user->nama_lengkap }}">
                            </div>
                            <div class="col-md-6">
                                <label for="alasan_peminjaman" class="form-label">Alasan Peminjaman</label>
                                <textarea class="form-control" id=""
                                    disabled>{{ $peminjaman->alasan_peminjaman }}</textarea>
                            </div>

                            <hr width="2px" style="margin-top: 20px;">



                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-10" style="margin-top: 5px;">

                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center align-middle">

                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 30%;">Nama Barang</th>
                                                    <th style="width: 40%;">Foto Barang</th>
                                                    <th style="width: 30%;">Jumlah</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>

                                                    <td>
                                                        {{ $peminjaman->barang->nama_barang }}
                                                        <input type="hidden" name="barang_id"
                                                            value="{{ $peminjaman->barang->id }}" disabled>
                                                    </td>

                                                    <td>
                                                        <img src="{{ asset('storage/' . $peminjaman->barang->foto_barang) }}"
                                                            class="img-fluid rounded" style="max-width:120px;">
                                                    </td>

                                                    <td>
                                                        <div
                                                            class="d-flex justify-content-center align-items-center gap-2">

                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="this.nextElementSibling.stepDown()">-</button>

                                                            <input type="number" name="jumlah_barang" value="1" min="1"
                                                                max="{{ $peminjaman->jumlah_barang }}"
                                                                class="form-control text-center" style="width:70px;"
                                                                disabled>

                                                            <button type="button" class="btn btn-success btn-sm"
                                                                onclick="this.previousElementSibling.stepUp()">+</button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="row text-center justify-content-center mt-2 mb-4">

                            <!-- APPROVE PIC -->
                            <div class="col-12 col-md-4 mb-4 mt-3">
                                <p class="fw-semibold mb-3">Approve PIC</p>

                                @if($peminjaman->status_peminjaman == '0')
                               <div class="d-flex justify-content-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalApprove">Approved</button>
                                    <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalReject">Rejected</button>
                                </div>

                                @elseif($peminjaman->status_peminjaman == '1')
                                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg" disabled>Approved</button>
                                    <p class="mb-0 mt-3"> {{ $peminjaman->approver?->nama_lengkap}}
                                </div>

                                @elseif($peminjaman->status_peminjaman == '2')
                                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                                    <button type="button" class="btn btn-danger btn-lg" disabled>
                                        Rejected
                                    </button>

                                    <a href="#" class="text-danger text-decoration-underline" data-bs-toggle="modal"
                                        data-bs-target="#ModalReasonRejected">
                                        Lihat Alasan Penolakan
                                    </a>
                                    <p class="mb-0"> {{ $peminjaman->rejector?->nama_lengkap}}
                                </div>
                                @endif
                            </div>

                            <!-- PEMBERIAN BARANG -->
                            <div class="col-12 col-md-4 mb-4 mt-3">
                                <p class="fw-semibold mb-3">Pemberian Barang</p>

                                @if(is_null($peminjaman->given_by))
                                 <div class="d-flex justify-content-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalPemberianBarang">
                                        Upload Bukti
                                    </button>
                                </div>
                                @else
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPemberian">
                                    <p class="mb-0 text-center">Lihat Bukti Pemberian Kunci</p>
                                </a>
                                <p class="mb-0 mt-3"> {{ $peminjaman->given?->nama_lengkap}}
                                <p class="mb-0">{{ $peminjaman->time_given }}</p>
                                    
                                @endif

                            </div>

                            <!-- PENGEMBALIAN BARANG -->
                            <div class="col-12 col-md-4 mb-4 mt-3">
                                <p class="fw-semibold mb-3">Pengembalian Barang</p>

                                @if(!is_null($peminjaman->given_by) && is_null($peminjaman->returned_by))
                               <div class="d-flex justify-content-center gap-2 mb-4">
                                    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#modalPengembalianBarang">
                                        Upload Bukti
                                    </button>
                                </div>

                                @elseif(!is_null($peminjaman->returned_by))
                                <a href="" data-bs-toggle="modal" data-bs-target="#modalTampilkanBuktiPengembalian">
                                    <p class="mb-0 text-center">Lihat Bukti Pengembalian Kunci</p>
                                </a>
                                <p class="mb-0 mt-3"> {{ $peminjaman->returned?->nama_lengkap}}
                                <p class="mb-0">{{ $peminjaman->time_returned }}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <!-- JS -->
                <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
                <script src="{{ asset('js/main.js') }}"></script>
                @include('approval.modal.modalbarang.modalalasanrejected')
                @include('approval.modal.modalbarang.modalapprove')
                @include('approval.modal.modalbarang.modalrejected')
                @include('approval.modal.modalbarang.tampilanbuktipemberian')
                @include('approval.modal.modalbarang.tampilanbuktipengembalian')
                @include('approval.modal.modalbarang.pemberianbarang')
                @include('approval.modal.modalbarang.pengembalianbarang')
</body>
</html>
