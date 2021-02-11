@extends('layouts.admin.app-new')
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
                <table id="datatables" class="w-auto py-10 text-left">
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
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{$loop->index+1}}</td>
                            <td class="px-6 py-4">{{$user->name}}</td>
                            <td class="px-6 py-4">{{$user->email}}</td>
                            <td class="px-6 py-4">{{$user->phone}}</td>
                            <td class="px-6 py-4">{{$user->getRoleNames()->first()}}</td>
                            <td class="px-6 py-4">

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

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" /> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.7/datatables.min.css" />
<style>
    #datatables {
        width: 100% !important;
    }

    body {
        table-layout: auto !important;
    }

    .dataTables_wrapper th {
        font-weight: 500 !important;
    }

    /* Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        border-radius: .25rem;
        border: 1px solid transparent;
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        font-weight: 700;
        border-radius: .25rem;
        background: #4f46e5 !important;
        border: 1px solid transparent;
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #fff !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        font-weight: 700;
        border-radius: .25rem;
        background: #4f46e5 !important;
        border: 1px solid transparent;
    }
</style>
@endsection

@section('customJS')
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script> -->
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