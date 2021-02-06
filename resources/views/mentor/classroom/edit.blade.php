@extends('layouts.mentor.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Kelas</h4>
            </div>
            <div class="card-body">
                <form action="{{route('mentor.classroom.update', ['classroom' => $classroom])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $classroom->name}}">
                        @error('nama')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{old('tahun') ?? $classroom->year}}">
                        @error('tahun')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="number" name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" value="{{old('semester') ?? $classroom->semester}}">
                        @error('semester')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection