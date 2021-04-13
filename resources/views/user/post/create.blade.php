<form action="{{route('user.post.store')}}" method="post">
@csrf
<label for="tag">Tag</label>
<select name="tag">
<option value="" selected disabled>Pilih tag</option>
@foreach($tags as $tag)
<option value="{{$tag->id}}">{{$tag->name}}</option>
@endforeach
</select>
<label for="judul">Judul</label>
<input type="text" name="judul" id="judul" value="{{old('judul')}}">
@error('judul')
{{$message}}
@enderror
<label for="konten">Konten</label>
<textarea name="konten" id="konten" cols="30" rows="10">{{old('konten')}}</textarea>
@error('konten')
{{$message}}
@enderror

<button type="submit">Posting</button>
</form>