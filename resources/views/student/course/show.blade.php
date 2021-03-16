@extends('layouts.student.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="card-header">
            <h6 class="h6">Detail Course {{$course->title}}</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="grid gap-6">
                    <div>
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-input py-2 mt-2 block w-full @error('judul') is-invalid @enderror" value="{{old('judul') ?? $course->title}}" readonly>
                        @error('judul')
                        <div class="alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-textarea deskripsi @error('deskripsi') is-invalid @enderror" readonly>{!! old('deskripsi') ?? $course->description !!}</textarea>
                        @error('deskripsi')
                        <div class="alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="thumbnail">Thumbnail</label>
                        <div class="mb-4">
                            <div id="holder" class="w-40 h-40" x-data>
                                <!-- <span>link : {{$course->thumbnail}} </span> -->
                                @if($course->thumbnail)
                                <div class="grid w-56 h-40 place-items-center">
                                    <img src="{{$course->thumbnail}}" alt="missing">
                                </div>
                                @else
                                <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 border-dashed hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                    <i class="text-4xl fas fa-camera"></i>
                                </div>
                                @endif
                            </div>
                        </div>
                        @error('thumbnail')
                        <div class="alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="level" class="block mb-2">Level</label>
                        <input type="text" class="block w-full py-2 mt-2 text-gray-500 capitalize cursor-not-allowed md:w-1/3 form-input" value="{{$course->level}}" disabled>
                    </div>
                    <div>
                        <label for="tag" class="block mb-2">Tag</label>
                        <select name="tag[]" id="tag" class="block w-full md:w-1/3 form-multiselect @error('tag') is-invalid @enderror" multiple disabled>
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
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('customCSS')
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- styling image holder -->
<style>
    div#holder img {
        height: 10rem !important;
        margin-top: 1rem;
    }
</style>
@endsection

@section('customJS')
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tag').select2();
        $('#level').select2();
    });
</script>
@endsection