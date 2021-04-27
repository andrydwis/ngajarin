<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Sertifikat no seri : {{$serial_number}}</p>
    <p>status : {{$status}}</p>
    @if($certificate)
    <hr>
    <p>info sertif</p>
    <p>pemilik : {{$certificate->user->name}}</p>
    <p>course yang diambil : {{$certificate->certificate->course->title}}</p>
    <p>dicetak pada : {{$certificate->created_at}}</p>
    @endif
</body>

</html>