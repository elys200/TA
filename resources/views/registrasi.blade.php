<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Registrasi</h2>
                <input type="username" class="field" placeholder="username">
                <input type="password" class="field" placeholder="password"> 
                <input type="password" class="field" placeholder="password"> 
                <input type="password" class="field" placeholder="password"> 
                <input type="password" class="field" placeholder="password"> 
                <input type="password" class="field" placeholder="password"> 
                 <button class="btn">Registrasi</button>
                 <div class="tes">
                Sudah Punya Akun? 
                <a href="{{ route('login')}}">Login </a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
