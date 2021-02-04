@extends('layouts.user.app')
@section('content')
<!-- <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{old('telepon')}}">
                        @error('telepon')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Konfirmasi</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<div class="container max-w-full mx-auto py-24 px-0 md:px-6">
    <div class="max-w-md mx-auto py-10 px-3 md:px-8 bg-gray-100 rounded-lg">
        <div class="relative flex flex-wrap">
            <div class="w-full relative font-bold">
                <div class="md:mt-6">
                    <div class="flex-col flex-wrap text-center font-semibold text-4xl text-gray-600">
                        <svg class="h-20 w-20 my-3 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg>
                        <span>Register</span>

                    </div>
                    <form class="mt-8" action="{{route('register')}}" method="post" x-data="{password: '',password_confirm: ''}">
                        @csrf
                        <div class="mx-auto max-w-lg ">
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Nama Lengkap</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input placeholder="isi dengan nama lengkap" type="text" class="input-text-icon @error('nama') input-is-invalid @enderror" name="nama" value="{{old('nama')}}">
                                </div>
                                @error('nama')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Email</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </span>
                                    <input placeholder="isi dengan email yang aktif" type="email" class="input-text-icon @error('email') input-is-invalid @enderror" name="email" value="{{old('email')}}">
                                </div>

                                @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">HP / Nomor Telepon</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                        </svg>
                                    </span>
                                    <input placeholder="masukkan nomor telepon" type="number" class="input-text-icon @error('telepon') input-is-invalid @enderror" name="telepon" value="{{old('telepon')}}">
                                </div>

                                @error('telepon')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Kata Sandi</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input placeholder="masukkan kata sandi" type="password" x-model="password" class="input-text-icon @error('password') input-is-invalid @enderror" name="password" value="">
                                </div>

                                @error('password')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- <div class="flex justify-start ml-4 p-1">
                                <li class="flex items-center py-1">
                                    <div :class="{'bg-green-200 text-green-700': password.length > 7, 'bg-red-200 text-red-700':password.length < 7 }" class=" rounded-full p-1 fill-current ">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path x-show="password.length > 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            <path x-show="password.length < 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                                        </svg>
                                    </div>
                                    <span :class="{'text-green-700': password.length > 7, 'text-red-700':password.length < 7 }" class="font-medium text-sm ml-3" x-text="password.length > 7 ? 'The minimum length is reached' : 'At least 8 characters required' "></span>
                                </li>
                            </div> -->

                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Konfirmasi Kata Sandi</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input placeholder="masukkan konfirmasi kata sandi" type="password" x-model="password_confirm" class="input-text-icon @error('password_confirmation') input-is-invalid @enderror" name="password_confirmation" value="">
                                </div>

                                @error('password_confirmation')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- <div class="flex justify-start ml-4 p-1">
                                <ul>
                                    <li class="flex items-center py-1">
                                        <div :class="{'bg-green-200 text-green-700': password == password_confirm && password.length > 0, 'bg-red-200 text-red-700':password != password_confirm || password.length == 0}" class=" rounded-full p-1 fill-current ">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path x-show="password == password_confirm && password.length > 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                <path x-show="password != password_confirm || password.length == 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                                            </svg>
                                        </div>
                                        <span :class="{'text-green-700': password == password_confirm && password.length > 0, 'text-red-700':password != password_confirm || password.length == 0}" class="font-medium text-sm ml-3" x-text="password == password_confirm && password.length > 0 ? 'Passwords match' : 'Passwords do not match' "></span>
                                    </li>
                                </ul>
                            </div> -->

                            <!-- <button :disabled="password != password_confirm || password.length < 7" class="mt-5 w-full block btn btn-primary">
                                Register
                            </button> -->
                            <div class="mt-5 ">
                                <button class="w-full block btn btn-primary">
                                    Register
                                </button>
                            </div>
                            <div class="my-5 text-center">
                                <p>Sudah punya akun Ngajar.in?
                                    <a href="{{route('login')}}" class="text-blue-500 hover:text-blue-700 border-b-2 border-blue-500 hover:border-blue-700">
                                        Login disini</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection