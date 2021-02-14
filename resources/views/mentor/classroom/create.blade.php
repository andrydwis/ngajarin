@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="card-header">
                <h6 class="h6">Tambahkan Kelas Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{route('mentor.classroom.create')}}" method="post">
                    @csrf

                    <div class="grid grid-cols-1 gap-0 md:gap-6 sm:grid-cols-2">

                        <div class="col-span-1 sm:col-span-2">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" name="nama" id="nama" class="form-input py-2 mt-2 block w-full @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                            @error('nama')
                            <div class="alert alert-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="tahun">Tahun</label>
                            <input type="number" name="tahun" id="tahun" class="form-input py-2 mt-2 block w-full @error('tahun') is-invalid @enderror" value="{{old('tahun')}}">
                            @error('tahun')
                            <div class="alert alert-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="semester">Semester</label>
                            <input type="number" name="semester" id="semester" class="form-input py-2 mt-2 block w-full @error('semester') is-invalid @enderror" value="{{old('semester')}}">
                            @error('semester')
                            <div class="alert alert-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 py-5">
                        <button type="submit" class="btn-bs-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection