@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">

    <div class="card">
        <div class="flex items-center justify-between card-header">
            <h6 class="h6">List Request Tutoring</h6>
        </div>
        <div class="card-body">
            <div class="container mb-4">

                <table class="w-auto text-left border" id="datatables">
                    <thead class="pt-10 text-gray-600 bg-gray-100 ">
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam akhir</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($tutorings as $tutoring)
                        <tr class="hover:bg-gray-50">
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{ Str::words($tutoring->student->name, 2) }}
                                </span>
                                <!-- <span class="ml-3 ">Muhammad Ihya </span> -->
                            </td>
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd, D MMMM Y')}}
                                </span>
                                <!-- <span class="ml-3 ">Minggu 12 Januari 2020 </span> -->
                            </td>
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{$tutoring->hour_start}}
                                </span>
                                <!-- <span class="ml-3 ">17:20 </span> -->
                            </td>
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{$tutoring->hour_end}}
                                </span>
                                <!-- <span class="ml-3 ">19:00</span> -->
                            </td>
                            <td class="">
                                <a href="{{route('mentor.tutoring.show', ['tutoring' =>$tutoring])}}">
                                    <button class="block text-sm border-none btn btn-outline-primary md:text-base">Detail</button>
                                </a>
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