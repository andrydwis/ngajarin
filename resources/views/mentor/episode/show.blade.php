@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                    <span class="hidden sm:inline">Episode -</span> {{$episode->title}}
                </h6>
                <a href="{{route('mentor.course.episode.edit', [$course->slug, $episode->slug])}}" class="flex items-center ml-4 btn-bs-primary">Edit Episode</a>
            </div>
            <div class="card-body">
                <div class="container grid gap-6">
                    <!-- <img src="http://img.youtube.com/vi/{{$episode->link}}/mqdefault.jpg" alt=""> -->
                    @if($episode->type === 'video')
                    <div class="w-full">
                        <iframe class="w-3/4 h-64 mx-auto" src="https://www.youtube.com/embed/{{$episode->link}}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div>
                        <h6 class="mb-2 text-sm font-semibold md:text-lg">
                            Deskripsi :
                        </h6>
                        <p>
                            {!! $episode->description !!}
                        </p>
                    </div>
                    @else
                    <div>
                        <h6 class="mb-2 text-sm font-semibold md:text-lg">
                            Petunjuk :
                        </h6>
                        <p>
                            {!! $episode->description !!}
                        </p>
                    </div>

                    <div>
                        <h6 class="pb-2 text-sm font-semibold md:text-lg">
                            Lampiran :
                        </h6>
                        <button>
                            <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                <div class="grid gap-1">
                                    <i class="text-4xl fas fa-file"></i>
                                    <span class="text-sm text-gray-400">Klik untuk mengunduh</span>
                                </div>
                            </div>
                        </button>
                    </div>
                    @endif

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