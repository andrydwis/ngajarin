@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Tag</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.tag.update', ['tag' => $tag])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $tag->name}}">
                        @error('nama')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <img src="{{asset('storage/'.$tag->icon)}}" alt="" class="img-thumbnail">
                        <input type="file" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror">
                        @error('icon')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection