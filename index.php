<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(jaehyun.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100; 
        }

        .navigasi {
            display: flex;
            align-items: center;
        }

        .navigasi a {
            position: relative;
            font-size: 1.1em;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            margin-left: 40px;
        }

        .navigasi a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 3px;
            background: #fff;
            border-radius: 5px;
            transform-origin: right;
            transform: scaleX(0);
            transition: transform .5s;
        }

        .navigasi a:hover::after{
            transform-origin: left;
            transform: scaleX(1);
        }

        .navigasi .btnLogin-popup{
            width: 130px;
            height: 50px;
            background: transparent;
            border: 2px solid #fff;
            outline: none;
            border-radius:  6px;
            cursor: pointer;
            font-size: 1.1em;
            color: #fff;
            font-weight: 500;
            margin-left: 40px;
            transition: .5s;
        }

        .navigasi .btnLogin-popup:hover {
            background: #fff;
            color:rgb(8, 8, 8);
        }

        .wrapper {
            position: relative; 
            width: 400px;
            height: 440px;
            background: transparent;
            border: 2px solid rgb(8, 8, 8);;  
            border-radius: 15px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, .5);;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; 
            margin-top: 100px;
            transform: scale(0);
            transition: transform .5s ease, height .2 ease;
        }

        .wrapper.active-popup {
            transform: scale(1);
        }

        .wrapper.active {
            height: 520px;
        }

        .wrapper .form-box {
            width: 100%;
            padding: 40px;
        }

        .wrapper .form-box.login {
            transition: transform .18s ease;
            transform: translateX(0);
        }

        .wrapper.active .form-box.login {
            transform: translateX(-400px);
        }

        .wrapper .form-box.register {
            position: absolute;
            transition: transform .18s ease;;
            transform: translateX(400px);
        }

        .wrapper.active .form-box.register {
            transform: translateX(0);
        }

        .wrapper .icon-close {
            position: absolute;
            top: 0;
            right: 0;
            width: 45px;
            height: 45px;
            background:rgb(8, 8, 8);;
            font-size: 2em;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom-left-radius: 20px;
            cursor: pointer;
            z-index: 1;
        }

        .form-box h2 {
            font-size: 2em;
            color:rgb(8, 8, 8);;
            text-align: center;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid rgb(8, 8, 8);;
            margin: 30px 0;
            display: flex;
            align-items: center;
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            border-bottom: 2px solid rgb(8, 8, 8)3;
            margin: 30px 0;
            display: flex;
            align-items: center;
        }

        .input-box .icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5em;
            color: rgb(8, 8, 8);;
            pointer-events: none;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: rgb(8, 8, 8);
            font-weight: 600;
            padding: 10px 40px 10px 5px; /* Tambah padding agar tidak terlalu mepet */
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: rgb(8, 8, 8);
            font-weight: 500;
            pointer-events: none;
            transition: 0.5s ease-in-out;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: -10px;
            font-size: 0.85em;
            color: rgb(8, 8, 8);
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: rgb(8, 8, 8);
            font-weight: 600;
            padding: 0 35px 0 5px;
        }

        .input-box icon{
            position: absolute;
            right: 8px;
            font-size: 1.2em;
            color: rgb(8, 8, 8);
            line-height: 57px;
        }

        .remember-forgot {
            font-size: .9em; 
            color: rgb(8, 8, 8);
            font-weight: 500;
            margin: -15px 0 15px;
            display: flex;
            justify-content: space-between; 
        }

        .remember-forgot label input {
            accent-color: rgb(8, 8, 8);
            margin-right: 3px;
        }

        .remember-forgot a {
            color: rgb(8, 8, 8);
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: rgb(8, 8, 8);
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: #fff;
            font-weight: 500;
        }

        .login-register {
            font-size: .9em;
            color: rgb(8, 8, 8);
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }

        .login-register p a {
            color: rgb(8, 8, 8);
            text-decoration: none;
            font-weight: 600;
        }

        .login-register p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <header>

        <nav class="navigasi">
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>

        <!-- Form Login -->
        <div class="form-box login">
            <h2>Login</h2>
            <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") { ?>
                <p style="color: red;">Email atau password salah!</p>
            <?php } ?>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <!-- Form Register -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    
</body>
</html>
