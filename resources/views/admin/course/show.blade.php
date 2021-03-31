@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-full lg:w-4/6 xl:w-3/4">
    <div class="mb-5 card">
        <div class="prose card-body prose-indigo">
            <div class="flex flex-wrap items-center flex-shrink-0 gap-3 md:gap-5">
                <a class="breadcrumbs-item" href="{{route('dashboard.index')}}">
                    <span class="mr-4">Dashboard</span>
                </a>
                <a class="breadcrumbs-item" href="{{route('admin.course.index')}}">
                    <span class="mr-4">Course List</span>
                </a>
                <a class="breadcrumbs-item" href="#">
                    <span class="mr-4">Detail Course</span>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="flex justify-between card-header">
            <div>
                <h6 class="text-lg font-bold md:text-xl">Data Course {{$course->title}}</h6>
                <span class="hidden text-gray-500 normal-case md:inline">Detail dari course</span>
            </div>
            <div class="flex-grow-0">
                <a href="{{route('admin.course.edit', $course->slug)}}">
                    <button class="btn-bs-primary">
                        Edit
                    </button>
                </a>
            </div>
        </div>

        <!-- card body -->
        <div class="py-4">
            <!-- item -->
            <div class="grid px-6 pb-4 border-b md:grid-cols-3 md:gap-6">
                <div class="col-span-1">
                    <span class="text-gray-600">Judul</span>
                </div>
                <div class="col-span-2">
                    <span>{{$course->title}}</span>
                </div>
            </div>
            <!-- end of item -->

            <!-- item -->
            <div class="grid px-6 py-4 border-b md:grid-cols-3 md:gap-6">
                <div class="col-span-1">
                    <span class="text-gray-600">Level</span>
                </div>
                <div class="col-span-2">
                    <span>{!! $course->level !!}</span>
                </div>
            </div>
            <!-- end of item -->

            <!-- item -->
            <div class="grid px-6 py-4 border-b md:grid-cols-3 md:gap-6">
                <div class="col-span-1">
                    <span class="text-gray-600">Tag</span>
                </div>
                <div class="flex flex-wrap col-span-2 mt-2 -ml-2 md:mt-0">
                    @foreach($tags as $tag)
                    @if(in_array($tag->id, $course->tags->pluck('id')->toArray()))
                    <div class="py-2 mx-1 md:py-0">
                        <span class="px-2 py-2 tracking-tight bg-gray-200 rounded-md">
                            {{ $tag->name }}
                        </span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <!-- end of item -->

            <!-- item -->
            <div class="grid px-6 py-4 border-b md:grid-cols-3 md:gap-6">
                <div class="col-span-1">
                    <span class="text-gray-600">Thumbnail</span>
                </div>
                <div class="flex flex-wrap col-span-2 mt-2 -ml-2 md:mt-0">

                    @if($course->thumbnail)
                    <div class="grid w-56 h-40 place-items-center">
                        <img src="{{$course->thumbnail}}" alt="missing">
                    </div>
                    @else
                    <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 border-dashed hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                        <i class="text-4xl fas fa-camera"></i>
                    </div>
                    @endif

                </div>
            </div>
            <!-- end of item -->

            <!-- item -->
            <div class="grid px-6 py-4 md:grid-cols-3 md:gap-6">
                <div class="col-span-1">
                    <span class="text-gray-600">Deskripsi</span>
                </div>
                <div class="col-span-2 mt-2 md:mt-0">
                    <div class="break-all">
                        {!! $course->description !!}
                    </div>
                </div>
            </div>
            <!-- end of item -->

        </div>
        <!-- end of card body -->
    </div>
</div>
@endsection

@section('customCSS')
<!-- styling image holder -->
<style>
    div#holder img {
        height: 10rem !important;
        margin-top: 1rem;
    }
</style>
@endsection