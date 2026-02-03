<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href='https://cdn.boxicons.com/3.0.4/fonts/basic/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form-box login">
            <form action="">
                {{-- @csrf --}}
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="NIM" required>
                    <i class='bx  bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx  bx-lock'></i>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <div class="form-box register">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('register')}}" method="POST">
                @csrf
                <h1>Registrasi</h1>
                <div class="input-box">
                    <input type="text" name="nim" placeholder="NIM" value="{{old('nim')}}">
                </div>
                <div class="input-box">
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}">
                </div>
                <div class="input-box">
                    <input type="text" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan')}}">
                </div>
                <div class="input-box">
                    <input type="text" name="program_studi" placeholder="Program Studi"
                        value="{{ old('program_studi')}}">
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email')}}">
                </div>
                <div class="input-box">
                    <select name="ormawa" required>
                        <option value="">Pilih Organisasi</option>
                        <option value="BEM" {{ old('ormawa') == 'BEM' ? 'selected' : '' }}>BEM</option>
                        <option value="HMTI" {{ old('ormawa') == 'HMTI' ? 'selected' : '' }}>HMTI</option>
                    </select>

                    <i class="bx bx-chevron-down"> </i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="passwod" required>
                </div>
                <button type="submit" class="btn">Registrasi</button>
            </form>
        </div>

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
</body>

</html>
