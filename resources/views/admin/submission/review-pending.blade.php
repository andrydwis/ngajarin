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
                                <a href="{{$submissionUserPending->file}}">
                                    <button class="text-sm btn btn-outline-success md:text-base">Download</button>
                                </a>

                                <button @click="isOpen = !isOpen" class="text-sm btn btn-primary md:text-base">Review</button>

                                <!-- Modal-->
                                <div x-cloak x-show.transition.duration.300ms.opacity="isOpen" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full">

                                    <!-- overlay -->
                                    <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
                                    </div>
                                    <!-- overlay -->

                                    <div class="fixed z-20 flex flex-col w-full mx-auto mt-10 bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                                        <div>
                                            <!-- body -->
                                            <div class="flex items-center justify-between card-header">
                                                <h6 class="h6">Review Submission</h6>
                                                <button class="focus:outline-none">
                                                    <i class="text-gray-400 fas fa-times hover:text-gray-600" @click="isOpen = !isOpen"></i>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{route('admin.course.submission.review-process', ['course' => $course->slug, 'submission' => $submission->slug, 'submissionUser' => $submissionUserPending])}}" method="post">
                                                    @csrf
                                                    <div class="grid gap-6">
                                                        <div>
                                                            <label for="score">Nilai</label>
                                                            <input type="number" name="score" id="score" placeholder="Nilai Submission" class="form-input py-2 mt-2 block w-full @error('score') is-invalid @enderror" value="{{old('score')}}">
                                                            @error('score')
                                                            <div class="alert alert-error">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <label for="feedback">Feedback</label>
                                                            <textarea name="feedback" id="feedback" rows="5" placeholder="Feedback" class="form-input py-2 mt-2 block w-full @error('feedback') is-invalid @enderror" value="{{old('feedback')}}"></textarea>
                                                            @error('feedback')
                                                            <div class="alert alert-error">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status" class="form-select py-2 mt-2 block w-full @error('status') is-invalid @enderror"">
                                                                <option value="" selected disabled>Pilih Status</option>
                                                                <option value=" diterima">Diterima</option>
                                                                <option value="ditolak">Ditolak</option>
                                                            </select>
                                                            @error('status')
                                                            <div class="alert alert-error">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button class="text-base border-none btn btn-outline-primary" @click.prevent="isOpen = !isOpen">Batal</button>
                                                            <button class="mx-0 text-base btn btn-primary" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- body -->
                                        </div>
                                    </div>


                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--
    <div>
        <h1>JUmlah submission yang perlu direview</h1>
        <p>{{$submissionUsersPending->count()}}</p>
    @foreach($submissionUsersPending as $submissionUserPending)
    <hr>
    <p>sub dari {{$submissionUserPending->user->name}}</p>
    <p>status ; {{$submissionUserPending->status}}</p>
    <form action="{{route('admin.course.submission.review-process', ['course' => $course->slug, 'submission' => $submission->slug, 'submissionUser' => $submissionUserPending])}}" method="post">
        @csrf
        <input type="number" name="score">
        @error('score')
        {{$message}}
        @enderror
        <textarea name="feedback" id="" cols="30" rows="10"></textarea>
        @error('feedback')
        {{$message}}
        @enderror
        <select name="status" id="">
            <option value="" selected disabled>pilih status</option>
            <option value="diterima">Diterima</option>
            <option value="ditolak">Ditolak</option>
        </select>
        @error('status')
        {{$message}}
        @enderror
        <button type="submit">Review</button>
    </form>
    @endforeach
</div>

--}}
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