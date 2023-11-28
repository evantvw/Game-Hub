@section('title','Home')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/homefooter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/stylehome.css') }}">

        <script src="https://kit.fontawesome.com/536e5435ef.js" crossorigin="anonymous"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        </style>
        <title>GameHub - @yield("title") </title>
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
    </head>
<body>

    @include('home.nav')

    <section class="section1">
        <div class="textcontainer">
            <h1>Welcome home gamers</h1>
            <h3>What will you be playing today?</h3>
        </div>
        <br>
        <br>
        <div class="searchbar">
            <form action="/search" method="POST">
                @csrf
                <input type="text" name="search" id="search" placeholder="Enter your game here" autocomplete="off" maxlength="100">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i><span class="button-text"> Search </span></button>
            </form>
        </div>
    </section>

    <section class="section2">
        <div class="container">
            <h2>Latest Release</h2>
            <div class="btn-sec-1">
                <button class="pre-btn" id="pre-btn"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="nxt-btn" id="nxt-btn"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <div class="game-container" id="game-container">
                @foreach ($gamenew as $row)
                <a href="/games/{{$row['gameID']}}">
                <div class="game-card">
                    <div class="game-img">
                        <img src="{{ $row['linkCover'] }}">
                    </div>

                    <div class="game-title color-white">
                        {{$row['gameName']}}
                    </div>

                    <div class="game-dev color-nd">
                        {{$row['gameDeveloper']}}
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section3">
        <div class="container">
            <h2>Top Rated Games</h2>
            <div class="btn-sec-2">
                <button class="pre-btn" id="pre-btn-2"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="nxt-btn" id="nxt-btn-2"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <div class="game-container" id="game-container-2">
                @foreach ($gamerec as $row)
                <a href="/games/{{$row['gameID']}}">
                <div class="game-card">
                    <div class="game-img">
                        <img src="{{ $row['linkCover'] }}">
                    </div>

                    <div class="game-title color-white">
                        {{$row['gameName']}}
                    </div>

                    <div class="game-dev color-nd">
                        {{$row['gameDeveloper']}}
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('home.footer')

    @if (session()->get('userRole') === 'A')
    <a href="/admin/addGame">
        <div class="admin-mode">
            <i class="fa-solid fa-wrench"></i>
        </div>
    </a>
    @endif
</body>
</html>

<script>
    const container = document.getElementById('game-container')
    const buttonleft = document.getElementById('pre-btn');
    const buttonright = document.getElementById('nxt-btn');
    let isDragStart = false, prevPageX, prevScrollLeft;

    const dragStart = (e) => {
        isDragStart = true;
        prevPageX = e.pageX;
        prevScrollLeft = container.scrollLeft;
    }

    const dragging = (e) => {
        if(!isDragStart) return;
        e.preventDefault();
        let positionDiff = e.pageX - prevPageX;
        container.scrollLeft = prevScrollLeft - positionDiff;
    }

    const dragStop = () => {
        isDragStart = false;
    }

    container.addEventListener("mousedown", dragStart);
    container.addEventListener("mousemove", dragging);
    container.addEventListener("mouseup", dragStop);

    buttonleft.onclick = function(){
        container.scrollLeft -=100;
    }

    buttonright.onclick = function(){
        container.scrollLeft +=100;
    }

    const container2 = document.getElementById('game-container-2');
    const buttonleft2 = document.getElementById('pre-btn-2');
    const buttonright2 = document.getElementById('nxt-btn-2');
    let isDragStart2 = false, prevPageX2, prevScrollLeft2;

    const dragStart2 = (e) => {
        isDragStart2 = true;
        prevPageX2 = e.pageX;
        prevScrollLeft2 = container2.scrollLeft;
    }

    const dragging2 = (e) => {
        if(!isDragStart2) return;
        e.preventDefault();
        let positionDiff2 = e.pageX - prevPageX2;
        container2.scrollLeft = prevScrollLeft2 - positionDiff2;
    }

    const dragStop2 = () => {
        isDragStart2 = false;
    }

    container2.addEventListener("mousedown", dragStart2);
    container2.addEventListener("mousemove", dragging2);
    container2.addEventListener("mouseup", dragStop2);

    buttonleft2.onclick = function(){
        document.getElementById('game-container-2').scrollLeft -=100;
    }

    buttonright2.onclick = function(){
        document.getElementById('game-container-2').scrollLeft +=100;
    }
</script>


