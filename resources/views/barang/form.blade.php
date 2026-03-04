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
                            <img src="{{ asset('images/logo/logo1.png') }}" alt="Logo" srcset="">
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

                <h3> Form Pemborang Barang</h3>

                <!-- WRAPPER PUTIH -->
                <div class="bg-white p-4 rounded-3 shadow-sm">

                    <form action="{{ route('barang.borang', $barang->id) }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="penanggung_jawab" class="form-label">Nama Penaggung Jawab</label>
                            <input type="text" class="form-control" id="nama_penanggung_jawab"
                                name="nama_penanggung_jawab" value="{{ old('nama_penanggung_jawab') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Ormawa</label>
                            <select class="form-select" name="ormawa_id" required>
                                <option value="" disabled {{ old('ormawa_id') ? '' : 'selected' }}>
                                    -- Pilih Jenis Ormawa --
                                </option>

                                @foreach($ormawa as $ormawas)
                                <option value="{{ $ormawas->id }}"
                                    {{ old('ormawa_id') == $ormawas->id ? 'selected' : '' }}>
                                    {{ $ormawas->nama_ormawa }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_mulai_peminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="" name="tanggal_mulai_peminjaman"
                                value="{{ old('tanggal_mulai_peminjaman') }}" min="{{ now()->addDays(2)->toDateString() }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_selesai_peminjaman" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="" name="tanggal_selesai_peminjaman"
                                value="{{ old('tanggal_selesai_peminjaman') }}" min="{{ now()->addDays(2)->toDateString() }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="alasan_peminjaman" class="form-label">Alasan Peminjaman</label>
                            <textarea class="form-control" id="" required
                                name="alasan_peminjaman">{{ old('alasan_peminjaman') }}</textarea>
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
                                                    {{ $barang->nama_barang }}
                                                    <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                                </td>

                                                <td>
                                                    <img src="{{ asset('storage/' . $barang->foto_barang) }}"
                                                        class="img-fluid rounded" style="max-width:120px;">
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="this.nextElementSibling.stepDown()">-</button>

                                                        <input type="number" name="jumlah_barang" value="1" min="1"
                                                            max="{{ $barang->jumlah_barang }}"
                                                            class="form-control text-center" style="width:70px;">

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



                        <button type="submit" class="btn btn-primary">Borang Barang</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script>
        setTimeout(function () {
            let alertBox = document.getElementById('error-alert');
            if (alertBox) {
                alertBox.style.transition = "opacity 0.5s";
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500);
            }
        }, 5000); // 5000 = 5 detik

    </script>
</body>

</html>
