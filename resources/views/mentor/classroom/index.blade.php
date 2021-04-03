@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Kelas</h4>
                <a href="{{route('mentor.classroom.create')}}">
                    <button class="btn-bs-primary">Tambah Kelas</button>
                </a>
            </div>
            <div class="p-8">
                <table id="datatables" class="w-auto text-left">
                    <thead class="pt-10 text-white bg-gray-600 shadow-md">
                        <tr>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">No</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Nama Kelas</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Tahun</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Semester</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Token Invite</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Menu</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-md">
                        @foreach($classrooms as $classroom)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{$loop->index+1}}</td>
                            <td class="px-6 py-4">{{$classroom->classroom->name}}</td>
                            <td class="px-6 py-4">{{$classroom->classroom->year}}</td>
                            <td class="px-6 py-4">{{$classroom->classroom->semester}}</td>
                            <td class="px-6 py-4">{{$classroom->classroom->token}}</td>
                            <td class="grid grid-cols-4 gap-1" x-data>

                                <!-- di hidden -->
                                <form action="{{route('mentor.classroom.destroy', ['classroom' => $classroom->classroom->id])}}" method="post" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn_delete"> <i class="fas fa-trash-alt"></i> </button>
                                </form>
                                <!-- end di hidden -->

                                <!-- pembatas button -->
                                <div x-data="{ tooltip1: false }">
                                    <a @click.prevent="$('#btn_delete').click()" @mouseover="tooltip1 = true" @mouseleave="tooltip1 = false" href="#" class="button btn-bs-danger">
                                        <i class="text-sm fas fa-trash-alt"></i></a>
                                    <div class="relative" x-cloak x-show.transition.origin.top="tooltip1">
                                        <div class="absolute z-50 flex items-center w-32 p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-danger top-2">
                                            <i class="mr-2 text-lg fas fa-exclamation-circle"></i>
                                            Hapus Kelas
                                        </div>
                                    </div>
                                </div>

                                <!-- pembatas button -->
                                <div x-data="{ tooltip2: false }">
                                    <a href="{{route('mentor.classroom.edit', ['classroom' => $classroom->classroom->id])}}" @mouseover="tooltip2 = true" @mouseleave="tooltip2 = false" class="button btn-bs-primary"><i class="text-sm fas fa-edit"></i></a>

                                    <div class="relative" x-cloak x-show.transition.origin.top="tooltip2">
                                        <div class="absolute z-50 flex items-center p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-primary w-36 top-2">
                                            <i class="mr-2 text-base fas fa-edit"></i>
                                            Edit data Kelas
                                        </div>
                                    </div>
                                </div>

                                <!-- pembatas button -->
                                <div x-data="{ tooltip3: false }">
                                    <a href="{{route('mentor.classroom-member.index', ['classroom' => $classroom->classroom->id])}}" @mouseover="tooltip3 = true" @mouseleave="tooltip3 = false" class="button btn-bs-success"><i class="text-sm fas fa-users"></i></a>

                                    <div class="relative" x-cloak x-show.transition.origin.top="tooltip3">
                                        <div class="absolute z-50 flex items-center p-2 text-sm leading-tight text-white rounded-lg shadow-lg w-44 btn-bs-success top-2">
                                            <i class="mr-2 text-base fas fa-users"></i>
                                            Edit Member Kelas
                                        </div>
                                    </div>
                                </div>

                                <!-- pembatas button -->
                                <div x-data="{ tooltip4: false }">
                                    <a href="{{route('mentor.classroom-course.index', ['classroom' => $classroom->classroom->id])}}" @mouseover="tooltip4 = true" @mouseleave="tooltip4 = false" class="button btn-bs-success"><i class="text-sm fas fa-folder"></i></a>

                                    <div class="relative" x-cloak x-show.transition.origin.top="tooltip4">
                                        <div class="absolute z-50 flex items-center w-40 p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-success top-2">
                                            <i class="mr-2 text-base fas fa-folder"></i>
                                            Edit Course Kelas
                                        </div>
                                    </div>
                                </div>
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
<style>
    .button {
        padding: 3px 3px;

    }
</style>
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