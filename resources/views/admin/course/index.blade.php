@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <!-- <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Course</h4>
                <a href="{{route('admin.course.create')}}" class="btn-bs-primary">Tambah Course</a>
            </div>
            <div class="card-body">
                <table id="datatables" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul Course</th>
                            <th>Thumbnail</th>
                            <th>Level</th>
                            <th>Tags</th>
                            <th>Dibuat Oleh</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{$course->title}}</td>
                            <td><img src="{{$course->thumbnail ?? null}}" alt="" height="50" width="50"></td>
                            <td>{{$course->level}}</td>
                            <td>
                                @foreach($course->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td>{{$course->creator->name}}</td>
                            <td>
                                <a href="{{route('admin.course.edit', ['course' => $course])}}" class="btn btn-success">Update</a>
                                <form action="{{route('admin.course.destroy', ['course' => $course])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Course</h4>
                <a href="{{route('admin.course.create')}}" class="btn-bs-primary">Tambah Course</a>
            </div>
            <div class="card-body">
                <div class="flex flex-wrap">
                    @foreach($courses as $course)
                    <x-cardCourse :title="$course->title" :thumbnail="$course->thumbnail" :courseId="['course' => $course]" :tags="$course->tags" :level="$course->level" :episodes="$course->episodes->count()" />
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