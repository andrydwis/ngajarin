@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="card-header">
            <h6 class="h6">Edit Submission</h6>
        </div>
        <div class="card-body">
            <div class="container mb-4">

                <div class="px-4 py-4 pt-4 bg-white ">
                    <!-- text form -->
                    <div>
                        <form action="{{route('mentor.course.submission.update', [ 'course' => $course->slug, 'submission' => $submission->slug ])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="grid gap-6 pt-5">
                                <div>
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-input py-2 mt-2 block w-full @error('judul') is-invalid @enderror" value="{{old('title') ?? $submission->title }}">
                                    @error('title')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <div class="mb-2">
                                        <label for="tugas">Deskripsi Tugas</label>
                                    </div>
                                    <textarea name="tugas" id="tugas" class="form-textarea task @error('task') is-invalid @enderror">{!! old('task') ?? $submission->task !!}</textarea>
                                    @error('task')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="file">Lampiran <span class="text-xs text-gray-600">(zip, word, pdf, dll)</span></label>
                                    <div class="flex items-center">
                                        <a id="lfm" data-input="file" data-preview="holder" class="pr-2 mt-2 text-white">
                                            <button id="btn_lfm" class="flex items-center align-middle btn-bs-primary">
                                                <i class="pr-2 fas fa-file-alt"></i>
                                                Pilih
                                            </button>
                                        </a>
                                        <input id="file" class="block w-full py-2 mt-2 form-input" type="text" name="file" value="{{old('file') ?? $submission->file }}" readonly>
                                    </div>
                                    @error('file')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="deadline">deadline</label>
                                    <input type="date" name="deadline" id="deadline" class="form-input py-2 mt-2 block w-full @error('deadline') is-invalid @enderror" value="{{old('deadline') ?? $submission->deadline }}">
                                    @error('deadline')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end pt-5">
                                <button type="submit" class="w-full md:w-auto btn-bs-primary">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                    <!-- end of text form -->
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('customCSS')
@endsection

@section('customJS')
<!-- tinymce -->
<script src="https://cdn.tiny.cloud/1/qvfv9oh941rjqa0ca5i42hrvtg9175w7gg7vl0krwllauc26/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea.task',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
<!-- upload-button -->
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    $('#lfm').filemanager('file');
</script>
@endsection