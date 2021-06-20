@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h4 class="h6">Daftar Mentor Request</h4>
            </div>
            <div class="p-8">
                <table id="datatables" class="w-auto text-left">
                    <thead class="pt-10 text-white bg-gray-600 shadow-md">
                        <tr>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">No</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Nama</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold uppercase border border-gray-600">Email</th>
                            <th class="px-6 pt-6 pb-4 text-sm font-bold text-center uppercase border border-gray-600">Menu</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-md">
                        @foreach($requests as $request)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{$loop->index+1}}</td>
                            <td class="px-6 py-4">{{$request->user->name}}</td>
                            <td class="px-6 py-4">{{$request->user->email}}</td>
                            <td class="flex justify-center px-6 py-4" x-data="{ isOpen : false, isOpen1 : false }">

                                <button @click.prevent="isOpen = true" type="button" class="mr-0 btn btn-primary md:text-sm">
                                    Detail
                                </button>

                                <button @click.prevent="isOpen1 = true" type="button" class="btn btn-danger md:text-sm">
                                    Tolak
                                </button>

                                <x-modal-mentor-request :reason="$request->reason" :actionReject="route('admin.mentor-request.destroy', [$request])" :actionAccept="route('admin.mentor-request.process', [$request])" />
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