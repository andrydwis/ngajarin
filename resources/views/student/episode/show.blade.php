@extends('layouts.student.app-new')
@section('content')
<section class="bg-gray-100">

    @if($episode->type === 'video')
    <div class="w-full shadow-lg bg-gradient-to-b from-primary to-primary-lighter">
        <div class="flex items-center mx-auto">
            <div class="w-full h-[75vh]">
                <iframe class="w-full h-full mx-auto" src="https://www.youtube.com/embed/{{$episode->link}}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    @endif

    <div class="flex px-5 pt-10 lg:px-20">
        <a href="{{route('student.course.show', ['course' => $course->slug])}}" class="text-base border-none btn btn-outline-primary ">
            <i class="mr-1 text-sm fas fa-chevron-left"></i> Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 gap-5 px-5 pt-5 pb-20 space lg:gap-10 lg:px-20 md:grid-cols-3">

        <div class="mb-5 md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Deskripsi - {{$episode->title}}</h6>
                </div>

                <div class="prose card-body">
                    {!! $episode->description !!}
                </div>

            </div>
            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Lampiran</h6>
                </div>

                <div class="flex justify-center mx-auto card-body">

                    <button>
                        @if($episode->file)
                        <a href="{{$episode->file}}">
                            <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                <div class="grid gap-1">
                                    <i class="text-4xl fas fa-file"></i>
                                    <span class="text-sm text-gray-400">Klik untuk mengunduh</span>
                                </div>
                            </div>
                        </a>
                        @else
                        <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 cursor-not-allowed hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                            <div class="grid gap-1">
                                <i class="mb-2 text-4xl fas fa-times"></i>
                                <span class="text-sm text-gray-400">Tidak ada berkas lampiran</span>
                            </div>
                        </div>
                        @endif
                    </button>

                </div>

            </div>
        </div>



        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List Episode</h6>
                </div>

                <div class="overflow-y-scroll max-h-[45vh]">
                    @foreach($course->episodes as $episode)
                    <x-student.index-episode :slug="$episode->slug" :course="$course->slug" :title="$episode->title" :type="$episode->type" :description="$episode->description" :link="$episode->link" :course="$course" :submission="$episode->submission">
                        <x-slot name="episode">
                            <span>{{$loop->index + 1}}</span>
                        </x-slot>
                    </x-student.index-episode>
                    @endforeach
                </div>

            </div>

            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List Submission</h6>
                </div>
                <div class="overflow-y-scroll max-h-[45vh]">
                    @foreach($course->submissions as $submission)
                    <x-student.index-submission :slug="$submission->slug" :course="$course->slug" :title="$submission->title" :task="$submission->task" :file="$submission->file" :sub="$submission">
                        <x-slot name="submission">
                            {{$loop->index + 1}}
                        </x-slot>
                    </x-student.index-submission>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</section>
@endsection

@section('customCSS')
@endsection

@section('customJS')

@endsection