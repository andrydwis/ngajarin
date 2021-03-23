<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>JUmlah submission yang diterima</h1>
    <p>{{$submissionUsersAccepted->count()}}</p>
    @foreach($submissionUsersAccepted as $submissionUserAccepted)
    <p>sub dari {{$submissionUserAccepted->user->name}}</p>
    <p>status ; {{$submissionUserAccepted->status}}</p>
    @endforeach
</body>
</html>