@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center">

    <a href="{{route('user.post.index')}}" class="fixed z-20 inline lg:hidden left-4 bottom-4">
        <button class="w-16 h-16 text-white duration-300 rounded-full focus:outline-none bg-primary-lighter hover:bg-primary">
            <i class="text-xl fill-current fas fa-chevron-left"></i>
        </button>
    </a>

    <div class="flex flex-col flex-wrap items-start max-w-5xl py-5 xl:max-w-7xl md:flex-row md:mx-5 ">

        <div class="flex-none hidden mr-9 lg:block lg:sticky lg:self-start top-10 w-52">

            <div class="lg:sticky lg:text-center">

                <!-- isi sidebar -->
                <div class="flex flex-col pt-10">

                    <a href="{{route('user.post.index')}}">
                        <div class="pl-0 my-1 text-base rounded-full sidebar-item btn btn-outline-primary">
                            <i class="mr-1 text-sm text-primary-lighter fas fa-chevron-left"></i> Kembali
                        </div>
                    </a>

                    <hr class="my-4 ml-2">

                    <a href="{{route('user.post.index')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="mr-1 text-sm fill-current fas fa-bars"></i> Postingan Terbaru
                        </div>
                    </a>

                    <a href="{{route('user.post.my-post')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="mx-1 text-sm fill-current fas fa-history"></i> Postingan Saya
                        </div>
                    </a>

                    <a href="{{route('user.post.bookmark')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="ml-1 mr-2 text-sm fill-current fas fa-bookmark"></i> Disimpan
                        </div>
                    </a>

                </div>
                <!-- end of sidebar -->


            </div>

        </div>

        <div class="flex-1 min-h-[100vh]">

            <!-- postingan list -->
            <div class="pt-10 ">

                <div class="card w-auto mx-4 lg:mx-0 lg:w-[40rem] rounded-2xl">
                    <div class="card-header">
                        <h6 class="text-gray-600 h6"> Buat Postingan Baru</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{route('user.post.store')}}" method="post">
                            @csrf

                            <div class="grid grid-flow-col grid-cols-4 gap-4">
                                <div class="col-span-2 md:col-span-3">
                                    <input type="text" class="w-full text-sm placeholder-gray-600 md:text-base form-input" placeholder="Masukkan judul postingan" name="judul" id="judul" value="{{old('judul')}}">
                                    @error('judul')
                                    <div class="mt-2 alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-span-2 md:col-span-1">
                                    <select name="tag" class="pl-5 pr-10 text-sm text-gray-600 md:text-base form-select">
                                        <option value="" selected disabled>Pilih tag</option>
                                        @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tag')
                                    <div class="mt-2 alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-7">
                                <textarea class="w-full placeholder-gray-500 form-textarea" name="konten" id="konten" rows="15" placeholder="Isi dengan pertanyaan, bug, atau topik bahasan lain yang tidak mengandung unsur SARA">{{old('konten')}}</textarea>
                                @error('konten')
                                <div class="mt-2 alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex justify-end mt-5">
                                <button type="submit" class="px-10 text-base rounded-full btn btn-primary bg-primary-lighter hover:bg-primary">
                                    Post
                                </button>
                            </div>
                        </form>
                    </div>



                </div>

            </div>
            <!-- end of postingan list -->
        </div>
    </div>
</div>

@endsection

@section('customJS')
<!-- tinymce -->
<script src="https://cdn.tiny.cloud/1/qvfv9oh941rjqa0ca5i42hrvtg9175w7gg7vl0krwllauc26/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea',
        menubar: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "emoticons template paste textpattern"
        ],
        toolbar: "bold italic strikethrough bullist numlist emoticons | link image",
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
@endsection