@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="card-header">
                <h6 class="h6">Update Tag</h6>
            </div>
            <div class="card-body">
                <form action="{{route('admin.tag.update', ['tag' => $tag])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-input py-2 mt-2 block w-full @error('nama') is-invalid @enderror" value="{{old('nama') ?? $tag->name}}">
                        @error('nama')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="icon">Icon</label>
                        <div class="flex items-center">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="pr-2 mt-2 text-white">
                                <button id="btn_lfm" class="flex items-center align-middle btn-bs-primary">
                                    <i class="pr-2 fad fa-camera"></i>
                                    Pilih
                                </button>
                            </a>
                            <input id="thumbnail" class="block w-full py-2 mt-2 form-input" type="text" name="icon" value="{{old('icon') ?? $tag->icon}}" readonly>
                        </div>
                        <div class="mt-8">
                            <label>Preview : </label>
                            <div id="holder" class="max-w-max max-h-40" x-data>
                                <img src="{{old('icon') ?? $tag->icon}}" class="w-full h-full border-2 border-dashed">
                            </div>
                        </div>
                        @error('icon')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="w-full md:w-auto btn-bs-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('customCSS')
<style>
    #holder img {
        height: 10rem !important;
        width: auto;
        margin-top: 1rem;
    }
</style>
@endsection

@section('customJS')
<!-- upload-button -->
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endsection