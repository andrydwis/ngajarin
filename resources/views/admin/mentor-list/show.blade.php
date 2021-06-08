@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between items-center card-header">
                <h4 class="h6">Detail Mentor</h4>
                <a href="{{route('admin.mentor-list.index')}}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="p-8">
                <p>Mentor <b>{{$user->name}}</b> telah membuat <b>{{$courses->count()}} Kursus</b></p>
                <p>Mentor <b>{{$user->name}}</b> telah membuat <b>{{$classrooms->count()}} Kelas</b></p>
                <br>
                <p>Daftar Kursus yang dibuat :</p>
                <ul>
                    @foreach($courses as $course)
                    <li><p>{{$loop->index+1}}. {{$course->title}}, Total Mahasiswa Bergabung = {{$course->users->count()}}</p></li>
                    @endforeach
                </ul>
                <br>
                <p>Daftar Kelas yang dibuat :</p>
                <ul>
                    @foreach($classrooms as $classroom)
                    <li><p>{{$loop->index+1}}. {{$classroom->classroom->name}}, Total Mahasiswa Bergabung = {{$classroom->classroom->members->count()-1}}</p></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection