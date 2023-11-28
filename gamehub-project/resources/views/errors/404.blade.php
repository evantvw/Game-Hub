<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/error.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}"> --}}
        <script src="https://kit.fontawesome.com/536e5435ef.js" crossorigin="anonymous"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        </style>
    <title>GameHub - ERROR[404]</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    <div class="container color-white">
        <i class="fa-solid fa-face-sad-tear"></i>
        <div class="text">
            <h3> <span class="color-nd">404</span> | PAGE NOT FOUND</h3>
            <h4>Sorry, the page you requested could not be found. Please <a href="{{asset('home')}}">go back</a> to the homepage</h4>
            <br>
            <a href="{{asset('home')}}"><button class="error-button">Go Home</button></a>

        </div>
    </div>
</body>
</html>
