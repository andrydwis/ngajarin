@extends('layouts.student.app-new')
@section('content')
<div class="max-w-4xl px-4 mx-auto my-10">
    <div>

        <div class="">

            <!-- page title -->
            <div class="flex flex-row items-center justify-center w-full h-12 my-10">
                <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-gray-100 rounded-2xl">
                    <i class="text-xl far fa-folder"></i>
                </div>
                <div class="ml-2 text-2xl font-bold">Cari Course</div>
            </div>
            <!-- end of page title -->

            <div class="card-body">
                <div class="flex flex-wrap">
                    @foreach($courses as $course)
                    <x-card-browse-course :course="$course" :slug="$course->slug" :title="$course->title" :level="$course->level" :tags="$course->tags" :thumbnail="$course->thumbnail" :episodes="$course->episodes" :submissions="$course->submissions" />
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>
@endsection