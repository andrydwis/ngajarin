@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                Sertifikat <span class="hidden sm:inline">Course </span> {{$course->title}}
                </h6>
                <a href="{{route('admin.course.certificate.create', $course->slug)}}" class="flex items-center ml-4 btn-bs-primary">Tambah Submission</a>
            </div>
            <div class="card-body">
            <!-- kasih keterangan apabila sudah ada sertifikat -->
            </div>
        </div>
    </div>
</div>
@endsection
