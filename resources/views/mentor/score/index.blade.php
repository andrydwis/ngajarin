@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                    <span class="hidden sm:inline">Daftar Mahasiswa Course -</span> {{$course->title}}
                </h6>
            </div>
            <div class="card-body">
                <div class="container mb-4">
                    <table class="w-auto text-left border" id="datatables">
                        <thead class="pt-10 text-gray-600 bg-gray-100 ">
                            <tr>
                                <th class="text-sm font-semibold text-center md:text-left md:text-base md:px-4">Nama Mahasiswa</th>
                                <th class="text-sm font-semibold text-center md:text-base md:px-4 md:text-left">Rata-rata</th>
                                <th class="text-sm font-semibold text-center md:text-base md:px-4 md:text-left">action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @php
                            $sum = 0;
                            $total = $course->submissions->count();
                            @endphp

                            @foreach($course->users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-1 py-2 text-sm text-center border-b md:text-left md:text-base md:px-4">
                                    {{$user->name}}
                                </td>
                                <!-- rumus hitung rata2 -->
                                @foreach($course->submissions as $submission)

                                @php
                                $sum += $submission->score($user);
                                @endphp

                                @endforeach
                                <!-- end of rumus hitung rata2 -->

                                <td class="px-1 py-2 text-sm text-center border-b md:text-left md:text-base md:px-4">
                                    {{ Str::limit($sum/$total, $limit = 4, '') }}
                                </td>

                                <td class="px-1 py-2 text-sm text-center border-b md:text-left md:text-base md:px-4">
                                    <a href="{{route('mentor.course.score.show', [ 'course' => $course->slug, 'user' => $user ])}}" target="_blank">
                                        <button class="text-sm btn btn-outline-primary md:text-base">Lihat Detail</button>
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