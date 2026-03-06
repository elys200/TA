<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.20/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.20/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.20/main.min.css" rel="stylesheet" />

    <style>
        .image-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 12px;
        }

        @media (max-width: 768px) {
            h5 {
                text-align: center;
            }
        }

    </style>

    <link rel="shortcut icon" href="{{ asset('images/logo/logo1.png') }}" type="image/x-icon">
</head>

<body>
    <div id="app">

        <!-- sidebar -->
        @include('layouts.sidebar')

        <div id="main">

            <!-- header -->
            @include('layouts.header')

            @yield('content')

        </div>

    </div>

    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script>
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success",
            draggable: true
        });

    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            title: "Oops...",
            text: "{{ session('error') }}",
            icon: "error",
            draggable: true
        });

    </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const rows = document.querySelectorAll(".data-row");

            function showRows(status) {
                rows.forEach(row => {
                    if (status === "all") {
                        row.style.display = "";
                    } else {
                        if (row.classList.contains("status-" + status)) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    }
                });
            }

            document.getElementById("btnAll").addEventListener("click", function () {
                showRows("all");
            });

            document.getElementById("btnReview").addEventListener("click", function () {
                showRows("0");
            });

            document.getElementById("btnApprove").addEventListener("click", function () {
                showRows("1");
            });

            document.getElementById("btnRejected").addEventListener("click", function () {
                showRows("2");
            });

        });

    </script>

    <script>
        document.getElementById('searchRuangan').addEventListener('keyup', function () {

            let keyword = this.value.toLowerCase();
            let items = document.querySelectorAll('.ruang-item');

            items.forEach(function (item) {

                let nama = item.querySelector('.card-title').textContent.toLowerCase();

                if (nama.includes(keyword)) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }

            });

        });

    </script>

    @stack('scripts')
</body>

</html>
