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
                    <p class="leading-relaxed prose text-white break-all">

                        <!-- ini pake escape string -->
                        {-- !! $course->description !! --}

                        <!-- yang ini bukan escape string, tapi lebih rapi dan mudah diatur styling nya -->
                        {{ $course->description }}
                    </p>
                </div>
                <div class="flex justify-center">
                    @if(in_array(auth()->user()->id, $course->users->pluck('id')->toArray()))
                    <button class="inline-flex px-6 py-2 text-lg bg-gray-100 border-0 rounded text-primary focus:outline-none hover:bg-gray-200">
                        Sudah Bergabung
                    </button>
                    @else
                    <form action="{{route('student.course-list.store', $course->slug)}}" method="post">
                        @csrf
                        <button class="inline-flex px-6 py-2 text-lg bg-gray-100 border-0 rounded text-primary focus:outline-none hover:bg-gray-200">
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

    <div class="grid grid-cols-1 gap-10 px-5 pt-10 pb-20 md:px-20 md:grid-cols-3">

        @if(in_array(auth()->user()->id, $course->users->pluck('id')->toArray()))
        <div class="md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List episode {{$course->title}}</h6>
                </div>
                <div class="prose card-body">
                    otw index episode & submission
                    <br>
                    <p>episode</p>
                    @foreach($course->episodes as $episode)
                    <ul>
                        {{$course->title}}
                    </ul>
                    @endforeach
                    <p>submission</p>
                    @foreach($course->submissions as $submission)
                    <ul>
                        {{$submission->title}}
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <h1>kamu belum join course ini</h1>
        @endif


        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Course serupa</h6>
                </div>
                <div class="prose card-body">
                    statisitik
                    <br>
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
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- styling image holder -->
<style>
    div#holder img {
        height: 10rem !important;
        margin-top: 1rem;
    }
</style>
@endsection

@section('customJS')

@endsection