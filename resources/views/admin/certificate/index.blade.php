@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                    Sertifikat <span class="hidden sm:inline">Course </span> {{$course->title}}
                </h6>
                @if(!$course->certificate)
                <a href="{{route('admin.course.certificate.create', $course->slug)}}" class="flex items-center ml-4 btn-bs-primary">Tambah Sertifikat</a>
                @else
                <button class="flex items-center ml-4 btn-bs-primary cursor-not-allowed disabled:opacity-50" disabled>Tambah Sertifikat</button>
                @endif
            </div>
            <div class="card-body">
                @if($course->certificate)
                template
                <a href="{{$course->certificate->template}}">download</a>
                <a href="{{route('admin.course.certificate.edit', ['course' => $course, 'certificate' => $course->certificate])}}">edit</a>
                @else
                <div class="flex justify-center">
                    <img src="{{asset('img/certificate.svg')}}" alt="" height="200px" width="200px">

                </div>
                <h1 class="text-base font-bold md:text-xl text-center">Anda belum mengupload template sertifikat untuk course ini</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection