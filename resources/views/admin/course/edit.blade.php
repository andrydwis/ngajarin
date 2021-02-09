@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Course</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.course.update', ['course' => $course])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul') ?? $course->title}}">
                        @error('judul')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{old('deksripsi') ?? $course->description}}</textarea>
                        @error('deskripsi')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                            <option value="" @if(old('level')==null) selected @endif disabled>Pilih Level</option>
                            <option value="pemula" @if(old('level')=='pemula' ) selected @elseif($course->level=='pemula') selected @endif>Pemula</option>
                            <option value="menengah" @if(old('level')=='menengah' ) selected @elseif($course->level=='menengah') selected @endif>Menengah</option>
                            <option value="expert" @if(old('level')=='expert' ) selected @elseif($course->level=='expert') selected @endif>Expert</option>
                        </select>
                        @error('level')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <select name="tag[]" id="tag" class="form-control @error('tag') is-invalid @enderror" multiple>
                            <option value="" disabled>Pilih Tag</option>
                            @foreach($tags as $tag)
                            @if(in_array($tag->id, $course->tags->pluck('id')->toArray()))
                            <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                            @else
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class=" form-group">
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customCSS')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('customJS')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tag').select2();
    });
</script>
@endsection