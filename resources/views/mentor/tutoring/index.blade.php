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
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($tutorings as $tutoring)
                        <tr class="hover:bg-gray-50">
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{ Str::words($tutoring->student->name, 2) }}
                                </span>

                            </td>
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd, D MMMM Y')}}
                                </span>

                            </td>
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{$tutoring->hour_start}}
                                </span>

                            </td>
                            <td class="border-b">
                                <span class="ml-3 ">
                                    {{$tutoring->hour_end}}
                                </span>

                            </td>
                            <td class="text-center border-b">
                                @if($tutoring->status == 'menunggu')
                                <span class="px-3 py-2 ml-3 text-xs tracking-wider text-white bg-gray-500 rounded-full bg-opacity-80 md:text-xs">
                                    {{$tutoring->status}}
                                </span>
                                @else
                                <span class="px-3 py-2 ml-3 text-xs tracking-wider text-white rounded-full bg-primary-lighter bg-opacity-80 md:text-xs">
                                    {{$tutoring->status}}
                                </span>
                                @endif

                            </td>
                            <td class="text-center border-b">
                                <span>
                                    <a href="{{route('mentor.tutoring.show', ['tutoring' =>$tutoring])}}">
                                        <button class="text-sm border-none btn btn-outline-primary md:text-sm">Detail</button>
                                    </a>
                                </span>
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