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
    <title>GameHub - Forgot Password</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    <div class="gamehub">
        GAME<span class='color-nd'>HUB</span>
    </div><br>
    <div class="center">
        <br>
        <b><h1>Forgot Password</h1></b>
        <div class="color-error text-center">
            {{ session()->has('msg') ? session()->get('msg') : ''}}
        </div>
        <div class="color-success text-center">
            {{ session()->has('msg2') ? session()->get('msg2') : ''}}
        </div>
        <form action="/forgotPassword/process" method="POST">
            @csrf
            <div class="txt_field">
                <input type="text" name="email" id="email" autocomplete="off" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            <input class="submit" type="submit" value="Send Verification">
            <br><br>
        </form>
    </div>
</body>
</html>
