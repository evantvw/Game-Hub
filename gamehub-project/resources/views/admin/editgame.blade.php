<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://kit.fontawesome.com/536e5435ef.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
    </style>
    <title>GameHub - ADMIN ONLY</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
    @include('admin.navbar')
    <div class="container">
        <form action="/admin/editGame/{{$data['gameID']}}/process" method="post" enctype="multipart/form-data">
            @csrf
            <label for="gameName">Game Name<br><input class="input-text" type="text" name="gameName" id="gameName" value="{{$data['gameName']}}" required></label>
            <label for="DevName">Developer Name <br><input class="input-text" type="text" name="DevName" id="DevName" value="{{$data['gameDeveloper']}}" required></label><br>
            <label for="GameRls">Game Release Date <br><input class="input-text" type="date" name="GameRls" id="GameRls" value="{{$data['gameRelease']}}" required></label><br>
            <label for="GameDesc">Game Description <br> <textarea name="GameDesc" id="GameDesc" cols="30" rows="10" class="desc" required>{{$data['gameDesc']}}</textarea></label>
            <div class="platform">
                <label class="title" for="platform[]">Game Platform</label> <br><br>
                <input type="checkbox" name="platform[]" id="PC" value="PC"
                @if (str_contains($data['gamePlatform'] , 'PC'))
                    checked
                @endif>
                <label class="input" for="PC">PC</label>
                <input type="checkbox" name="platform[]" id="ANDROID" value="ANDROID"
                @if (str_contains($data['gamePlatform'] , 'ANDROID'))
                    checked
                @endif>
                <label class="input" for="ANDROID">ANDROID</label>
                <input type="checkbox" name="platform[]" id="IOS" value="IOS"
                @if (str_contains($data['gamePlatform'] , 'IOS'))
                    checked
                @endif>
                <label class="input" for="IOS">IOS</label>
                <input type="checkbox" name="platform[]" id="SWITCH" value="SWITCH"
                @if (str_contains($data['gamePlatform'] , 'SWITCH'))
                    checked
                @endif>
                <label class="input" for="SWITCH">SWITCH</label>
                <br><br>
                <input type="checkbox" name="platform[]" id="PS4" value="PS4"
                @if (str_contains($data['gamePlatform'] , 'PS4'))
                    checked
                @endif>
                <label class="input" for="PS4">PS4</label>
                <input type="checkbox" name="platform[]" id="XBOXONE" value="XBOX ONE"
                @if (str_contains($data['gamePlatform'] , 'XBOX ONE'))
                    checked
                @endif>
                <label class="input" for="XBOXONE">XBOX ONE</label>
                <input type="checkbox" name="platform[]" id="PS5" value="PS5"
                @if (str_contains($data['gamePlatform'] , 'PS5'))
                    checked
                @endif>
                <label class="input" for="PS5">PS5</label>
                <br><br>
                <input type="checkbox" name="platform[]" id="XBOXXS" value="XBOX SERIES X|S"
                @if (str_contains($data['gamePlatform'] , 'XBOX SERIES X|S'))
                    checked
                @endif>
                <label class="input" for="XBOXXS">XBOX SERIES X|S</label>
                <input type="checkbox" name="platform[]" id="PS3" value="PS3"
                @if (str_contains($data['gamePlatform'] , 'PS3'))
                    checked
                @endif>
                <label class="input" for="PS3">PS3</label>
                <input type="checkbox" name="platform[]" id="XBOX360" value="XBOX 360"
                @if (str_contains($data['gamePlatform'] , 'XBOX 360'))
                    checked
                @endif>
                <label class="input" for="XBOX360">XBOX 360</label>
            </div>
            <br>

            <div class="genre">
                <label class="title" for="">Game Genre</label> <br><br>
                <input type="checkbox" name="genre[]" id="Action" value="Action" id="Action"
                @if (str_contains($data['gameGenre'], 'Action'))
                    checked
                @endif
                >
                <label class="input" for="Action">Action</label>
                <input type="checkbox" name="genre[]" id="Shooter" value="Shooter" id="Shooter"
                @if (str_contains($data['gameGenre'], 'Shooter'))
                    checked
                @endif
                >
                <label class="input" for="Shooter">Shooter</label>
                <input type="checkbox" name="genre[]" id="Sport" value="Sport" id="Sport"
                @if (str_contains($data['gameGenre'], 'Sport'))
                    checked
                @endif
                >
                <label class="input" for="Sport">Sport</label>
                <br><br>
                <input type="checkbox" name="genre[]" id="Roleplaying" value="Roleplaying" id="Roleplaying"
                @if (str_contains($data['gameGenre'], 'Roleplaying'))
                    checked
                @endif
                >
                <label class="input" for="Roleplaying">Roleplaying</label>
                <input type="checkbox" name="genre[]" id="Adventure" value="Adventure" id="Adventure"
                @if (str_contains($data['gameGenre'], 'Adventure'))
                    checked
                @endif
                >
                <label class="input" for="Adventure">Adventure</label>
                <input type="checkbox" name="genre[]" id="Fighting" value="Fighting" id="Fighting"
                @if (str_contains($data['gameGenre'], 'Fighting'))
                    checked
                @endif
                >
                <label class="input" for="Fighting">Fighting</label>
                <br><br>
                <input type="checkbox" name="genre[]" id="Racing" value="Racing" id="Racing"
                @if (str_contains($data['gameGenre'], 'Racing'))
                    checked
                @endif
                >
                <label class="input" for="Racing">Racing</label>
                <input type="checkbox" name="genre[]" id="Strategy" value="Strategy" id="Strategy"
                @if (str_contains($data['gameGenre'], 'Strategy'))
                    checked
                @endif
                >
                <label class="input" for="Strategy">Strategy</label>
                <input type="checkbox" name="genre[]" id="Family" value="Family" id="Family"
                @if (str_contains($data['gameGenre'], 'Family'))
                    checked
                @endif
                >
                <label class="input" for="Family">Family</label>
                <br><br>
                <input type="checkbox" name="genre[]" id="Casual" value="Casual" id="Casual"
                @if (str_contains($data['gameGenre'], 'Casual'))
                    checked
                @endif
                >
                <label class="input" for="Casual">Casual</label>
                <input type="checkbox" name="genre[]" id="Children" value="Children" id="Children"
                @if (str_contains($data['gameGenre'], 'Children'))
                    checked
                @endif
                >
                <label class="input" for="Children">Children</label>
                <input type="checkbox" name="genre[]" id="Arcade" value="Arcade" id="Arcade"
                @if (str_contains($data['gameGenre'], 'Arcade'))
                    checked
                @endif
                >
                <label class="input" for="Arcade">Arcade</label>
                <br><br>
                <input type="checkbox" name="genre[]" id="Flights" value="Flights" id="Flights"
                @if (str_contains($data['gameGenre'], 'Flights'))
                    checked
                @endif
                >
                <label class="input" for="Flights">Flights</label>
            </div>
            <br>
            <div class="rating">
                <label class="title" for="">Game Rated</label> <br><br>
                <input type="radio" name="rated" id="RP" value="RP"
                @if ($data['gameRating'] == 'RP')
                    checked
                @endif
                >
                <label class="input" for="RP">RP</label>
                <input type="radio" name="rated" id="E" value="E"
                @if ($data['gameRating'] == 'E')
                    checked
                @endif
                >
                <label class="input" for="E">E</label>
                <input type="radio" name="rated" id="T" value="T"
                @if ($data['gameRating'] == 'T')
                    checked
                @endif
                >
                <label class="input" for="T">T</label>
                <input type="radio" name="rated" id="E10" value="E10"
                @if ($data['gameRating'] == 'E10')
                    checked
                @endif
                >
                <label class="input" for="E10">E10</label>
                <br><br>
                <input type="radio" name="rated" id="M" value="M"
                @if ($data['gameRating'] == 'M')
                    checked
                @endif
                >
                <label class="input" for="M">M</label>
                <input type="radio" name="rated" id="AO" value="AO"
                @if ($data['gameRating'] == 'AO')
                    checked
                @endif
                >
                <label class="input" for="AO">AO</label>
                <input type="radio" name="rated" id="EC" value="EC"
                @if ($data['gameRating'] == 'EC')
                    checked
                @endif
                >
                <label class="input" for="EC">EC</label>
            </div>
            <br>

            <label for="gameTrailer">Game Trailer (Embeded Link)<br><input class="input-text" type="text" name="gameTrailer" id="gameTrailer" value="{{ $data['linkTrailer'] }}" required></label>
            <label for="gameTrailer">Game Cover Link<br><input class="input-text" type="text" name="gameCover" id="gameCover" autocomplete="off" value="{{ $data['linkCover'] }}" required></label>
            <br><br>
            <input type="submit" value="Edit Game">

        </form>
    </div>
</body>
</html>
