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
                    <th>Email</th>
                    <th>Messages</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>

                @foreach ($data as $row)
                    <tr>
                        <td style="width: 30%">{{ $row['email_msg'] }} |
                            {{ $row['created_at'] }}</td>
                        <td>{{ $row['msg_content'] }}</td>
                        <td style="text-align: center"><a href="mailto: {{ $row['email_msg'] }}"><i class="fa-solid fa-reply"></i> Reply</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
