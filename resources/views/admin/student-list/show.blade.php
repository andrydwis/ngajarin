@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between items-center card-header">
                <h4 class="h6">Detail Mahasiswa</h4>
                <a href="{{route('admin.student-list.index')}}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="p-8">
                <p>Mahasiswa <b>{{$user->name}}</b> bergabung di <b>{{$courses->count()}} Kursus</b></p>
                <p>Mahasiswa <b>{{$user->name}}</b> bergabung di <b>{{$classrooms->count()}} Kelas</b></p>
                <br>
                <p>Daftar Kursus yang diikuti :</p>
                <ul>
                    @foreach($courses as $course)
                    <li><p>{{$loop->index+1}}. {{$course->title}}</p></li>
                    @endforeach
                </ul>
                <br>
                <p>Daftar Kursus yang telah diselesaikan :</p>
                <ul>
                    @foreach($finishedCourses as $course)
                    <li><p>{{$loop->index+1}}. {{$course}}</p></li>
                    @endforeach
                </ul>
                <br>
                <p>Daftar Kelas yang diikuti :</p>
                <ul>
                    @foreach($classrooms as $classroom)
                    <li><p>{{$loop->index+1}}. {{$classroom->classroom->name}}</p></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection