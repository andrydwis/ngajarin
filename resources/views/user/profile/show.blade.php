@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="flex items-center justify-between card-header">
            <h6 class="h6">Data Profil</h6>

            <a href="{{route('user.profile.edit')}}" class="flex justify-end">
                <button type="submit" class="w-full md:w-auto btn-bs-primary">Edit Data</button>
            </a>
        </div>
        <div x-data="{tab : 'data_pribadi'}" class="card-body">
            <!-- tabs -->
            <ul class="flex mt-6 border-b">
                <li class="mr-1 -mb-px">
                    <a class="inline-block px-4 py-2 font-semibold rounded-t hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t-4 border-r' : tab === 'data_pribadi' }" href="#" @click.prevent="tab = 'data_pribadi'">data pribadi</a>
                </li>
                <li class="mr-1 -mb-px">
                    <a class="inline-block px-4 py-2 font-semibold rounded-t hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t-4 border-r' : tab === 'media_sosial' }" href="#" @click.prevent="tab = 'media_sosial'">media sosial</a>
                </li>
            </ul>
            <!-- end of tabs -->

            <div class="px-8 pt-10 pb-5 bg-white border-b border-l border-r content">

                <div x-cloak x-show.transition.origin.right="tab === 'data_pribadi'">
                    <div class="grid gap-6">
                        <div class="flex flex-col">
                            @if($user->foto)
                            <div class="self-center w-40 h-40">
                                <img src="{{$user->foto}}" class="object-cover w-56 h-40">
                            </div>
                            @else
                            <div class="self-center w-40 h-40">
                                <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 border-dashed hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                    <i class="text-4xl fas fa-camera"></i>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="nama">Nama</label>
                            <input disabled type="text" name="nama" value="{{old('nama') ?? $user->name}}" class="form-input py-2 mt-2 block w-full @error('nama') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="email">email</label>
                            <input disabled type="text" name="email" value="{{old('email') ?? $user->email}}" class="form-input py-2 mt-2 block w-full @error('email') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="telepon">telepon</label>
                            <input disabled type="text" name="telepon" value="{{old('telepon') ?? $user->phone}}" class="form-input py-2 mt-2 block w-full @error('telepon') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="alamat">alamat</label>
                            <input disabled type="text" name="alamat" value="{{old('alamat') ?? $user->detail->address ?? ''}}" class="form-input py-2 mt-2 block w-full @error('alamat') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="biodata">biodata</label>
                            <textarea disabled rows="4" name="biodata" class="form-input py-2 mt-2 block w-full @error('biodata') is-invalid @enderror">{{old('biodata') ?? $user->detail->biodata ?? ''}}</textarea>
                        </div>


                        <div>
                            <div for="alamat">email terverifikasi pada :</div>
                            <div>{{$user->email_verified_at->diffForHumans()}}</div>
                        </div>
                    </div>

                </div>

                <div x-cloak x-show.transition.origin.right="tab === 'media_sosial'">
                    <div class="grid gap-6">
                        <div>
                            <label for="facebook">facebook</label>
                            <input disabled type="text" name="facebook" value="{{old('facebook') ?? $user->detail->facebook ?? ''}}" class="form-input py-2 mt-2 block w-full @error('facebook') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="twitter">twitter</label>
                            <input disabled type="text" name="twitter" value="{{old('twitter') ?? $user->detail->twitter ?? ''}}" class="form-input py-2 mt-2 block w-full @error('twitter') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="instagram">instagram</label>
                            <input disabled type="text" name="instagram" value="{{old('instagram') ?? $user->detail->instagram ?? ''}}" class="form-input py-2 mt-2 block w-full @error('instagram') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="github">github</label>
                            <input disabled type="text" name="github" value="{{old('github') ?? $user->detail->github ?? ''}}" class="form-input py-2 mt-2 block w-full @error('github') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="linkedin">linkedin</label>
                            <input disabled type="text" name="linkedin" value="{{old('linkedin') ?? $user->detail->linkedin ?? ''}}" class="form-input py-2 mt-2 block w-full @error('linkedin') is-invalid @enderror">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

{{-- <div>
    {{$user->name}} <br>
{{$user->email}} <br>
{{$user->email_verified_at->diffForHumans()}} <br>
{{$user->phone}} <br>
<hr>
detail <br>
@if($user->detail)
{{$user->detail->photo}} <br>
{{$user->detail->biodata}} <br>
{{$user->detail->facebook}} <br>
{{$user->detail->twitter}} <br>
{{$user->detail->instagram}} <br>
{{$user->detail->github}} <br>
{{$user->detail->linkedin}}
@else
anda belum melengkapi detail profil anda <br>
@endif
<a href="{{route('user.profile.edit')}}">update detail</a>
</div> --}}