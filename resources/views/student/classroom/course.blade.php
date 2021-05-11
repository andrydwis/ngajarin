@extends('layouts.student.app-new')
@section('content')
<div class="w-full p-5 mx-auto mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h6 class="h6">Daftar Course Kelas {{$classroom->name}}</h6>
            </div>
            <div class="card-body">
                <table id="datatables" class="w-auto text-left">
                    <thead class="pt-10 text-white bg-gray-600 shadow-md">
                        <tr>
                            <th>No</th>
                            <th>Nama Course</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-md">
                        @foreach($classroom->courses as $course)
                        <tr class="hover:bg-gray-100">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$course->title}}</td>
                            <td>
                                <!-- button -->
                                <div x-data="{ tooltip: false }" class="flex-1">
                                    <a href="{{route('student.course.show', ['course' => $course->slug])}}" @mouseover="tooltip = true" @mouseleave="tooltip = false" class="button btn-bs-success">
                                        <i class="mr-2 text-sm fas fa-folder"></i>
                                        <span class="hidden md:inline">Lihat Course</span>
                                    </a>
                                    <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                                        <div class="absolute z-50 flex items-center p-2 text-sm leading-tight text-white rounded-lg shadow-lg w-44 btn-bs-success top-2">
                                            <i class="mr-2 text-lg fas fa-info-circle"></i>
                                            Lihat detail course
                                        </div>
                                    </div>
                                </div>
                                <!-- end of button -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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