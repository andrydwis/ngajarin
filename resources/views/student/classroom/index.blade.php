@extends('layouts.mentor.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Join Kelas</h4>
            </div>
            <div class="card-body">
                <form action="{{route('student.classroom-member.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="token">Token</label>
                        <input type="text" name="token" id="token" class="form-control @error('token') is-invalid @enderror" value="{{old('token')}}">
                        @error('token')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Join</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Kelas</h4>
            </div>
            <div class="card-body">
                <table id="datatables" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Tahun</th>
                            <th>Semester</th>
                            <th>Token Invite</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classrooms as $classroom)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$classroom->classroom->name}}</td>
                            <td>{{$classroom->classroom->year}}</td>
                            <td>{{$classroom->classroom->semester}}</td>
                            <td>{{$classroom->classroom->token}}</td>
                            <td>
                                <form action="{{route('student.classroom-member.destroy', ['classroomMember' => $classroom->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Keluar</button>
                                    </div>
                                </form>
                                <a href="{{route('mentor.classroom-member.index', ['classroom' => $classroom->classroom->id])}}" class="btn btn-secondary">Member</a>
                                <a href="{{route('mentor.classroom-course.index', ['classroom' => $classroom->classroom->id])}}" class="btn btn-primary">Course Kelas</a>
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