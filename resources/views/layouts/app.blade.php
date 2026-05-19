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
    <script src="https://cdn.jsdelivr.net/npm/@hotwired/turbo@8.0.12/dist/turbo.es2017.umd.js"></script>

    {{-- Disable transisi sidebar saat first paint untuk mencegah flash --}}
    <style>
        html:not(.sidebar-ready) .sidebar-wrapper { transition: none !important; }
    </style>

    @pwaHead

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

           <div id="page-content">  {{-- tambah id ini --}}
              @yield('content')
            </div>

        </div>

    </div>

    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}" data-turbo-eval="false"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" data-turbo-eval="false"></script>
    <script src="{{asset('vendors/apexcharts/apexcharts.js')}}" data-turbo-eval="false"></script>
    <script src="{{asset('js/pages/dashboard.js')}}" data-turbo-eval="false"></script>
    <script src="{{asset('js/main.js')}}" data-turbo-eval="false"></script>

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

    

    @if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Validasi Gagal',
        html: `{!! implode('<br>', $errors->all()) !!}`
    })
</script>
@endif

    @stack('scripts')
    @laravelPwa
@pwaUpdateNotifier
@pwaInstallButton
</body>

</html>
