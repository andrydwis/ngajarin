@extends('layouts.student.app-new')
@section('content')
<div class="max-w-4xl mx-auto my-10 ">
    <div class="col-span-1 mt-5 md:mt-0 md:col-span-2">
        <div>
            <div class="">
                <div class="w-full mb-5">

                    <!-- page title -->
                    <div x-data="{ active : false, modal_join : false}" class="flex flex-col items-start justify-center w-full md:flex-row">

                        <div class="flex items-center p-5 duration-300 cursor-pointer rounded-xl hover:bg-gray-100">
                            <div class="flex items-center justify-center w-10 h-10 bg-indigo-100 text-primary rounded-2xl">
                                <i class="text-xl fas fa-user"></i>
                            </div>
                            <div class="ml-2 text-2xl font-bold">Daftar Kelas</div>
                        </div>

                        <div @click="modal_join = true" @mouseover="active = true" @mouseleave="active = false" class="flex items-center p-5 mt-3 duration-300 cursor-pointer hover:bg-gray-100 rounded-xl md:mt-0" :class="{'text-primary' : active, 'text-gray-400' : !active}">
                            <div class="flex items-center justify-center w-10 h-10 rounded-2xl">
                                <i class="text-xl fas fa-check"></i>
                            </div>
                            <div class="ml-2 text-2xl font-bold" :class="{ 'text-primary' : active, 'text-gray-400' : !active }">Join Kelas</div>
                        </div>

                        <div x-cloak x-show.transition.duration.300ms.opacity="modal_join" @click.away="modal_join = !modal_join" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full">

                            <!-- overlay -->
                            <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
                            </div>
                            <!-- overlay -->

                            <div class="fixed z-20 flex flex-col w-full mx-auto mt-10 bg-white border rounded-lg card lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                                <div>
                                    <!-- body -->
                                    <div class="flex justify-between card-header">
                                        <h4 class="h6">Join Kelas</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('student.classroom-member.store')}}" method="post">
                                            @csrf
                                            <div class="grid">
                                                <label for="token">Token</label>
                                                <input type="text" name="token" id="token" class="form-input mt-2 @error('token') is-invalid @enderror" value="{{old('token')}}" placeholder="Masukkan token invite..">
                                                @error('token')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="flex justify-end mt-5">
                                                <button @click.prevent="modal_join = !modal_join" class="mx-0 text-base btn btn-outline-primary">Batal</button>
                                                <button type="submit" class="px-6 text-base font-semibold btn btn-primary">Join</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- body -->
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- end of page title -->


                </div>
                <div class="">
                    <table id="datatables" class="w-auto text-left">
                        <thead class="pt-10 text-white bg-gray-600 shadow-md">
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Tahun</th>
                                <th>Semester</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody class="shadow-md">
                            @foreach($classrooms as $classroom)
                            <tr class="hover:bg-gray-100">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$classroom->classroom->name}}</td>
                                <td>{{$classroom->classroom->year}}</td>
                                <td>{{$classroom->classroom->semester}}</td>
                                <td class="flex flex-wrap gap-1 px-6 py-4">

                                    <!-- hidden form -->
                                    <form class="hidden" action="{{route('student.classroom-member.destroy', ['classroomMember' => $classroom->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group">
                                            <button id="btn_delete_{{$classroom->classroom->id}}" type="submit">Hapus</button>
                                        </div>
                                    </form>
                                    <!-- hidden form -->

                                    <!-- button -->
                                    <div x-data="{ tooltip: false }" class="flex-1">
                                        <a @click="$('#btn_delete_{{$classroom->classroom->id}}').click()" @mouseover="tooltip = true" @mouseleave="tooltip = false" href="#" class="my-1 md:my-0 button btn-bs-danger">
                                            <i class="text-sm fas fa-trash-alt"></i>
                                        </a>
                                        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                                            <div class="absolute z-50 flex items-center w-32 p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-danger top-2">
                                                <i class="mr-2 text-lg fas fa-exclamation-circle"></i>
                                                Hapus Kelas
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of button -->

                                    <!-- button -->
                                    <div x-data="{ tooltip: false }" class="flex-1">
                                        <a href="{{route('student.classroom-member.index', ['classroom' => $classroom->classroom->id])}}" @mouseover="tooltip = true" @mouseleave="tooltip = false" class="button btn-bs-success">
                                            <i class="text-sm fas fa-users"></i>
                                        </a>
                                        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                                            <div class="absolute z-50 flex items-center p-2 text-sm leading-tight text-white rounded-lg shadow-lg w-36 btn-bs-success top-2">
                                                <i class="mr-2 text-lg fas fa-users"></i>
                                                Lihat Member
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of button -->

                                    <!-- button -->
                                    <div x-data="{ tooltip: false }" class="flex-1">
                                        <a href="{{route('student.classroom-course.index', ['classroom' => $classroom->classroom->id])}}" @mouseover="tooltip = true" @mouseleave="tooltip = false" class="button btn-bs-primary">
                                            <i class="text-sm fas fa-folder"></i>
                                        </a>
                                        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                                            <div class="absolute z-50 flex items-center w-40 p-2 text-sm leading-tight text-white rounded-lg shadow-lg btn-bs-primary top-2">
                                                <i class="mr-2 text-lg fas fa-folder"></i>
                                                Lihat Course Kelas
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

@section('customCSS')
<style>
    [x-cloak] {
        display: none;
    }
</style>
@endsection