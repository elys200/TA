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

    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.20/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.20/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.20/main.min.css" rel="stylesheet" />



    <script type="importmap">
        {
        "imports": {
          "@fullcalendar/core": "https://cdn.skypack.dev/@fullcalendar/core@6.1.20",
          "@fullcalendar/daygrid": "https://cdn.skypack.dev/@fullcalendar/daygrid@6.1.20",
          "@fullcalendar/timegrid": "https://cdn.skypack.dev/@fullcalendar/timegrid@6.1.20",
          "@fullcalendar/list": "https://cdn.skypack.dev/@fullcalendar/list@6.1.20"
        }
      }
    </script>



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
                <div class="page-content-wrapper">
                    <h3 class="mb-3">{{ $ruangan->nama_ruangan }}</h3>

                    <div class="image-wrapper mb-4">
                        <img src="{{ asset('storage/'.$ruangan->foto) }}" alt="" max-width="200px"
                            class="rounded-3 shadow-sm">
                    </div>



                    <div class="bg-white p-4 rounded-3 shadow-sm">
                        <h4 class="mb-3">Detail Ruangan</h4>

                        <hr class="my-2">

                        <table class="table table-borderless detail-table">
                            <tbody>
                                <tr>
                                    <th>Lokasi Ruangan</th>
                                    <td>{{ $ruangan->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Kode Ruangan</th>
                                    <td>{{ $ruangan->kode_ruangan }}</td>
                                </tr>
                                <tr>
                                    <th>Kapasitas Ruangan</th>
                                    <td>{{ $ruangan->kapasitas }} Orang</td>
                                </tr>
                                <tr>
                                    <th>PIC Ruangan</th>
                                    <td>{{ $ruangan->pic->nama_lengkap ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>No Telp PIC</th>
                                    <td>089505631279</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-grid gap-2">
                            <a href="{{ route('ruangan.form', $ruangan->id) }}" class="btn btn-primary">
                                Ajukan Peminjaman
                            </a>
                        </div>

                    </div>

                    <div class="bg-white p-4 rounded-3 shadow-sm mt-4">
                        <h5 class="mb-3">Jadwal Penggunaan Ruangan</h5>
                        <hr class="my-2">

                        <div id='calendar'></div>
                        <script type="module">
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";

document.addEventListener("DOMContentLoaded", function () {

    const calendarEl = document.getElementById("calendar");
    const ruanganId = {{ $ruangan->id }};

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin],
        initialView: "dayGridMonth",

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay"
        },

        events: `/calendar-events/${ruanganId}`,

        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },

        // 🔥 TARUH DI SINI
        eventDidMount: function(info) {
            console.log(info.event);
        }

    });

    calendar.render();
});
</script>


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
