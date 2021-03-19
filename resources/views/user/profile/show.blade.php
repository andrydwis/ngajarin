<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{$user->name}} <br>
    {{$user->email}} <br>
    {{$user->email_verified_at->diffForHumans()}} <br>
    {{$user->phone}} <br>
    <hr>
    detail <br>
    @if($user->detail)
    {{$user->detail->photo}} <br>
    {{$user->detail->biodata}} <br>
    {{$user->detail->facebook}} <br>
    {{$user->detail->twitter}} <br>
    {{$user->detail->instagram}} <br>
    {{$user->detail->github}} <br>
    {{$user->detail->linkedin}}
    @else
    anda belum melengkapi detail profil anda <br>
    @endif
    <a href="{{route('user.profile.edit')}}">update detail</a>
</body>
</html>