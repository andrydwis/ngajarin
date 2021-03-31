@extends('layouts.student.app-new')
@section('content')
<section>
    <div class="flex px-5 pt-10 lg:px-20">
        <a href="{{route('student.course.show', ['course' => $course->slug])}}" class="text-base btn btn-outline-primary ">
            <i class="mr-1 text-sm fas fa-chevron-left"></i> Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 gap-5 px-5 pt-5 pb-20 lg:gap-10 lg:px-20 md:grid-cols-3">

        <div class="mb-5 md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Petunjuk Pengerjaan</h6>
                </div>

                <div class="w-full card-body">
                    <div class="w-full">
                        <h6 class="mb-5 text-xl font-semibold">
                            {{$submission->title}}
                        </h6>
                        <div class="prose">
                            {!! $submission->task !!}
                        </div>
                    </div>

                    <hr class="my-5">

                    <div>
                        <h6 class="mb-5 text-xl font-semibold">Lampiran : </h6>

                        @if($submission->file)
                        <a href="{{$submission->file}}">
                            <button>
                                <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                    <div class="grid gap-1">
                                        <i class="text-4xl fas fa-file"></i>
                                        <span class="text-sm text-gray-400">Klik untuk mengunduh</span>
                                    </div>
                                </div>
                            </button>
                        </a>
                        @else
                        <div>
                            tidak ada file
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Pengumpulan</h6>
                </div>

                <div class="prose card-body">

                    @forelse($submission_users as $submission_user)
                    <div class="mb-5">
                        <div>
                            Status : <span class="font-bold"> {{$submission_user->status}} </span>
                        </div>
                        <div>
                            Score : <span class="font-bold"> {{$submission_user->score}} </span>
                        </div>
                        <div>
                            Feedback : <br>
                            @if($submission_user->feedback != null)
                            <div class="w-full h-full text-gray-500 border border-gray-200 form-textarea">
                                {{$submission_user->feedback}}
                            </div>
                            @else

                            @endif
                        </div>
                    </div>

                    <div>
                        @if($submission_user->status != 'diterima')
                        <div>
                            <span class="font-semibold">Submission Anda : </span>
                            <div class="mb-5">
                                <a href="{{$submission_user->file}}" style="text-decoration: none">
                                    <button class="w-full text-base btn btn-primary">
                                        <i class="mr-1 text-sm fas fa-download"></i>
                                        Lihat Submission
                                    </button>
                                </a>
                            </div>
                            <div>
                                <form action="{{route('student.course.submission.update', ['course' => $course, 'submission' => $submission, 'submissionUser' => $submission_user])}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex flex-wrap gap-2">
                                        <label for="file" class="font-semibold">Upload ulang submission :</label>

                                        <!-- alternatif biar nggak mengorbankan ux                                        
                                        <input type="file" name="file" placeholder="{{$submission_user->file}}" class="form-input"> 
                                        -->

                                        <div class="flex items-center w-full">
                                            <a id="lfm" data-input="file" data-preview="holder" class="pr-2 mt-2 text-white" style="text-decoration: none">
                                                <button id="btn_lfm" class="flex items-center text-base align-middle btn btn-outline-primary">
                                                    <i class="pr-2 fas fa-file-alt"></i>
                                                    File
                                                </button>
                                            </a>
                                            <input id="file" class="block w-full py-2 mt-2 form-input" type="text" name="file" value="{{old('file')}}" readonly>
                                        </div>


                                        <div class="w-full">
                                            <button type="submit" class="w-full text-base btn btn-outline-primary">
                                                <i class="mr-1 text-sm fas fa-download"></i> Update submission
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div>
                                <form action="{{route('student.course.submission.destroy', ['course' => $course, 'submission' => $submission, 'submissionUser' => $submission_user])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-base btn btn-outline-danger">
                                        <i class="mr-1 text-sm fas fa-trash"></i> hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                        @else
                        <span class="font-semibold">
                            anda telah menyelesaikan submission ini
                        </span>
                        @endif
                    </div>
                    @empty
                    <div>
                        <span class="text-gray-700">
                            Kumpulkan submission untuk di review
                        </span>
                        @if(!in_array('diterima',$submission_users->pluck('status')->toArray()))
                        <form action="{{route('student.course.submission.store', ['course' => $course, 'submission' => $submission])}}" method="post">
                            @csrf
                            <div class="flex flex-wrap gap-2 my-5">
                                <label for="file" class="font-semibold">File submission : </label>
                                <!-- <input type="file" name="file" class="form-input"> -->
                                <div class="flex items-center w-full">
                                    <a id="lfm" data-input="file" data-preview="holder" class="pr-2 mt-2 text-white" style="text-decoration: none">
                                        <button id="btn_lfm" class="flex items-center text-base align-middle btn btn-outline-primary">
                                            <i class="pr-2 fas fa-file-alt"></i>
                                            File
                                        </button>
                                    </a>
                                    <input id="file" class="block w-full py-2 mt-2 form-input" type="text" name="file" value="{{old('file')}}" readonly>
                                </div>
                                <button type="submit" class="w-full text-base btn btn-primary">
                                    <i class="mr-1 text-sm fas fa-upload"></i> Kirim
                                </button>
                            </div>
                        </form>
                        @else
                        submission anda sudah diterima kok ! <br>
                        @endif
                    </div>
                    @endforelse

                </div>

            </div>


            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List Submission</h6>
                </div>
                <div>
                    @foreach($course->submissions as $submission)
                    <x-student.index-submission :slug="$submission->slug" :course="$course->slug" :title="$submission->title" :task="$submission->task" :file="$submission->file" :sub="$submission">
                        <x-slot name="submission">
                            {{$loop->index + 1}}
                        </x-slot>
                    </x-student.index-submission>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</section>
@endsection

@section('customJS')
<!-- upload-button -->
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    // var btn_upload = document.getElementById('lfm');
    // btn_upload.filemanager('file');
    // laravel file manager WAJIB pake jquery

    $('#lfm').filemanager('file');
</script>
@endsection