@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="card-header">
            <h6 class="h6">Edit Data Episode {{$episode->title}}</h6>
        </div>
        <div class="card-body">
            <div class="container mb-4 shadow-md" x-data="{ tab: '{{$episode->type}}' }">
                <!-- tabs -->
                <ul class="flex mt-6 border-b">
                    <li class="mr-1 -mb-px">
                        <a class="inline-block px-4 py-2 font-semibold rounded-t hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t border-r' : tab === 'video' }" href="#" @click.prevent="tab = 'video'">Video</a>
                    </li>
                    <li class="mr-1 -mb-px">
                        <a class="inline-block px-4 py-2 font-semibold text-blue-500 hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t border-r' : tab === 'text' }" href="#" @click.prevent="tab = 'text'">Text</a>
                    </li>
                </ul>
                <!-- end of tabs -->
                <div class="px-4 py-4 pt-4 bg-white border-b border-l border-r content">
                    <!-- video form -->
                    <div x-cloak x-show.transition.origin.right="tab === 'video'">
                        <form action="{{route('admin.course.episode.update', [ 'course' => $course->slug, 'episode' => $episode->slug ])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="grid gap-6 pt-5">
                                <div>
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-input py-2 mt-2 block w-full @error('judul') is-invalid @enderror" value="{{old('judul') ?? $episode->title }}">
                                    @error('judul')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="link">Link Video <span class="text-xs text-gray-600 lowercase">(ex: https://youtu.be...)</span></label>
                                    @if($episode->type == 'video')
                                    <input type="text" name="link" id="link" class="form-input py-2 mt-2 block w-full @error('link') is-invalid @enderror" value="{{old('link') ?? $episode->link }}">
                                    @else
                                    <input type="text" name="link" id="link" class="form-input py-2 mt-2 block w-full @error('link') is-invalid @enderror" value="{{old('link')}}">
                                    @endif
                                    @error('link')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-textarea deskripsi @error('deskripsi') is-invalid @enderror">{!! old('deskripsi') ?? $episode->description !!}</textarea>
                                    @error('deskripsi')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="tipe" value="video">
                            </div>
                            <div class="flex justify-end pt-5">
                                <button type="submit" class="w-full md:w-auto btn-bs-primary">Perbarui</button>
                            </div>
                        </form>
                    </div>
                    <!-- end of video form -->

                    <!-- text form -->
                    <div x-cloak x-show.transition.origin.left="tab === 'text'">
                        <form action="{{route('admin.course.episode.update', [ 'course' => $course->slug, 'episode' => $episode->slug ])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="grid gap-6 pt-5">
                                <div>
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-input py-2 mt-2 block w-full @error('judul') is-invalid @enderror" value="{{old('judul') ?? $episode->title }}">
                                    @error('judul')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-textarea deskripsi @error('deskripsi') is-invalid @enderror">{!! old('deskripsi') ?? $episode->description !!}</textarea>
                                    @error('deskripsi')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="thumbnail">Lampiran <span class="text-xs text-gray-600">(zip, word, pdf, dll)</span></label>
                                    <div class="flex items-center">
                                        <a id="lfm" data-input="file" data-preview="holder" class="pr-2 mt-2 text-white">
                                            <button id="btn_lfm" class="flex items-center align-middle btn-bs-primary">
                                                <i class="pr-2 fas fa-file-alt"></i>
                                                Pilih
                                            </button>
                                        </a>
                                        @if($episode->type == 'text')
                                        <input type="text" name="file" id="file" class="block w-full py-2 mt-2 form-input" value="{{old('file') ?? $episode->link}}" readonly>
                                        @else
                                        <input type="text" name="file" id="file" class="block w-full py-2 mt-2 form-input" value="{{old('file')}}" readonly>
                                        @endif
                                    </div>
                                    @error('file')
                                    <div class="alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="tipe" value="text">
                            </div>
                            <div class="flex justify-end pt-5">
                                <button type="submit" class="w-full md:w-auto btn-bs-primary">Perbarui</button>
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
        selector: 'textarea.deskripsi',
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