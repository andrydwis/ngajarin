@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="card-header">
            <h6 class="h6">Tambahkan Sertifikat Baru</h6>
        </div>
        <div class="card-body">
            <div class="container mb-4">

                <div class="px-4 py-4 pt-4 bg-white ">
                    <!-- text form -->
                    <div>
                        <form action="{{route('admin.course.certificate.store', ['course' => $course->slug])}}" method="post">
                            @csrf
                            <div class="grid gap-6 pt-5">
                                <div>
                                    <label for="file">Template Sertifikat</label>
                                    <div class="flex items-center">
                                        <a id="lfm" data-input="file" data-preview="holder" class="pr-2 mt-2 text-white">
                                            <button id="btn_lfm" class="flex items-center align-middle btn-bs-primary">
                                                <i class="pr-2 fas fa-file-alt"></i>
                                                Pilih
                                            </button>
                                        </a>
                                        <input id="file" class="block w-full py-2 mt-2 form-input" type="text" name="file" value="{{old('file')}}" readonly>
                                    </div>
                                    @error('file')
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
<!-- upload-button -->
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    $('#lfm').filemanager('file');
</script>
@endsection