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
                <div class="flex flex-wrap ml-4">
                    <a href="{{route('admin.course.certificate.edit', ['course' => $course, 'certificate' => $course->certificate])}}" class="flex items-center text-center btn btn-primary">Edit Sertifikat</a>
                    <div x-data>
                        <form action="{{route('admin.course.certificate.destroy', ['course' => $course->slug, 'certificate' => $course->certificate])}}" method="post" class="hidden">
                            @csrf
                            @method('DELETE')
                            <button id="hapus-sertif" type="submit">
                                Hapus
                            </button>
                        </form>
                        <a href="#" @click.prevent="$('#hapus-sertif').click();" class="flex items-center btn btn-outline-primary ">Hapus</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="grid card-body place-items-center">
                @if($course->certificate)

                <a href="{{$course->certificate->template}}" class="w-auto md:w-1/3">
                    <div class="grid px-2 text-gray-600 bg-gray-100 border-2 border-gray-200 h-52 hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                        <div class="grid gap-1 place-items-center">
                            <i class="text-4xl fas fa-file"></i>
                            <span class="text-sm text-gray-400">Klik untuk mengunduh</span>
                        </div>
                    </div>
                </a>
                @else
                <div class="flex justify-center">
                    <img src="{{asset('img/certificate.svg')}}" alt="missing img" class="w-1/3 h-auto">
                </div>
                <h1 class="py-10 text-base font-semibold text-center md:text-xl">Anda belum mengupload template sertifikat untuk course ini</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection