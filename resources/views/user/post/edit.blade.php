<form action="{{route('user.post.update', ['post' => $post->slug])}}" method="post">
@csrf
@method('PATCH')
<label for="judul">Judul</label>
<input type="text" name="judul" id="judul" value="{{old('judul') ?? $post->title}}">
@error('judul')
{{$message}}
@enderror
<label for="konten">Konten</label>
<textarea name="konten" id="konten" cols="30" rows="10">{{old('konten') ?? $post->content}}</textarea>
@error('konten')
{{$message}}
@enderror

<button type="submit">Posting</button>
</form>