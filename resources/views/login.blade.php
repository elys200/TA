<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2> Login</h2>
                <input type="username" class="field" placeholder="username">
                <input type="password" class="field" placeholder="password">
                <div class="button">
                    <p> Login <p>
                </div>
                <div class="tes">
                    Belum Punya Akun?
                    <a href="{{ route('registrasi')}}">Registrasi</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
