@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Tag</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.tag.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                        @error('nama')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror">
                        @error('icon')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
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