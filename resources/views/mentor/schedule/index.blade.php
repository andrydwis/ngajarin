@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">

    <div class="card">
        <div class="flex items-center justify-between card-header">
            <h6 class="h6">List Jadwal Tutoring</h6>
            <a class="btn-bs-primary" href="{{route('mentor.schedule.create')}}">Tambahkan Jadwal</a>
        </div>
        <div class="card-body">
            <div class="container mb-4">
                <table class="w-auto text-left border" id="datatables">
                    <thead class="pt-10 text-gray-600 bg-gray-100 ">
                        <tr>
                            <th>no.</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam akhir</th>
                            <th class="w-1/4 text-center">Menu</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($schedules as $schedule)
                        <tr class="hover:bg-gray-50">
                            <td class="border-b">
                                <span class="ml-3 "> {{$loop->index+1}} </span>
                            </td>
                            <td class="border-b">
                                <span class="ml-3 "> {{$schedule->day}} </span>
                            </td>
                            <td class="border-b">
                                <span class="ml-3 "> {{$schedule->hour_start}} </span>
                            </td>
                            <td class="border-b">
                                <span class="ml-3 "> {{$schedule->hour_end}} </span>
                            </td>
                            <td class="grid justify-center border-b md:flex">
                                <a href="{{route('mentor.schedule.edit', ['schedule' => $schedule])}}">
                                    <button class="block text-sm border-none btn btn-outline-success md:text-base">Edit</button>
                                </a>
                                <form action="{{route('mentor.schedule.destroy', ['schedule' => $schedule])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block text-sm border-none btn btn-outline-danger md:text-base">hapus</button>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/r-2.2.7/datatables.min.css" />
<style>
    .btn {
        margin-right: 0px;
        margin-left: 5px;
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
            },
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    });
</script>
@endsection