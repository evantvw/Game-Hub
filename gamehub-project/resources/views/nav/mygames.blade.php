@section('title','My Games')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    @include('nav.navigation')
    <section>
        <div class="page_title color-white">
        </div>
        <div class="container-i3">
            @foreach ($data as $row)

            @if ($row['done'] == 1)
                @continue
            @endif
            <a href="/games/{{$row['gameID']}}" class="column-i3 color-white" >
                <div class="cover"> <img src="{{ $row['linkCover'] }}"> </div>
                <div class="name" > {{ $row['gameName'] }} </div>
                <div class="dev color-nd"> {{ $row['gameDeveloper'] }} </div>
                <div class="platform">{{ $row['gamePlatform'] }}</div>
            </a>
            @endforeach

            @foreach ($data as $row)
            @if ($row['done'] == 0)
                @continue
            @endif
            <a href="/games/{{$row['gameID']}}"class="column-i3 color-white">
                <div class="cover completed">
                    <i class="fa-solid fa-check color-nd"></i>
                    <img src="{{ $row['linkCover'] }}">
                </div>
                <div class="name" > {{ $row['gameName'] }} </div>
                <div class="dev color-nd"> {{ $row['gameDeveloper'] }} </div>
                <div class="platform">{{ $row['gamePlatform'] }}</div>
            </a>
            @endforeach
            <a href="/home#browse" class="column-i3">
                <div class="browsebox">+ BROWSE MORE</div>
            </a>
        </div>
    </section>

</x-app-layout>
