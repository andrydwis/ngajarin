@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">

    <!-- General Report -->
    <div class="grid gap-6 mb-5 sm:grid-cols-2 lg:grid-cols-3 md:grid-flow-col">

        <!-- card -->
        <div class="report-card hover:text-primary-lighter">
            <div class="card">
                <a href="{{route('admin.course.submission.review-pending', ['course' => $course, 'submission' => $submission])}}" class="flex items-center gap-5 card-body">

                    <div class="flex items-center justify-center w-12 h-12 p-4 bg-indigo-100 rounded-full">
                        <i class="text-xl text-primary fas fa-clipboard"></i>
                    </div>

                    <!-- bottom -->

                    <div>
                        <div class="font-bold">
                            <span class="text-lg">{{$submissionUsersPending->count()}}</span> Submission
                        </div>
                        <p>
                            perlu direview <br>
                        </p>

                    </div>
                    <!-- end bottom -->

                </a>
            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="report-card hover:text-primary-lighter">
            <div class="card">
                <a href="{{route('admin.course.submission.review-rejected', ['course' => $course, 'submission' => $submission])}}" class="flex items-center gap-5 card-body">

                    <div class="flex items-center justify-center w-12 h-12 p-4 bg-red-100 rounded-full">
                        <i class="text-xl text-danger fas fa-times"></i>
                    </div>

                    <!-- bottom -->
                    <div>
                        <div class="font-bold">
                            <span class="text-lg">{{$submissionUsersRejected->count()}}</span> Submission

                        </div>
                        <p>telah ditolak</p>
                    </div>
                    <!-- end bottom -->

                </a>
            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="report-card hover:text-primary-lighter">
            <div class="card">
                <a href="{{route('admin.course.submission.review-accepted', ['course' => $course, 'submission' => $submission])}}" class="flex items-center gap-5 card-body">

                    <div class="flex items-center justify-center w-12 h-12 p-4 bg-green-100 rounded-full">
                        <i class="text-xl text-success fas fa-check"></i>
                    </div>

                    <!-- bottom -->
                    <div>
                        <div class="font-bold">
                            <span class="text-lg">{{$submissionUsersAccepted->count()}}</span> Submission

                        </div>
                        <p>telah diterima</p>
                    </div>
                    <!-- end bottom -->

                </a>
            </div>
        </div>
        <!-- end card -->

    </div>
    <!-- End General Report -->


    <div class="card">
        <div class="card-header">
            <h6 class="h6">Submission Terbaru</h6>
        </div>
        <div class="card-body">

            <div class="container mb-4" x-data="{ tab: 'perlu_direview' }">
                <!-- tabs -->
                <div class="flex w-full border-b md:w-auto">
                    <div class="flex flex-1 py-4 pl-4 pr-6 text-sm text-gray-400 border-t border-l rounded-tl-lg md:text-base md:flex-none hover:text-primary" :class="{ 'bg-white text-primary-lighter font-semibold border-r' : tab === 'perlu_direview' }" @click.prevent="tab = 'perlu_direview'">
                        <a href="#">
                            Perlu Direview
                        </a>

                    </div>
                    <div class="flex flex-1 px-6 py-4 text-sm text-gray-400 border-t md:text-base md:flex-none hover:text-primary-lighter" :class="{ 'bg-white text-primary-lighter font-semibold border-l border-r' : tab === 'ditolak' }" @click.prevent="tab = 'ditolak'">
                        <a href="#">
                            Ditolak
                        </a>
                    </div>
                    <div class="flex flex-1 px-6 py-4 text-sm text-gray-400 border-t border-r rounded-tr-lg md:text-base md:flex-none hover:text-primary" :class="{ 'bg-white text-primary-lighter font-semibold border-l' : tab === 'diterima' }" @click.prevent="tab = 'diterima'">
                        <a href="#">Diterima</a>
                    </div>

                </div>
                <!-- end of tabs -->

                <div class="border-b border-l border-r content">

                    <!-- perlu direview-->
                    <div x-cloak x-show.transition.origin.right="tab === 'perlu_direview'">
                        <table class="w-full pt-5 text-left table-fixed">
                            <thead class="text-gray-600">
                                <tr>
                                    <th class="w-2/4 px-1 py-2 text-sm font-semibold text-center border-r md:text-left md:text-base md:px-4">Nama</th>
                                    <th class="w-1/4 px-1 py-2 text-sm font-semibold border-r md:text-base md:px-4">tanggal submit</th>
                                    <th class="w-2/5 px-1 py-2 text-sm font-semibold md:text-base md:px-4">action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">

                                @foreach($submissionUsersPending->take(3) as $submissionUserPending)
                                <tr>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">
                                        {{$submissionUserPending->user->name}}
                                    </td>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">
                                        2-10-2021
                                    </td>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 border-r-0 md:text-left md:text-base md:px-4">
                                        <a href="{{$submissionUserPending->file}}">
                                            <button class="text-sm btn btn-outline-success md:text-base">Download</button>
                                        </a>
                                        <button class="text-sm btn btn-primary md:text-base">Review</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-center my-2">
                            <a href="{{route('admin.course.submission.review-pending', ['course' => $course, 'submission' => $submission])}}">
                                <button class="text-sm btn text-primary-lighter hover:bg-primary-lighter hover:text-white md:text-base">Lihat selengkapnya ({{$submissionUsersPending->count()}})</button>
                            </a>

                        </div>
                    </div>
                    <!-- end of perlu direview-->

                    <!-- ditolak -->
                    <div x-cloak x-show.transition.origin.right="tab === 'ditolak'">
                        <table class="w-full pt-5 text-left table-fixed">
                            <thead class="text-gray-600">
                                <tr>
                                    <th class="w-2/4 px-1 py-2 text-sm font-semibold text-center border-r md:text-left md:text-base md:px-4">Nama</th>
                                    <th class="w-1/4 px-1 py-2 text-sm font-semibold border-r md:text-base md:px-4">tanggal submit</th>
                                    <th class="w-2/5 px-1 py-2 text-sm font-semibold md:text-base md:px-4">action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">

                                @foreach($submissionUsersRejected->take(3) as $submissionUserRejected)
                                <tr>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">
                                        {{$submissionUserRejected->user->name}}
                                    </td>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">
                                        2-10-2021
                                    </td>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 border-r-0 md:text-left md:text-base md:px-4">
                                        <a href="{{$submissionUserRejected->file}}">
                                            <button class="text-sm btn btn-outline-success md:text-base">Download</button>
                                        </a>
                                        <button class="text-sm btn btn-primary md:text-base">Review</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-center my-2">
                            <a href="{{route('admin.course.submission.review-rejected', ['course' => $course, 'submission' => $submission])}}">
                                <button class="text-sm btn text-primary-lighter hover:bg-primary-lighter hover:text-white md:text-base">Lihat selengkapnya ({{$submissionUsersRejected->count()}})</button>
                            </a>

                        </div>
                    </div>
                    <!-- end of ditolak -->

                    <!-- diterima -->
                    <div x-cloak x-show.transition.origin.right="tab === 'diterima'">
                        <table class="w-full pt-5 text-left table-fixed">
                            <thead class="text-gray-600">
                                <tr>
                                    <th class="w-2/4 px-1 py-2 text-sm font-semibold text-center border-r md:text-left md:text-base md:px-4">Nama</th>
                                    <th class="w-1/4 px-1 py-2 text-sm font-semibold border-r md:text-base md:px-4">tanggal submit</th>
                                    <th class="w-2/5 px-1 py-2 text-sm font-semibold md:text-base md:px-4">action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">

                                @foreach($submissionUsersAccepted->take(3) as $submissionUserAccepted)
                                <tr>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">
                                        {{$submissionUserAccepted->user->name}}
                                    </td>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">
                                        2-10-2021
                                    </td>
                                    <td class="px-1 py-2 text-sm text-center border border-l-0 border-r-0 md:text-left md:text-base md:px-4">
                                        <a href="{{$submissionUserAccepted->file}}">
                                            <button class="text-sm btn btn-outline-success md:text-base">Download</button>
                                        </a>
                                        <button class="text-sm btn btn-primary md:text-base">Review</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-center my-2">
                            <a href="{{route('admin.course.submission.review-accepted', ['course' => $course, 'submission' => $submission])}}">
                                <button class="text-sm btn text-primary-lighter hover:bg-primary-lighter hover:text-white md:text-base">Lihat selengkapnya ({{$submissionUsersAccepted->count()}})</button>
                            </a>

                        </div>
                    </div>
                    <!-- end of diterima -->
                </div>

            </div>
        </div>
    </div>

</div>
@endsection