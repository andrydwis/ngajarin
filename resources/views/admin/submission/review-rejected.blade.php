<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>JUmlah submission yang ditolak</h1>
    <p>{{$submissionUsersRejected->count()}}</p>
    @foreach($submissionUsersRejected->take(3) as $submissionUserRejected)
    <p>sub dari {{$submissionUserRejected->user->name}}</p>
    <p>status ; {{$submissionUserRejected->status}}</p>
    @endforeach
</body>
</html>