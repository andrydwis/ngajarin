@extends('layouts.student.app-new')
@section('content')
<section class="max-w-4xl px-4 mx-auto">

    <!-- page title -->
    <div class="flex flex-row items-center justify-center w-full h-12 my-10">
        <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-gray-100 rounded-2xl">
            <i class="text-xl far fa-folder"></i>
        </div>
        <div class="ml-2 text-2xl font-bold">Course Saya</div>
    </div>
    <!-- end of page title -->

    <div class="grid grid-cols-4 gap-8 px-6 mt-10 place-items-center sm:grid-cols-8 lg:grid-cols-8 sm:px-8 xl:px-0 md:py-10">
        @if($courses)
        @foreach($courses as $course)
        <div class="relative col-span-4 space-y-4 overflow-hidden duration-300 transform bg-white shadow-xl rounded-xl md:px-0 hover:-translate-y-2">
            <a href="{{route('student.course.show', ['course' => $course])}}" class="flex flex-col">
                <div class="h-56">
                    <img src="{{$course->thumbnail}}" alt="thumbnail" class="object-cover w-full h-full rounded">
                </div>
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
        @else
        <div class="flex items-center justify-center mx-auto w-96 h-96">
            <span class="h6">Anda Belum memiliki Course</span>
        </div>
        @endif
    </div>



</section>
@endsection

@section('customCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.7/datatables.min.css" />
@endsection

@section('customJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.7/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            responsive: true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
            }
        });
    });
</script>
@endsection