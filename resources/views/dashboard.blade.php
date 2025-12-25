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

    <link rel="shortcut icon" href="{{ asset('images/logo/logo1.png') }}" type="image/x-icon">


</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Badge</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-breadcrumb.html">Breadcrumb</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-button.html">Button</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-card.html">Card</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-carousel.html">Carousel</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-dropdown.html">Dropdown</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-list-group.html">List Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-modal.html">Modal</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-navs.html">Navs</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-pagination.html">Pagination</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-progress.html">Progress</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-spinner.html">Spinner</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-tooltip.html">Tooltip</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Extra Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="extra-component-avatar.html">Avatar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">Sweet Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-toastify.html">Toastify</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-rating.html">Rating</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-divider.html">Divider</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Default Layout</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">1 Column</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-horizontal.html">Horizontal Menu</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Forms &amp; Tables</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Form Elements</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-element-input.html">Input</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-input-group.html">Input Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-select.html">Select</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-radio.html">Radio</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-checkbox.html">Checkbox</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-textarea.html">Textarea</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Form Layout</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Form Editor</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-editor-quill.html">Quill</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-ckeditor.html">CKEditor</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-summernote.html">Summernote</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-tinymce.html">TinyMCE</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Table</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Datatable</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Extra UI</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pentagon-fill"></i>
                                <span>Widgets</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-widgets-chatbox.html">Chatbox</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-widgets-pricing.html">Pricing</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-widgets-todolist.html">To-do List</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-egg-fill"></i>
                                <span>Icons</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-icons-bootstrap-icons.html">Bootstrap Icons </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-icons-fontawesome.html">Fontawesome</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-icons-dripicons.html">Dripicons</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-chart-chartjs.html">ChartJS</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-chart-apexcharts.html">Apexcharts</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="ui-file-uploader.html" class='sidebar-link'>
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <span>File Uploader</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-map-google-map.html">Google Map</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-map-jsvectormap.html">JS Vector Map</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item  ">
                            <a href="application-email.html" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>Email Application</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-chat.html" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Chat Application</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-gallery.html" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Photo Gallery</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-checkout.html" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Checkout Page</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="auth-login.html">Login</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-register.html">Register</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-forgot-password.html">Forgot Password</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-x-octagon-fill"></i>
                                <span>Errors</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="error-403.html">403</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="error-404.html">404</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="error-500.html">500</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Raise Support</li>

                        <li class="sidebar-item  ">
                            <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                                <i class="bi bi-life-preserver"></i>
                                <span>Documentation</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                                <i class="bi bi-puzzle"></i>
                                <span>Contribute</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Donate</span>
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
            <div class="hero-simple" style="background:#fff; padding:40px; border-radius:12px; margin-top:20px;">
                <div class="row align-items-center">

                    <!-- Text -->
                    <div class="col-lg-6">
                        <p style="color:#4d6eff; font-weight:600; margin:0;">Welcome To Bliss</p>

                        <h2 style="font-weight:700; margin-top:10px; color:#1f1f1f;">
                            Selamat Datang di Apbaru
                        </h2>

                        <p style="color:#555; margin-top:15px;">
                            Aplikasi peminjaman barang dan ruangan untuk memudahkan akses dan pemantauan ketersediaan.
                        </p>

                        <a href="#" class="btn btn-primary" style="padding:10px 25px; margin-top:15px;">
                            Pinjam Sekarang
                        </a>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('images/hero-img.svg') }}" alt="Hero Image"
                            style="max-width:100%; height:auto;">
                    </div>

                </div>
            </div>

            <div
                style="display: flex; justify-content: center; align-items: center; gap: 40px; flex-wrap: wrap; padding: 50px 0;">

                <div>
                    <img src="{{ asset('images/bem.png') }}" alt="Logo 1"
                        style="max-width: 120px; height: auto; opacity: 0.9; transition: transform 0.2s ease, opacity 0.2s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.opacity='1';"
                        onmouseout="this.style.transform='scale(1)'; this.style.opacity='0.9';">
                </div>

                 <div>
                    <img src="{{ asset('images/hmti.png') }}" alt="Logo 2"
                        style="max-width: 160px; height: auto; opacity: 0.9; transition: transform 0.2s ease, opacity 0.2s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.opacity='1';"
                        onmouseout="this.style.transform='scale(1)'; this.style.opacity='0.9';">
                </div>
            </div>

            <div class="services-section">
                <h2 class="services-title"> Ruangan</h2>
                <p class="services-subtitle">
                    Berikut ini list ruangan Ormawa yang dapat digunakan
                </p>

                <div class="container">
                    <div class="services-wrapper2">
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <div class="card h-100" style="border: 1px solid #ddd;">
                                    <img src="{{ asset('images/ruangan2.jpg') }}" class="card-img-top card-img-fit"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build the card...</p>
                                        <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card h-100" style="border: 1px solid #ddd;">
                                    <img src="{{ asset('images/ruangan2.jpg') }}" class="card-img-top card-img-fit"
                                        alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build the card...</p>
                                        <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <a class="services-btn" href="#">View All Services</a>
            </div>

            <div class="services-section" style="margin-top: 30px">
                <h2 class="services-title"> Barang</h2>
                <p class="services-subtitle">
                    Lorem ipsum dolor sit amet, consectetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                    labore.
                </p>

                <div class="services-wrapper">

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/barang.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Extension</p>
                    </div>

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/nampan.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Nampan</p>
                    </div>

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/spidol.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Spidol</p>
                    </div>

                    <div class="service-card">
                        <div class="icon bg-1">
                            <img src="{{ asset('images/barang.jpg') }}" alt="">
                        </div>
                        <p style="margin-top: 10px; font-weight: bold; color: #0a2d62">Extension</p>
                    </div>


                </div>

                <a class="services-btn" href="#" style="width">View All Services</a>
            </div>

            <div class="about-section">
                <div class="about-container">

                    <div class="about-left">
                        <img src="{{ asset('images/about-img.svg') }}" alt="About Image">
                    </div>

                    <div class="about-right">
                        <h1 class="about-title">Tentang Aplikasi Kami</h1>
                        <p class="about-desc">
                            Aplikasi peminjaman barang dan ruangan yang memudahkan pengguna
                            untuk melakukan reservasi secara cepat, akurat, dan transparan.
                        </p>

                        <div class="about-accordion">

                            <div class="faq-item">
                                <div class="faq-question">Apa saja yang bisa dipinjam?</div>
                                <div class="faq-answer">
                                    Anda bisa meminjam barang seperti laptop, proyektor, kamera,
                                    serta berbagai ruang rapat dan ruang kelas.
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">Bagaimana cara mengajukan peminjaman?</div>
                                <div class="faq-answer">
                                    Cukup pilih barang atau ruangan, tentukan tanggal, lalu ajukan permintaan.
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">Apa ada batas waktu peminjaman?</div>
                                <div class="faq-answer">
                                    Setiap barang dan ruangan memiliki aturan durasi masing-masing.
                                </div>
                            </div>

                        </div>

                        <a href="#" class="about-btn">Lihat Selengkapnya</a>
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

    <script>
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });

    </script>




</body>

</html>
