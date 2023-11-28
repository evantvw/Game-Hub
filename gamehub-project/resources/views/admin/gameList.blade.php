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
        <div class="color-error">
            {{ session()->has('msg') ? session()->get('msg') : ''}}
        </div>
        <div class="color-success">
            {{ session()->has('msg2') ? session()->get('msg2') : ''}}
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>[ID] Game</th>
                    <th>Developer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>

                @foreach ($games as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>[{{ $row['gameID'] }}] {{ $row['gameName'] }}</td>
                        <td>{{ $row['gameDeveloper'] }}</td>
                        <td class="action-col"style="text-align: center">
                            <div class="actions">
                                <a href="/games/{{ $row['gameID'] }}" target="_blank">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                                <a href="/admin/editgame/{{ $row['gameID'] }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="/admin/delete/{{ $row['gameID'] }}" id="delete">
                                    <i class="fa-solid fa-square-minus"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
