@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                    <span class="hidden sm:inline">Daftar Submission Course -</span> {{$course->title}}
                </h6>
                <a href="{{route('mentor.course.submission.create', $course->slug)}}" class="flex items-center ml-4 btn-bs-primary">Tambah Submission</a>
            </div>
            <div class="card-body">
                @foreach($submission as $submission)
                <x-index-submission :slug="$submission->slug" :course="$course->slug" :title="$submission->title" :task="$submission->task" :file="$submission->file">
                    <x-slot name="submission">
                        {{$loop->index + 1}}
                    </x-slot>
                </x-index-submission>
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