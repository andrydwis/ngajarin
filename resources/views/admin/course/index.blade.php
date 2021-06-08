@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="mb-5 card">
        <div class="prose card-body prose-indigo">
            <div class="flex flex-wrap items-center flex-shrink-0 gap-3 md:gap-5">
                <a class="breadcrumbs-item" href="{{route('dashboard.index')}}">
                    <span class="mr-4">Dashboard</span>
                </a>
                <a class="breadcrumbs-item" href="#">
                    <span class="mr-4">Course List</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="flex justify-between card-header">
            <h4 class="h6">Daftar Course</h4>
            <a href="{{route('admin.course.create')}}" class="btn-bs-primary">Tambah Course</a>
        </div>
        <div class="card-body">
            <div class="flex flex-wrap">
                @foreach($courses as $course)
                <x-card-course :slug="$course->slug" :title="$course->title" :level="$course->level" :tags="$course->tags" :publishStatus="$course->publish_status" :thumbnail="$course->thumbnail" :episodes="$course->episodes->count()" :submission="$course->submissions->count()" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="flex justify-between card-header">
            <h4 class="h6">Daftar Course Belum di Review</h4>
        </div>
        <div class="card-body">
            <div class="flex flex-wrap">
                @foreach($coursesRequested as $course)
                <x-card-course :slug="$course->slug" :title="$course->title" :level="$course->level" :tags="$course->tags" :publishStatus="$course->publish_status" :thumbnail="$course->thumbnail" :episodes="$course->episodes->count()" :submission="$course->submissions->count()" />
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