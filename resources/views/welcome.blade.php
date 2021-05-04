@extends('layouts.student.app-new')
@section('content')

<!-- hero section -->
<section class="w-full px-3 antialiased bg-indigo-600 lg:section6">
    <div class="container min-h-screen mx-auto text-center py-28 sm:px-4">

        <h1 class="text-4xl font-semibold leading-10 tracking-tight text-white sm:text-4xl sm:leading-none md:text-5xl xl:text-6xl">
            <span class="block">Belajar <b>programming</b> tanpa ribet?</span>
            <div class="relative inline-block mt-3">
                belajar di <span class="font-bold">Ngajar.in!</span>
            </div>
        </h1>
        <div class="max-w-lg mx-auto mt-6 text-sm text-center text-gray-100 md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">gak usah bingung mulai belajar dari mana, tinggal pilih kursus nya, kami yang atur :) </div>

        <!-- pencarian -->
        <div class="relative flex items-center max-w-md mx-auto mt-12 overflow-hidden text-center rounded-full">
            <input type="text" name="search" placeholder="Mau belajar apa?" class="w-full h-12 px-6 py-2 font-medium text-gray-600 focus:outline-none">

            <span class="relative top-0 right-0 block">
                <button type="button" class="inline-flex items-center justify-center w-32 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out border border-transparent bg-primary-darker hover:bg-primary-lighter focus:outline-none active:bg-primary-darker">
                    Pencarian
                </button>
            </span>
        </div>
        <!-- end of pencarian -->

    </div>
</section>
<!-- end of hero section -->

<!-- recent course section -->
<section class="w-full py-20 bg-gray-100">
    <div class="container max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold tracking-tight text-center">Course Terbaru</h2>
        <p class="mt-2 text-lg text-center text-gray-600">Course terbaru milik kami yang selalu up to date dengan materi yang fresh</p>

        <div class="grid grid-cols-4 gap-8 px-6 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0 md:py-10">
            @foreach($recent_courses as $course)
            <div class="relative col-span-4 space-y-4 overflow-hidden duration-300 transform bg-white shadow-xl rounded-xl md:px-0 hover:-translate-y-2">
                <a href="{{route('student.course.show', ['course' => $course])}}" class="flex flex-col">
                    <img src="{{$course->thumbnail}}" alt="thumbnail" class="w-full rounded">
                    <div class="px-5 py-5">
                        <h4 class="text-lg font-medium text-gray-700 line-clamp-1">{{$course->title}}</h4>

                        <div class="flex py-2 mt-2 prose prose-indigo md:py-0">
                            @foreach($course->tags as $tag)
                            <span class="mr-2 text-sm font-semibold tracking-tight border-b-2 border-indigo-300 ">
                                {{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- end of recent course section -->

<!-- popular course section -->
<section class="w-full py-20 bg-white">
    <div class="container max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold tracking-tight text-center">Course Terpopuler</h2>
        <p class="mt-2 text-lg text-center text-gray-600">Course yang paling banyak diikuti member Ngajar.IN</p>

        <div class="grid grid-cols-4 gap-8 px-6 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0 md:py-10">
            @foreach($popular_courses as $course)
            <div class="relative col-span-4 space-y-4 overflow-hidden duration-300 transform bg-white shadow-xl rounded-xl md:px-0 hover:-translate-y-2">
                <a href="{{route('student.course.show', ['course' => $course])}}" class="flex flex-col">
                    <img src="{{$course->thumbnail}}" alt="thumbnail" class="w-full rounded">
                    <div class="px-5 py-5">
                        <h4 class="text-lg font-medium text-gray-700 line-clamp-1">{{$course->title}}</h4>

                        <div class="prose">Total Member : {{$course->users->count()}}</div>
                        
                        <div class="flex py-2 mt-2 prose prose-indigo md:py-0">
                            @foreach($course->tags as $tag)
                            <span class="mr-2 text-sm font-semibold tracking-tight border-b-2 border-indigo-300 ">
                                {{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- end of popular course section -->

<!-- benefit section -->
<section class="w-full h-full px-8 py-20 mx-auto bg-white">

    <h2 class="text-4xl font-bold tracking-tight text-center">Kenapa belajar di Ngajar.in?</h2>
    <p class="mt-2 text-lg text-center text-gray-600">benefit yang didapat ketika belajar di platform ngajar.in</p>

    <div class="flex flex-col items-center justify-center mt-12 lg:flex-row">

        <!-- Left Column -->
        <div class="flex justify-center w-full mb-12 text-center lg:w-1/2 lg:mb-0">
            <img id="hero-content-3-1" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-1.png" alt="">
        </div>
        <!-- Right Column -->

        <div class="flex flex-col items-center w-full text-center lg:w-1/3 lg:items-start lg:text-left md:-mb-14">
            <ul>
                <li class="mb-8">
                    <h4 class="flex flex-col items-center justify-center mb-5 text-2xl font-medium lg:flex-row lg:justify-start ">
                        <span class="flex items-center justify-center w-12 h-12 mb-5 text-xl text-white rounded-full bg-primary-lighter lg:mr-5 lg:mb-0">1</span>
                        Mastery based learning
                    </h4>
                    <p class="inline-block text-base leading-7 tracking-wide ">
                        Are you busy at work so it's hard to consult? don't<br>
                        worry because you can access anytime.
                    </p>
                </li>
                <li class="mb-8">
                    <h4 class="flex flex-col items-center justify-center mb-5 text-2xl font-medium lg:flex-row lg:justify-start ">
                        <span class="flex items-center justify-center w-12 h-12 mb-5 text-xl text-white rounded-full bg-primary-lighter lg:mr-5 lg:mb-0">2</span>
                        Waktu Fleksibel
                    </h4>
                    <p class="inline-block text-base leading-7 tracking-wide">
                        We provide economical packages for those of you
                        who are still in school or workers.
                    </p>
                </li>
                <li class="mb-8">
                    <h4 class="flex flex-col items-center justify-center mb-5 text-2xl font-medium lg:flex-row lg:justify-start ">
                        <span class="flex items-center justify-center w-12 h-12 mb-5 text-xl text-white rounded-full bg-primary-lighter lg:mr-5 lg:mb-0">3</span>
                        Diajari sampai bisa
                    </h4>
                    <p class="inline-block text-base leading-7 tracking-wide ">
                        We have provided highly experienced mentors
                        for several years.
                    </p>
                </li>
            </ul>
        </div>

    </div>
</section>
<!-- end of benefit section -->

<!-- call to action -->
<section class="py-20 bg-primary">
    <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-100 sm:text-4xl md:text-5xl ">
            Tunggu apa lagi?
        </h2>
        <p class="max-w-md mx-auto mt-3 text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            belajar itu nggak harus ribet, daftar di platform belajar ngajar.in sekarang dan nikmati kemudahan belajar didampingi mentor-mentor yang kompeten
        </p>
        <div class="flex justify-center mt-8 space-x-3 font-semibold">
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-3 text-base text-white border border-transparent rounded-md shadow bg-primary-darker hover:bg-primary-lighter">Masuk</a>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 text-base text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200">Daftar Sekarang</a>
        </div>
    </div>
</section>
<!-- end of call to action -->

@endsection