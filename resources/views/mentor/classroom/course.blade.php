@extends('layouts.mentor.app')
@section('content')

<div class="grid w-full grid-cols-1 p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4 md:grid-cols-3">
    <div class="mr-5">
        <div>
            <div class="card">
                <div class="flex justify-between card-header">
                    <h4 class="h6">Course Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('mentor.classroom-course.store', ['classroom' => $classroom->id])}}" method="post">
                        @csrf
                        <div class="flex">
                            <label class="mr-2" for="course">Course</label>
                            <select name="course[]" id="course" class="w-full form-select @error('course') is-invalid @enderror" multiple>
                                <option value="" disabled>Pilih Course</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>
                            @error('course')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-5">
                            <button type="submit" class="btn-bs-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- tabel course kelas -->

    <div class="col-span-1 mt-5 md:mt-0 md:col-span-2">
        <div>
            <div class="card">
                <div class="flex justify-between card-header">
                    <h4 class="h6">Daftar Course Kelas {{$classroom->name}}</h4>
                </div>
                <div class="card-body">
                    <table id="datatables" class="w-auto py-10 text-left">
                        <thead class="pt-10 text-white bg-gray-600 shadow-md">
                            <tr>
                                <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">No</th>
                                <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Nama Course</th>
                                <th class="px-6 pt-6 pb-4 text-sm font-bold text-center uppercase border border-gray-600">Menu</th>
                            </tr>
                        </thead>
                        <tbody class="shadow-md">
                            @foreach($classroom->courses as $course)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4">{{$loop->index+1}}</td>
                                <td class="px-6 py-4">{{$course->title}}</td>
                                <td class="flex flex-wrap justify-center px-6 py-4">
                                    <form action="{{route('mentor.classroom-course.destroy', ['classroom' => $classroom->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="course" value="{{$course->id}}">
                                        <div class="form-group">
                                            <button type="submit" class="btn-bs-danger">Hapus</button>
                                        </div>
                                    </form>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#course').select2();
    });
</script>
@endsection