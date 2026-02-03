<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.boxicons.com/3.0.4/fonts/basic/boxicons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="container">

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
        <div class="success-alert" id="successAlert">
            {{ session('success') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Pastikan tampil login
                document.querySelector('.container').classList.remove('active');

                // Auto hide setelah 5 detik
                setTimeout(() => {
                    const alert = document.getElementById('successAlert');
                    if (alert) {
                        alert.style.opacity = '0';
                        alert.style.transition = 'opacity 0.5s ease';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
            });

        </script>
        @endif

        @if ($errors->register->any())
        <div class="error-alert top-alert" id="errorAlert">
            @foreach ($errors->register->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Pastikan tampil login
                document.querySelector('.container').classList.remove('active');

                // Auto hide setelah 5 detik
                setTimeout(() => {
                    const alert = document.getElementById('errorAlert');
                    if (alert) {
                        alert.style.opacity = '0';
                        alert.style.transition = 'opacity 0.5s ease';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
            });

        </script>
        @endif


        {{-- LOGIN FORM --}}
        <div class="form-box login">
            <form action="" method="POST">
                @csrf
                <h1>Login</h1>

                <div class="input-box">
                    <input type="text" name="nim" placeholder="NIM" required>
                    <i class="bx bx-user"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="bx bx-lock"></i>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        {{-- REGISTER FORM --}}
        <div class="form-box register">
            @if ($errors->register->any())
            <div class="error-alert">
                @foreach ($errors->register->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>Registrasi</h1>

                <div class="input-box">
                    <input type="text" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                </div>

                <div class="input-box">
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
                </div>

                <div class="input-box">
                    <select name="jurusan" id="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Manajemen Bisnis" {{ old('jurusan') == 'Manajemen Bisnis' ? 'selected' : '' }}>
                            Manajemen Bisnis</option>
                        <option value="Teknik Elektro" {{ old('jurusan') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik
                            Elektro</option>
                        <option value="Teknik Informatika"
                            {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Teknik Mesin" {{ old('jurusan') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik
                            Mesin</option>
                        <i class="bx bx-chevron-down"></i>
                    </select>
                </div>

                <div class="input-box">
                    <select name="program_studi" id="program_studi" required>
                        <option value="">Pilih Program Studi</option>
                    </select>
                </div>

                <div class="input-box" style="margin-top: 10px;">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>

                <div class="input-box">
                    <select name="ormawa" required>
                        <option value="">Pilih Organisasi</option>
                        <option value="BEM" {{ old('ormawa') == 'BEM' ? 'selected' : '' }}>BEM</option>
                        <option value="HMTI" {{ old('ormawa') == 'HMTI' ? 'selected' : '' }}>HMTI</option>
                    </select>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="btn">Registrasi</button>
            </form>
        </div>

        {{-- TOGGLE PANEL --}}
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hallo, Welcome!</h1>
                <p>Belum Punya Akun?</p>
                <button class="btn register-btn">Registrasi</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Sudah Punya Akun?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        const jurusanSelect = document.getElementById('jurusan');
        const prodiSelect = document.getElementById('program_studi');

        const dataProdi = {
            "Manajemen Bisnis": [
                "Akuntansi",
                "Akuntansi Manajerial",
                "Administrasi Bisnins Terapan",
                "Logistik Perdagangan Internasional"
            ],
            "Teknik Informatika": [
                "Teknik Informatika",
                "Rekayasa Perangkat Lunak",
                "Geomatika",
                "Animasi",
                "Teknologi Rekayasa Multimedia",
                "Rekayasa Keamanan Siber",
                "Teknik Komputer",
                "Teknologi Permainan"
            ],
            "Teknik Elektro": [
                "Teknik Listrik",
                "Teknik Telekomunikasi"
            ],
            "Teknik Mesin": [
                "Teknik Mesin",
                "Teknik Perawatan Pesawat Udara",
                "Teknologi Rekayaksa Konstruksi Perkapal",
                "Rekayasa Pengelasan dan Fabrikasi",
                "Program Profesi Insinyur",
                "Teknologi Rekayasa Metalurgi",
            ]
        };

        jurusanSelect.addEventListener('change', function () {
            const jurusan = this.value;

            prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';

            if (dataProdi[jurusan]) {
                dataProdi[jurusan].forEach(function (prodi) {
                    const option = document.createElement('option');
                    option.value = prodi;
                    option.textContent = prodi;
                    prodiSelect.appendChild(option);
                });
            }
        });

    </script>


</body>

</html>
