@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Anggota Kelas {{$classroom->name}}</h4>
            </div>

            <div class="p-8">
                <table id="datatables" class="w-auto text-left">
                    <thead class="pt-10 text-white bg-gray-600 shadow-md">
                        <tr>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">No</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Nama</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Email</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Telepon</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Role</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Menu</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-md">
                        @foreach($members as $member)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{$loop->index+1}}</td>
                            <td class="px-6 py-4">{{$member->user->name}}</td>
                            <td class="px-6 py-4">{{$member->user->email}}</td>
                            <td class="px-6 py-4">{{$member->user->phone}}</td>
                            <td class="px-6 py-4">{{$member->user->getRoleNames()->first()}}</td>
                            <td class="px-6 py-4">
                                @if($member->user->getRoleNames()->first() != 'mentor')
                                <form action="{{route('mentor.classroom-member.destroy', ['classroom' => $classroom->id, 'classroomMember' => $member->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Keluarkan</button>
                                    </div>
                                </form>
                                @endif
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