<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>List Chat</h1>
    <hr>
    @foreach($conversations as $conversation)

    @php
    $latest = $conversation->replies->last()
    @endphp

    @if($conversation->userOne->id == auth()->user()->id)
    <h5>{{$conversation->userTwo->name}}</h5>
   

    @if($latest)
    <p>{{$latest->user->name}} : {{$latest->message}}</p>
    @endif

    <a href="{{route('user.chat.show', ['conversation' => $conversation])}}">Lihat</a>
    @else
    <h5>{{$conversation->userOne->name}}</h5>

    @if($latest)
    <p>{{$latest->user->name}} : {{$latest->message}}</p>
    @endif

    <a href="{{route('user.chat.show', ['conversation' => $conversation])}}">Lihat</a>
    @endif
    <hr>
    @endforeach
</body>

</html>