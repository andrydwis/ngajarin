@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">

    <div class="card">
        <div class="card-header">
            <h6 class="h6">Review Submission - {{$submission->title}} </h6>
        </div>
        <div class="card-body">

            <div class="container mb-4">
                <table class="w-auto text-left border" id="datatables">
                    <thead class="pt-10 text-gray-600 bg-gray-100 ">
                        <tr>
                            <th class="text-sm font-semibold text-center md:text-left md:text-base md:px-4">Nama</th>
                            <th class="text-sm font-semibold text-center md:text-base md:px-4 md:text-left">tanggal submit</th>
                            <th class="text-sm font-semibold text-center md:text-base md:px-4 md:text-left">action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">

                        @foreach($submissionUsersPending as $submissionUserPending)
                        <tr class="hover:bg-gray-50">
                            <td class="px-1 py-2 text-sm text-center border-b md:text-left md:text-base md:px-4">
                                {{$submissionUserPending->user->name}}
                            </td>
                            <td class="px-1 py-2 text-sm text-center border-b md:text-left md:text-base md:px-4">
                                2-10-2021
                            </td>
                            <td class="px-1 py-2 text-sm text-center border-b md:text-left md:text-base md:px-4" x-data="{ isOpen : false }">
                                <a href="{{$submissionUserPending->file}}" target="_blank">
                                    <button class="text-sm btn btn-outline-success md:text-base">Download</button>
                                </a>

                                <button @click="isOpen = !isOpen" class="text-sm btn btn-primary md:text-base">Review</button>

                                <!-- Modal-->
                                <x-modal-review-submission :action="route('admin.course.submission.review-process', ['course' => $course->slug, 'submission' => $submission->slug, 'submissionUser' => $submissionUserPending])" />

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
            }
        });
    });
</script>
@endsection