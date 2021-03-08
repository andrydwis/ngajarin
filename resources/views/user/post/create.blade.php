<form action="{{route('user.post.store')}}" method="post">
@csrf
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