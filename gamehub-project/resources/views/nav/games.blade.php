@section('title', 'Game Details')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithoutfooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noscroll.css') }}">
    @include('nav.navigation')
    <div class="page_title color-white"></div>
        <div class="gameDetail color-white">
            <div class="gameHeader">
                <div class="gameIcon"><img src="{{ $data['linkCover'] }}"></div>
                <div class="gameTitle">
                    <div class="gameName">{{ $data['gameName'] }}</div>
                    <div class="gameDev color-nd">{{ $data['gameDeveloper'] }}</div>
                    <div class="gameTag">
                        <div class="row">{{ $data['gameGenre'] }}</div>
                        <div class="cb">break</div>
                        <div class="row">{{ $data['gamePlatform'] }}</div>
                        <div class="cb">break</div>
                        <div class="row"> {{ $data['gameRating'] }} </div>
                    </div>
                    <div class="column">
                        <span class="buttons">
                            @if ($count > 4)
                            <i class="fa-solid fa-face-smile"></i>
                            @elseif ($count > 2)
                            <i class="fa-solid fa-face-meh"></i>
                            @else
                            <i class="fa-solid fa-face-frown"></i>
                            @endif
                            <span class="score">{{$count}}</span>

                            @if (count($saved) != 0)
                            <a href="/games/{{$id}}/hapus_game"><i class="fa-solid fa-bookmark color-nd s"></i></a>
                            @else
                            <a href="/games/{{$id}}/tambah_game"><i class="fa-regular fa-bookmark color-white"></i></a>
                            @endif
                            <i class="fa-solid fa-check
                            @if (count($saved) != 0)
                                @if ($rating['done'] == 1)
                                    color-nd
                                @endif
                            @endif"

                            @if (count($saved) != 0)
                                @if ($rating['done'] == 0)
                                    id="done"
                                @endif
                            @endif></i>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="descriptions">
                <div class="trailer">
                    <iframe
                    class="flex-trailer"
                    src="{{ $data['linkTrailer'] }}">
                    </iframe>
                </div>
                <div class="gameDesc">
                    <h1>About Game</h1>
                    <div class="desc">
                        {{ $data['gameDesc'] }}
                    </div>
                    @if (count($saved) != 0)
                    <div class="rating">
                        Game Rating
                    </div>
                    <br>
                    <form action="/games/{{$id}}/addrating" method="post">
                        @csrf
                        <div class="rating-button">
                            <input class="rate-input" type="radio" name="rate" id="1" value='1' @if ($rating['score'] == 1)
                                checked
                            @endif>
                            <label for="1">1</label>
                            <input class="rate-input" type="radio" name="rate" id="2" value='2' @if ($rating['score'] == 2)
                            checked
                        @endif>
                            <label for="2">2</label>
                            <input class="rate-input" type="radio" name="rate" id="3" value='3' @if ($rating['score'] == 3)
                            checked
                        @endif>
                            <label for="3">3</label>
                            <input class="rate-input" type="radio" name="rate" id="4" value='4' @if ($rating['score'] == 4)
                            checked
                        @endif>
                            <label for="4">4</label>
                            <input class="rate-input" type="radio" name="rate" id="5" value='5' @if ($rating['score'] == 5)
                            checked
                        @endif>
                            <label for="5">5</label>
                            <br>
                            <input class="submit-rating" type="submit" value="Rate Game">
                        </div>
                    </form>
                    @endif
                </div>
            </div>

        </div>

        <div class="modal" id="modals">
            <div class="modal_container" id="modal-container">
                <div class="modal_content">
                    <div class="modal_title">
                        <h1>Game Completed?</h1>
                    </div>
                    <div class="modal_desc">
                        <p>Game will be permanently marked as complete</p>
                    </div>

                    <button class="cancel">
                        Nope
                    </button>

                    <button class="save">
                        <a href="/games/{{$id}}/game_completed" style="text-decoration: none; color: #eee">
                            Yes
                        </a>
                    </button>
                </div>

            </div>
        </div>

        <script>
            var modal = document.getElementById("modals");
            var btn = document.getElementById("done");
            var close = document.getElementsByClassName("cancel")[0];
            var content = document.getElementById("modal-container");

            btn.onclick = function() {
              modal.style.display = "block";
              content.classList.add('open-modal');
            }

            close.onclick = function() {
              modal.style.display = "none";
            }

            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
        </script>
</x-app-layout>
