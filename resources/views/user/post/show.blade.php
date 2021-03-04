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

    dibuat pada : {{$post->created_at->diffForHumans()}} <br>
    diedit pada : {{$post->updated_at->diffForHumans()}} <br>

    total like = {{count($likes)}} <br>
    total dislike = {{count($dislikes)}} <br>

    <form action="{{route('user.post.like', ['post' => $post->slug])}}" method="post">
        @csrf
        @if(in_array(auth()->user()->id, $likes))
        <button type="submit">Unlike</button>
        @else
        <button type="submit">Like</button>
        @endif
    </form>

    <form action="{{route('user.post.dislike', ['post' => $post->slug])}}" method="post">
        @csrf
        @if(in_array(auth()->user()->id, $dislikes))
        <button type="submit">Undislike</button>
        @else
        <button type="submit">Dislike</button>
        @endif
    </form>

    ini komen
    @foreach($post->comments as $comment)
    <br>
    {{$comment->content}}
    @endforeach
</body>

</html>