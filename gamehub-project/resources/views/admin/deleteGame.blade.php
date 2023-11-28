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
        Delete this game from GameHub?
        <table>
            <thead>
                <tr>
                    <th>Game</th>
                    <th>{{$data['gameID']}} - {{$data['gameName']}}</th>
                </tr>
            </thead>
            <tbody class="tblDel">
                <tr>
                    <td>Game Developer</td>
                    <td>{{$data['gameDeveloper']}}</td>
                </tr>
                <tr>
                    <td>Game Release Date</td>
                    <td>{{$data['gameRelease']}}</td>
                </tr>
                <tr>
                    <td>Game Description</td>
                    <td>{{$data['gameDesc']}}</td>
                </tr>
                <tr>
                    <td>Game Platform</td>
                    <td>{{$data['gamePlatform']}}</td>
                </tr>
                <tr>
                    <td>Game Genre</td>
                    <td>{{$data['gameGenre']}}</td>
                </tr>
                <tr>
                    <td>Game Rating (ESRB)</td>
                    <td>{{$data['gameRating']}}</td>
                </tr>
            </tbody>
        </table>
        <div class="buttons">
            <a href="javascript:history.back()">
                <button id="cancel">Cancel</button>
            </a>
            <a href="/admin/delete/{{$data['gameID']}}/process">
                <button id="confirm">Confirm</button>
            </a>
        </div>
    </div>
</body>
</html>
