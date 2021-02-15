@extends('layouts.admin.app-new-new')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h6 class="h6">Tambahkan Tag Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{route('admin.tag.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-input py-2 mt-2 block w-full @error('nama') is-invalid @enderror" value="{{old('nama')}}">
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
                            <input id="thumbnail" class="block w-full py-2 mt-2 form-input" type="text" name="icon" value="{{old('icon')}}" readonly>
                        </div>
                        @error('icon')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-8">
                        <label>Preview : </label>
                        <div id="holder" class="w-40 h-40" x-data>
                            <button type="button" @click="$('#btn_lfm').click();">
                                <div class="grid w-40 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 border-dashed hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                    <i class="text-4xl fad fa-camera"></i>
                                </div>
                            </button>
                        </div>
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
    div#holder img {
        height: 10rem !important;
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