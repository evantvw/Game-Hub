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
    <title>GameHub - Reset Password</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    <div class="gamehub">
        GAME<span class='color-nd'>HUB</span>
    </div><br>
    <div class="center">
        <br>
        <b><h1>Reset Password</h1></b>
        <div class="color-error text-center">
            {{ session()->has('msg') ? session()->get('msg') : ''}}
        </div>
        <form action="/reset_password/process" method="POST">
            @csrf
            <input type="text" name="email" value="{{$email['email']}}" hidden>
            <input type="text" name="token" value="{{$token}}"          hidden>
            <div class="txt_field">
                <input type="password" name="password" id="password" minlength="8" required>
                <span class="eye">
                    <i class="fa fa-eye" aria-hidden="true" id="eyea" onclick="togglea()"></i>
                </span>
                <span>
                </span>
                <label for="password">Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confirmpassword" id="confirmpassword" minlength="8" required>
                <span class="eye">
                    <i class="fa fa-eye" aria-hidden="true" id="eyeb" onclick="toggleb()"></i>
                </span>
                <span>
                </span>
                <label for="password">Confirm Password</label>
            </div>

            <script>
                var state_a=false;
                var state_b=false;
                function togglea(){
                    if(state_a) {
                        document.getElementById("password").setAttribute("type","password");
                        document.getElementById("eyea").classList.remove("fa-eye-slash");
                        document.getElementById("eyea").classList.add("fa-eye");
                        state_a = false;
                    } else {
                        document.getElementById("password").setAttribute("type","text");
                        document.getElementById("eyea").classList.add("fa-eye-slash");
                        document.getElementById("eyea").classList.remove("fa-eye");
                        state_a = true;
                    }
                }
                function toggleb(){
                    if(state_b) {
                        document.getElementById("confirmpassword").setAttribute("type","password");
                        document.getElementById("eyeb").classList.remove("fa-eye-slash");
                        document.getElementById("eyeb").classList.add("fa-eye");
                        state_b = false;
                    } else {
                        document.getElementById("confirmpassword").setAttribute("type","text");
                        document.getElementById("eyeb").classList.add("fa-eye-slash");
                        document.getElementById("eyeb").classList.remove("fa-eye");
                        state_b = true;
                    }
                }
                </script>
                <br>
                <input class="submit" type="submit" value="Confirm">
                <br><br>
        </form>
    </div>
</body>
</html>
