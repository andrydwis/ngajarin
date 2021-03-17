@extends('layouts.student.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Browse Course</h4>
            </div>
            <div class="card-body">
                <div class="flex flex-wrap">
                    @foreach($courses as $course)

                    <x-card-browse-course 
                    :slug="$course->slug" 
                    :title="$course->title" 
                    :level="$course->level"
                    :tags="$course->tags" 
                    :thumbnail="$course->thumbnail"
                    :episodes="$course->episodes"
                    :submissions="$course->submissions"
                     />

                    {{-- <livewire:test-card> 

                        <x-skeleton.card-course/> --}}


                    @endforeach
                </div>
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