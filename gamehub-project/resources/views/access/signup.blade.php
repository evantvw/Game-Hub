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
    <title>GameHub - Sign Up</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    <div class="gamehub">
        GAME<span class='color-nd'>HUB</span>
    </div><br>
    <div class="center">
        <br>
        <b><h1>Sign up</h1></b>
        <div class="color-error text-center">
            {{ session()->has('msg') ? session()->get('msg') : ''}}
        </div>
        <form action="/signup/process" method="POST">
            @csrf
            <div class="txt_field">
                <input type="text" name="name" id="name" autocomplete="off" required>
                <span></span>
                <label for="name">Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phonenumber" id="phonenumber" autocomplete="off" required>
                <span></span>
                <label for="phonenumber">Phone Number</label>
            </div>
            <div class="txt_field">
                <input type="date"
                       name="DOB"
                       id="DOB"
                       autocomplete="off"
                       required>
                <span></span>
                <label for="DOB">Date Of Birth</label>
            </div>

            <div class="button_field">
                Gender <br><br>
                <input type="radio" name="gender" id="M" value="M">
                <label for="M">Male</label>
                <input type="radio" name="gender" id="F" value="F">
                <label for="F">Female</label>
                <input type="radio" name="gender" id="N" value="N">
                <label for="N">Rather Not Say</label>
            </div>

            <div class="txt_field">
                <input type="text" name="email" id="email" autocomplete="off" required>
                <span></span>
                <label for="email">Email</label>
            </div>
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

            <input class="submit" type="submit" value="Sign up">
            <br>
            <br>
            <div class="color-highlight">
                Click "Sign up" to agree to GameHub's <a href="TermOfService">Term of Service</a>  and acknowledge that GameHub's <a href="PrivacyPolicy">Privacy Policy</a> applies to you.
            </div>
            <br>
            <br>
        </form>
    </div>
</body>
</html>
