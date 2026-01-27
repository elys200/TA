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
   <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
    <div class="container">
        <div class="form-box login">
            <form action="">
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
            <form action="">
                <h1>Registrasi</h1>
                <div class="input-box">
                    <input type="text" placeholder="NIM" required>
                    <i class='bx  bx-user'></i>  
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Nama" required>
                    <i class='bx  bx-user'></i>  
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required> 
                    <i class='bx  bx-lock'></i> 
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Email" required>
                    <i class='bx  bx-user'></i>  
                </div>
                <button type="submit" class="btn">Registrasi</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                    <h1>Hello, welcome</h1>
                    <p>Dont have an account?</p>
                    <button class="btn register-btn">Registrasi</button>
            </div>
            <div class="toggle-panel toggle-right">
                    <h1>Welcome Back</h1>
                    <p>Alredy have an account?</p>
                    <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>