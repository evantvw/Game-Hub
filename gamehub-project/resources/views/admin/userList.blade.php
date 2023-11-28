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
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>[ID] Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>

                @foreach ($user as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>[{{ $row['userID'] }}] {{ $row['fullname'] }} @if ($row['userRole'] == 'A')
                            <i class="fa-solid fa-code color-gray1"></i>
                        @endif</td>
                        <td>{{ $row['email'] }}</td>
                        <td>{{ $row['phonenumber'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
