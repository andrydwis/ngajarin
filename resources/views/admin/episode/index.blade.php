@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Episode Course</h4>
                <a href="{{route('admin.course.episode.create', ['course' => $course])}}" class="btn-bs-primary">Tambah Episode</a>
            </div>
            <div class="card-body">
                @foreach($episodes as $episode)
                @if($episode->type == 'video')
                <div class="card">
                    <div class="card-body">
                        <p>Episode {{$loop->index + 1}}</p>
                        <img src="http://img.youtube.com/vi/{{$episode->link}}/mqdefault.jpg" alt="">
                        <p>{{$episode->title}}</p>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$episode->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                @elseif($episode->type == 'text')
                <div class="card">
                    <div class="card-body">
                        <p>Episode {{$loop->index + 1}}</p>

                        <p>{{$episode->title}}</p>

                    </div>
                </div>
                @endif
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