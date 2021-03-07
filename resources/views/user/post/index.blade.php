<h1>Tambah post</h1>
<a href="{{route('user.post.create')}}">tambah baru</a>
<hr>

@foreach($posts as $post)
@if($post->creator->id == auth()->user()->id)
<a href="{{route('user.post.edit', ['post' => $post->slug])}}">Edit postingan</a>
<form action="{{route('user.post.destroy', ['post' => $post->slug])}}" method="post">
@csrf
@method('DELETE')
<button type="submit">Hapus post</button>
</form>
@endif
<br>
tag :
@foreach($post->tags as $tag)
{{$tag->name}}
@endforeach <br>
judul : {{$post->title}} <br>
konten : {{Str::words($post->content, 5, '...')}} <br>
dibuat oleh : {{$post->creator->name}} <br>
dibuat tanggal: {{\Carbon\Carbon::parse($post->created_at)->isoFormat('dddd, D MMMM Y')}}, {{$post->created_at->diffForHumans()}} <br>
Jumlah komen : {{$post->comments->count()}} <br>
Jumlah like : {{$post->reacts->where('type', 'like')->count()}} <br>
Jumlah dislike : {{$post->reacts->where('type', 'dislike')->count()}} <br>
link : <a href="{{route('user.post.show', ['post' => $post])}}">lihat</a>
<hr>
@endforeach