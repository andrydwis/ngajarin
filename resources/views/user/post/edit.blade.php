<form action="{{route('user.post.update', ['post' => $post->slug])}}" method="post">
@csrf
@method('PATCH')
<select name="tag">
<option value="" disabled>Pilih tag</option>
@foreach($tags as $tag)
<option value="{{$tag->id}}" @if($tag->id == $post->tags->first()->id){{'selected'}}@endif>{{$tag->name}}</option>
@endforeach
</select>
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