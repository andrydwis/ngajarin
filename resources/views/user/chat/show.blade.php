<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if($conversation->userOne->id == auth()->user()->id)
    <h1>{{$conversation->userTwo->name}}</h1>
    @else
    <h1>{{$conversation->userOne->name}}</h1>
    @endif
    <hr>

    @foreach($replies as $reply)
    <h5>{{$reply->user->name}}</h5>
    {{$reply->message}} <br>
    {{$reply->created_at->diffForHumans()}}
    <hr>
    @endforeach
    
    <form action="{{route('user.chat.store', ['conversation' => $conversation])}}" method="POST">
    @csrf
    <textarea name="pesan" id="" cols="30" rows="10">{{old('pesan')}}</textarea>
    <button type="submit">kirim</button>
    </form>
</body>

</html>