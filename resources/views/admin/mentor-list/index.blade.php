@extends('layouts.admin.app')
@section('content')
<!-- 
    keterangan
    mobile : full
    md : auto, seluas default isi konten tabel 
    lg : 66%, karena kalo 75% ketumpuk dibawahnya sidebar
    xl : 75%, 25% nya dipake sidebar
 -->
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Mentor</h4>
                <a href="{{route('admin.mentor-list.create')}}">
                    <button class="btn-bs-primary">Tambah</button>
                </a>
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
                        </tr>
                    </thead>
                    <tbody class="shadow-md">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{$loop->index+1}}</td>
                            <td class="px-6 py-4">{{$user->name}}</td>
                            <td class="px-6 py-4">{{$user->email}}</td>
                            <td class="px-6 py-4">{{$user->phone}}</td>
                            <td class="px-6 py-4">{{$user->getRoleNames()->first()}}</td>
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