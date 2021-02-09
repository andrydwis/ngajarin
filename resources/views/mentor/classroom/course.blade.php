@extends('layouts.mentor.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Tambah Course Baru
            </div>
            <div class="card-body">
                <form action="{{route('mentor.classroom-course.store', ['classroom' => $classroom->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="course">Course</label>
                        <select name="course[]" id="course" class="form-control @error('course') is-invalid @enderror" multiple>
                            <option value="" disabled>Pilih Course</option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                        @error('course')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <dib class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </dib>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Course Kelas {{$classroom->name}}</h4>
            </div>
            <div class="card-body">
                <table id="datatables" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Course</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classroom->courses as $course)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$course->title}}</td>
                            <td>
                                <form action="{{route('mentor.classroom-course.destroy', ['classroom' => $classroom->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="course" value="{{$course->id}}">
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
    </div>
</div>
@endsection

@section('customCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#course').select2();
    });
</script>
@endsection