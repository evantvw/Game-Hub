@section('title','Search Result')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    @include('nav.navigation')
    <div class="searchbar">
        <form action="/search" method="POST">
            @csrf
            <input type="text" name="search" id="search" value="{{$result}}" autocomplete="off" maxlength="100">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search </button>
        </form>
    </div>

    {{-- <div class="search-result color-white">Search Result for "{{$result}}"</div> --}}

    <div class="container-i3">
        @foreach ($data as $row)

        <a href="/games/{{$row['gameID']}}"class="column-i3 color-white" >
            <div class="cover"> <img src="{{ $row['linkCover'] }}"> </div>
            <div class="name" > {{ $row['gameName'] }} </div>
            <div class="dev color-nd"> {{ $row['gameDeveloper'] }} </div>
            <div class="platform">{{ $row['gamePlatform'] }}</div>
        </a>
        @endforeach
    </div>
</x-app-layout>
