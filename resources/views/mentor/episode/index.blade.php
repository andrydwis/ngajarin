@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <div>
                    <h6 class="text-base font-bold md:text-xl">
                        <span class="hidden sm:inline">Daftar Episode -</span> {{$course->title}}
                    </h6>
                </div>
                <div class="flex-grow-0 ml-1">
                    <a href="{{route('mentor.course.episode.create', $course->slug)}}">
                        <button class="btn-bs-primary">
                            Tambah <span class="hidden sm:inline">Episode</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                @foreach($episodes as $episode)
                <x-index-episode :slug="$episode->slug" :course="$course->slug" :title="$episode->title" :type="$episode->type" :description="$episode->description" :link="$episode->link" :submission="$episode->submission">
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