<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/access.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noscroll.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
    </style>
    <title>GameHub - Sign in</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    <div class="gamehub">
        GAME<span class='color-nd'>HUB</span>
    </div><br>
    <div class="center">
        <br>
        <b><h1>Sign in</h1></b>
        <div class="color-error text-center">
            {{ session()->has('msg') ? session()->get('msg') : ''}}
        </div>
        <div class="color-success text-center">
            {{ session()->has('msg2') ? session()->get('msg2') : ''}}
        </div>
        <form action="/signin_process" method="POST">
            @csrf
            <div class="txt_field">
                <input type="text" name="email" id="email" autocomplete="off" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" autocomplete="off" required>
                <span class="eye">
                    <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                </span>
                <span>
                </span>
                <label for="password">Password</label>
            </div>
            <script>
                var state=false;
                function toggle(){
                    if(state) {
                        document.getElementById("password").setAttribute("type","password");
                        document.getElementById("eye").classList.remove("fa-eye-slash");
                        document.getElementById("eye").classList.add("fa-eye");
                        state = false;
                    } else {
                        document.getElementById("password").setAttribute("type","text");
                        document.getElementById("eye").classList.add("fa-eye-slash");
                        document.getElementById("eye").classList.remove("fa-eye");
                        state = true;
                    }
                }
            </script>

            <div class="lupapass">
                <a href="/forgotPassword">Forgot Password?</a>
            </div>
            <input class="submit" type="submit" value="Sign in">
            <div class="color-highlight addmargin">
                Haven't registered yet? <a href="signup">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>
