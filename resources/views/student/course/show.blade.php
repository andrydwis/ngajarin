@extends('layouts.student.app-new')
@section('content')
<section class="bg-gray-100">

    <div class="w-full bg-gradient-to-b from-primary to-primary-lighter ">
        <div class="container flex flex-col items-center px-5 pt-10 mx-auto pb-14 md:flex-row">
            <div class="flex flex-col items-center mb-16 text-center text-white lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:items-start md:text-left md:mb-0">
                <div class="flex flex-wrap my-5">
                    @foreach($course->tags as $tag)
                    <div class="py-2 mx-1 md:py-0">
                        <button class="px-2 py-2 tracking-tight text-white capitalize bg-indigo-800 rounded-lg shadow-xl hover:bg-primary-darker">
                            {{ $tag->name }}
                        </button>
                    </div>
                    @endforeach
                </div>
                <h1 class="mb-2 text-3xl font-semibold sm:text-5xl">
                    {{ $course->title }}
                </h1>
                <h4 class="mb-4 text-xl font-semibold sm:text-xl">
                    Level : {{$course->level}}
                </h4>
                <div class="mb-8">
                    <p class="leading-relaxed prose text-white">
                        {{ $course->description }}
                    </p>
                </div>
                <div class="flex justify-center">
                    @if(in_array(auth()->user()->id, $course->users->pluck('id')->toArray()))
                    @if($isFinished)
                    @if($course->certificate)
                    <form action="{{route('student.export-certicate', ['certificate' => $certificate])}}" method="post">
                        @csrf
                        <button class="inline-flex px-6 py-2 text-lg bg-white border-0 rounded text-primary focus:outline-none hover:bg-gray-200">
                            Cetak Sertifikat
                        </button>
                    </form>
                    @endif
                    @else
                    <button class="inline-flex px-6 py-2 text-lg bg-white border-0 rounded text-primary focus:outline-none hover:bg-gray-200">
                        Sudah Bergabung
                    </button>
                    @endif
                    @else
                    <form action="{{route('student.course-list.store', $course->slug)}}" method="post">
                        @csrf
                        <button class="inline-flex px-6 py-2 text-lg bg-white border-0 rounded text-primary focus:outline-none hover:bg-gray-200">
                            Mulai Course
                        </button>
                    </form>
                    @endif
                   
                </div>
            </div>
            <div class="w-5/6 lg:max-w-lg lg:w-full md:w-1/2">
                <img class="object-cover object-center w-full h-full rounded-lg shadow-xl" alt="hero" src="{{$course->thumbnail}}">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 px-5 pt-10 pb-20 space lg:gap-10 lg:px-20 md:grid-cols-3">


        <div class="mb-5 md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List episode {{$course->title}}</h6>
                </div>
                @if(in_array(auth()->user()->id, $course->users->pluck('id')->toArray()))
                <div class="">
                    @foreach($course->episodes as $episode)
                    <x-student.index-episode :slug="$episode->slug" :course="$course->slug" :title="$episode->title" :type="$episode->type" :description="$episode->description" :link="$episode->link" :course="$course" :submission="$episode->submission">
                        <x-slot name="episode">
                            <span>{{$loop->index + 1}}</span>
                        </x-slot>
                    </x-student.index-episode>
                    @endforeach
                </div>
                @else
                <div class="grid h-56 duration-100 bg-indigo-400 hover:bg-indigo-300 card-body place-items-center">
                    <i class="text-3xl text-white md:text-5xl fas fa-lock"></i>
                    <span class="-mt-16 text-lg text-center text-white md:text-xl">Anda belum tergabung pada course ini</span>
                </div>
                @endif
            </div>
        </div>



        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List Submission</h6>
                </div>
                @if(in_array(auth()->user()->id, $course->users->pluck('id')->toArray()))
                <div>
                    @foreach($course->submissions as $submission)
                    <x-student.index-submission :slug="$submission->slug" :course="$course->slug" :title="$submission->title" :task="$submission->task" :file="$submission->file" :sub="$submission">
                        <x-slot name="submission">
                            {{$loop->index + 1}}
                        </x-slot>
                    </x-student.index-submission>
                    @endforeach
                </div>
                @else
                <div class="grid h-56 duration-100 bg-indigo-400 hover:bg-indigo-300 card-body place-items-center">
                    <i class="text-3xl text-white md:text-5xl fas fa-lock"></i>
                    <span class="-mt-16 text-lg text-center text-white">Anda belum tergabung pada course ini</span>
                </div>
                @endif
            </div>

            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Course Serupa / Statistik</h6>
                </div>
                <div class="prose card-body">

                    <p>Jumlah mahasiswa yang ikut course ini: {{$course->users->count()}}</p>
                    <p>Jumlah episode: {{$course->episodes->count()}}</p>
                    <p>Jumlah submission: {{$course->submissions->count()}}</p>

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