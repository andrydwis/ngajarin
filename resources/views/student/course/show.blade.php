@extends('layouts.student.app-new')
@section('content')
<section class="bg-gray-100">

    <div class="w-full bg-gradient-to-b from-primary to-primary-lighter ">
        <div class="container flex flex-col items-center px-5 pt-10 mx-auto pb-14 md:flex-row">
            <div class="flex flex-col items-center mb-16 text-center text-white lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:items-start md:text-left md:mb-0">
                <div class="flex flex-wrap my-5">
                    @foreach($course->tags as $tag)
                    @if(in_array($tag->id, $course->tags->pluck('id')->toArray()))
                    <div class="py-2 mx-1 md:py-0">
                        <button class="px-2 py-2 tracking-tight text-white capitalize bg-indigo-800 rounded-lg shadow-xl hover:bg-primary-darker">
                            {{ $tag->name }}
                        </button>
                    </div>
                    @endif
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
                    <button class="inline-flex px-6 py-2 text-lg bg-gray-100 border-0 rounded text-primary focus:outline-none hover:bg-gray-200">
                        Mulai Course
                    </button>
                </div>
            </div>
            <div class="w-5/6 lg:max-w-lg lg:w-full md:w-1/2">
                <img class="object-cover object-center w-full h-full rounded-lg shadow-xl" alt="hero" src="{{$course->thumbnail}}">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-10 px-5 pt-10 pb-20 md:px-20 md:grid-cols-3">

        <div class="md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List episode {{$course->title}}</h6>
                </div>
                <div class="prose card-body">
                    otw index episode & submission
                    <br>
                    <ul>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Course serupa</h6>
                </div>
                <div class="prose card-body">
                    otw list course dengan tag yang sama
                    <br>
                    <ul>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                    </ul>
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