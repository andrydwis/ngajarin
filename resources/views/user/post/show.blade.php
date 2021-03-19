<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    {{$post->title}} <br>

    {{$post->content}} <br>

    creator = {{$post->creator->name}} <br>

    dibuat tanggal: {{\Carbon\Carbon::parse($post->created_at)->isoFormat('dddd, D MMMM Y')}}, {{$post->created_at->diffForHumans()}} <br>
    diedit pada : {{\Carbon\Carbon::parse($post->updated_at)->isoFormat('dddd, D MMMM Y')}}. {{$post->updated_at->diffForHumans()}} <br>

    total like = {{count($post->likes())}} <br>
    total dislike = {{count($post->dislikes())}} <br>

    <form action="{{route('user.post.like', ['post' => $post->slug])}}" method="post">
        @csrf
        @if(in_array(auth()->user()->id, $post->likes()))
        <button type="submit">Unlike</button>
        @else
        <button type="submit">Like</button>
        @endif
    </form>
    <form action="{{route('user.post.dislike', ['post' => $post->slug])}}" method="post">
        @csrf
        @if(in_array(auth()->user()->id, $post->dislikes()))
        <button type="submit">Undislike</button>
        @else
        <button type="submit">Dislike</button>
        @endif
    </form>
    <hr>
    buat komen baru <br>
    <form action="{{route('user.post.comment.store', ['post' => $post->slug])}}" method="post">
        @csrf
        <textarea name="komentar" id="komentar" cols="30" rows="10">{{old('komentar')}}</textarea>
        @error('komentar')
        {{$message}}
        @enderror
        <button type="submit">Kirim</button>
    </form>
    <hr>
    ini komen
    @foreach($comments as $comment)
    <br>
    <hr>
    komen dari : {{$comment->creator->name}} <br>
    dibuat tanggal: {{\Carbon\Carbon::parse($comment->created_at)->isoFormat('dddd, D MMMM Y')}}, {{$comment->created_at->diffForHumans()}} <br>
    {{$comment->content}}<br>
    Jumlah like = {{count($comment->likes())}}<br>
    Jumlah dislike = {{count($comment->dislikes())}}<br>
    <form action="{{route('user.post.comment.like', ['comment' => $comment])}}" method="post">
        @csrf
        @if(in_array(auth()->user()->id, $comment->likes()))
        <button type="submit">Unlike</button>
        @else
        <button type="submit">like</button>
        @endif
    </form>
    <form action="{{route('user.post.comment.dislike', ['comment' => $comment])}}" method="post">
        @csrf
        @if(in_array(auth()->user()->id, $comment->dislikes()))
        <button type="submit">Undislike</button>
        @else
        <button type="submit">Dislike</button>
        @endif
    </form>
    @endforeach
</body>

</html>