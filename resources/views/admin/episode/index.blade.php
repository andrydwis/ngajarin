@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-lg">
                    <span class="hidden sm:inline">Daftar Episode Course -</span> {{$course->title}}
                </h6>
                <a href="{{route('admin.course.episode.create', ['course' => $course])}}" class="flex items-center ml-4 btn-bs-primary">Tambah Episode</a>
            </div>
            <div class="card-body">
                @foreach($episodes as $episode)
                <!-- <p>Episode {{$loop->index + 1}}</p>
                        <img src="http://img.youtube.com/vi/{{$episode->link}}/mqdefault.jpg" alt="">
                        <p>{{$episode->title}}</p> -->
                <!-- <iframe class="w-20 h-20" src="https://www.youtube.com/embed/{{$episode->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <x-index-episode :title="$episode->title" :type="$episode->type" :description="$episode->description" :link="$episode->link">

                    <x-slot name="dropdown">
                        <div x-cloak x-show.transition.origin.top="dropdown" @click.away="dropdown = false" class="absolute z-50 w-40 py-2 mt-5 ml-10 text-left text-gray-500 bg-white border border-gray-300 rounded shadow-md">
                            <!-- item -->
                            @role('admin')
                            <a href="{{route('admin.course.episode.show', ['course' => $course, 'episode' => $episode->slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-info"></i>
                                Detail
                            </a>
                            @else

                            @endrole
                            <!-- end item -->



                            {{--
                             <!-- item -->
                             @role('admin')
                            <a href="{{route('admin.course.edit', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                            <i class="mr-1 text-xs fas fa-edit"></i>
                            Edit
                            </a>
                            @else
                            <a href="{{route('mentor.course.edit', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                                <i class="mr-1 text-xs fas fa-edit"></i>
                                Edit
                            </a>
                            @endrole
                            <!-- end item -->

                            <!-- item -->
                            <!-- form di hidden -->
                            <div x-data>
                                @role('admin')
                                <form action="{{route('admin.course.destroy', $courseId)}}" method="post" class="hidden">
                                    @else
                                    <form action="{{route('mentor.course.destroy', $courseId)}}" method="post" class="hidden">
                                        @endrole
                                        @csrf
                                        @method('DELETE')
                                        <button id="{{ $title }}" type="submit">
                                            Hapus
                                        </button>

                                    </form>

                                    <a href="#" @click.prevent="$('#{{ $title }}').click();" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                                        <i class="mr-1 text-xs fas fa-trash"></i>
                                        Hapus
                                    </a>
                            </div>
                            <!-- end item -->
                            --}}
                        </div>
                    </x-slot>

                    <x-slot name="episode">
                        <span>{{$loop->index + 1}}</span>
                    </x-slot>

                </x-index-episode>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection

@section('customCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
@endsection

@section('customJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
            }
        });
    });
</script>
@endsection