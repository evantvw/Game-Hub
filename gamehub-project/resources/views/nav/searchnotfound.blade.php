@section('title','Search Result')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noscroll.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/error.css') }}"> --}}
    @include('nav.navigation')
    <div class="searchbar">
        <form action="/search" method="POST">
            @csrf
            <input type="text" name="search" id="search" value="{{$result}}" autocomplete="off" maxlength="100">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search </button>
        </form>
    </div>

    {{-- <div class="search-result color-white">Search Result for "{{$result}}"</div> --}}

    <div class="container-searchfail color-white">
        <i class="fa-solid fa-face-sad-tear"></i>
        <div class="text">
            <h3>No Game Found</h3>
            <h4>We couldn't find your search for "{{$result}}", check your input or <a href="mailto:contact.gamehub@gmail.com">contact us</a> for game request</h4>

        </div>
    </div>
</x-app-layout>
