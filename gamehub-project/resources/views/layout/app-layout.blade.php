<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar-items.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-items.css') }}">
    <script src="https://kit.fontawesome.com/536e5435ef.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
    </style>
    <title>GameHub - @yield("title") </title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

<body>
    {{ $slot }}
    {{-- {{$role = $request->session()->get('userRole')}} --}}
    @if (session()->get('userRole') === 'A')
    <a href="/admin/addGame">
        <div class="admin-mode">
            <i class="fa-solid fa-wrench"></i>
        </div>
    </a>
    @endif
</body>
