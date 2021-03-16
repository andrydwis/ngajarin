@extends('layouts.student.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="col-span-1 mt-5 md:mt-0 md:col-span-2">
        <div>
            <div class="card">
                <div class="flex justify-between card-header">
                    <h4 class="h6">Daftar Course Anda</h4>
                </div>
                <div class="card-body">
                    <table id="datatables" class="w-auto py-10 text-left">
                        <thead class="pt-10 text-white bg-gray-600 shadow-md">
                            <tr>
                                <th>No</th>
                                <th>thumbnail</th>
                                <th>level</th>
                                <th>description</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody class="shadow-md">
                            @foreach($courses as $course)
                            <tr class="hover:bg-gray-100">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$course->thumbnail}}</td>
                                <td>{{$course->level}}</td>
                                <td>{{$course->description}}</td>
                                <td class="flex flex-wrap gap-1 px-6 py-4">

                                    <!-- hidden form -->
                                    <form class="hidden" action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group">
                                            <button id="btn_delete_{{$classroom->classroom->name}}" type="submit">Hapus</button>
                                        </div>
                                    </form>
                                    <!-- hidden form -->

                                    <!-- button -->
                                    <div x-data="{ tooltip: false }" class="flex-1">
                                        <a @click.prevent="$('#btn_delete_{{$course->title}}').click()" @mouseover="tooltip = true" @mouseleave="tooltip = false" href="#" class="my-1 md:my-0 button btn-bs-danger">
                                            <i class="text-sm fas fa-trash-alt"></i>
                                        </a>
                                        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                                            <div class="absolute z-50 flex items-center w-32 p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-danger top-2">
                                                <i class="mr-2 text-lg fas fa-info"></i>
                                                Keluar Kelas
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of button -->

                                    <!-- button -->
                                    <div x-data="{ tooltip: false }" class="flex-1">
                                        <a href="" @mouseover="tooltip = true" @mouseleave="tooltip = false" class="button btn-bs-primary">
                                            <i class="text-sm fas fa-folder"></i>
                                        </a>
                                        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                                            <div class="absolute z-50 flex items-center w-40 p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-primary top-2">
                                                <i class="mr-2 text-lg fas fa-info"></i>
                                                Lihat Detail
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