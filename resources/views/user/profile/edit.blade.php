@if(auth()->user()->hasrole('admin') )
    @extends('layouts.admin.app')
@elseif(auth()->user()->hasrole('mentor'))
    @extends('layouts.mentor.app')
@elseif(auth()->user()->hasrole('student'))
    @extends('layouts.student.app')
@endif

@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="card-header">
            <h6 class="h6">Edit Data Profil</h6>
        </div>
        <div x-data="{tab : 'data_pribadi'}" class="max-w-2xl card-body">
            <form action="" method="POST">
                @csrf
                @method('PATCH')
                <!-- tabs -->
                <ul class="flex mt-6 border-b">
                    <li class="mr-1 -mb-px">
                        <a class="inline-block px-4 py-2 font-semibold rounded-t hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t-4 border-r' : tab === 'data_pribadi' }" href="#" @click.prevent="tab = 'data_pribadi'">data pribadi</a>
                    </li>
                    <li class="mr-1 -mb-px">
                        <a class="inline-block px-4 py-2 font-semibold rounded-t hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t-4 border-r' : tab === 'media_sosial' }" href="#" @click.prevent="tab = 'media_sosial'">media sosial</a>
                    </li>
                    <li class="mr-1 -mb-px">
                        <a class="inline-block px-4 py-2 font-semibold rounded-t hover:text-blue-800" :class="{ 'bg-white text-blue-700 border-l border-t-4 border-r' : tab === 'password' }" href="#" @click.prevent="tab = 'password'">password</a>
                    </li>
                </ul>
                <!-- end of tabs -->

                <div class="px-8 pt-10 pb-5 bg-white border-b border-l border-r content">

                    <div x-cloak x-show.transition.origin.right="tab === 'data_pribadi'">
                        <div class="grid gap-6">
                            <div>
                                <label for="foto">foto</label>
                                <input type="file" name="foto" value="{{old('foto') ?? $user->foto}}" placeholder="masukkan foto" class="form-input py-2 mt-2 block w-full @error('foto') is-invalid @enderror">
                                @error('foto')
                                <div class=" alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" value="{{old('nama') ?? $user->name}}" placeholder="masukkan nama" class="form-input py-2 mt-2 block w-full @error('nama') is-invalid @enderror">
                                @error('nama')
                                <div class=" alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="email">email</label>
                                <input type="text" name="email" value="{{old('email') ?? $user->email}}" placeholder="masukkan email" class="form-input py-2 mt-2 block w-full @error('email') is-invalid @enderror">
                                @error('email')
                                <div class=" alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="telepon">telepon</label>
                                <input type="text" name="telepon" value="{{old('telepon') ?? $user->phone}}" placeholder="masukkan nomor telepon" class="form-input py-2 mt-2 block w-full @error('telepon') is-invalid @enderror">
                                @error('telepon')
                                <div class=" alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="alamat">alamat</label>
                                <input type="text" name="alamat" value="{{old('alamat') ?? $user->detail->address ?? ''}}" placeholder="masukkan alamat" class="form-input py-2 mt-2 block w-full @error('alamat') is-invalid @enderror">
                                @error('alamat')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="biodata">biodata</label>
                                <textarea rows="4" name="biodata" placeholder="biodata" class="form-input py-2 mt-2 block w-full @error('biodata') is-invalid @enderror">{{old('biodata') ?? $user->detail->biodata ?? ''}}</textarea>
                            </div>

                            <div class="flex justify-end pt-5">
                                <button type="submit" class="w-full md:w-auto btn-bs-primary">Update</button>
                            </div>
                        </div>

                    </div>

                    <div x-cloak x-show.transition.origin.right="tab === 'media_sosial'">
                        <div class="grid gap-6">
                            <div>
                                <label for="facebook">facebook</label>
                                <input type="text" name="facebook" value="{{old('facebook') ?? $user->detail->facebook ?? ''}}" placeholder="masukkan facebook" class="form-input py-2 mt-2 block w-full @error('facebook') is-invalid @enderror">
                                @error('facebook')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="twitter">twitter</label>
                                <input type="text" name="twitter" value="{{old('twitter') ?? $user->detail->twitter ?? ''}}" placeholder="masukkan twitter" class="form-input py-2 mt-2 block w-full @error('twitter') is-invalid @enderror">
                                @error('twitter')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="instagram">instagram</label>
                                <input type="text" name="instagram" value="{{old('instagram') ?? $user->detail->instagram ?? ''}}" placeholder="masukkan instagram" class="form-input py-2 mt-2 block w-full @error('instagram') is-invalid @enderror">
                                @error('instagram')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="github">github</label>
                                <input type="text" name="github" value="{{old('github') ?? $user->detail->github ?? ''}}" placeholder="masukkan github" class="form-input py-2 mt-2 block w-full @error('github') is-invalid @enderror">
                                @error('github')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="linkedin">linkedin</label>
                                <input type="text" name="linkedin" value="{{old('linkedin') ?? $user->detail->linkedin ?? ''}}" placeholder="masukkan linkedin" class="form-input py-2 mt-2 block w-full @error('linkedin') is-invalid @enderror">
                                @error('linkedin')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="flex justify-end pt-5">
                                <button type="submit" class="w-full md:w-auto btn-bs-primary">Update</button>
                            </div>
                        </div>
                    </div>

                    <div x-cloak x-show.transition.origin.right="tab === 'password'">
                        <div class="grid gap-6">
                            <div class="flex flex-col gap-6 md:flex-row">
                                <div class="flex-1">
                                    <label for="password">password</label>
                                    <input type="text" name="password" placeholder="masukkan password" class="block w-full py-2 mt-2 form-input">
                                    @error('password')
                                    <div class=" alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="flex-1">
                                    <label for="password_confirmation">konfirmasi password</label>
                                    <input type="text" name="password_confirmation" placeholder="masukkan ulang password" class="block w-full py-2 mt-2 form-input">
                                    @error('password_confirmation')
                                    <div class=" alert alert-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end pt-5">
                                <button type="submit" class="w-full md:w-auto btn-bs-primary">Update</button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection