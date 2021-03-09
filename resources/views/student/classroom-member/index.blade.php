@extends('layouts.student.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="card-header">
                <h6 class="h6">Daftar Anggota Kelas {{$classroom->name}}</h6>
            </div>
            <div class="card-body">
                <table id="datatables" class="w-auto py-10 text-left">
                    <thead class="pt-10 text-white bg-gray-600 shadow-md">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-md">
                        @foreach($members as $member)
                        <tr class="hover:bg-gray-100">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$member->user->name}}</td>
                            <td>{{$member->user->email}}</td>
                            <td>{{$member->user->phone}}</td>
                            <td>{{$member->user->getRoleNames()->first()}}</td>
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