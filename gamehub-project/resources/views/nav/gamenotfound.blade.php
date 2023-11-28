@section('title','My Games')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    @include('nav.navigation')
    <div class="page_title color-white"></div>
    <div class="container color-white">
        <i class="fa-solid fa-face-sad-tear"></i>
        <div class="text">
            <h3> <span class="color-nd">GAME</span> NOT FOUND</h3>
            <h4>It seems that you haven't saved any game, click <a href="{{asset('home')}}">Browse</a> to Search some games</h4>
            <br>
            <a href="/home"><button class="error-button">Browse</button></a>
        </div>
    </div>
</x-app-layout>
