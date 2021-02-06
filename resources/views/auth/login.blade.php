@extends('layouts.user.app')
@section('content')

<div class="container max-w-full mx-auto py-24 px-0 md:px-6">
    <div class="max-w-md mx-auto py-10 px-3 md:px-8 bg-gray-100 rounded-lg">
        <div class="relative flex flex-wrap">
            <div class="w-full relative font-bold">
                <div class="md:mt-6">
                    <div class="flex-col flex-wrap text-center font-semibold text-4xl text-gray-600">
                        <svg class="h-20 w-20 my-3 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg>
                        <span>Login</span>

                    </div>
                    @if(session()->has('status'))
                    <p class="alert alert-warning">{{session()->get('status')}}</p>
                    @endif
                    <form action="{{route('login')}}" method="post" class="mt-8">
                        @csrf
                        <div class="mx-auto max-w-lg text-sm md:text-base ">

                            <div class="py-1">
                                <span class="px-1 text-gray-600">Email</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="email" placeholder="Masukan Email" type="email" value="{{old('email')}}" 
                                    class="input-text-icon @error('email') input-is-invalid @enderror" />
                                </div>

                                @error('email')
                                <div class="alert alert-warning">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="py-1">
                                <span class="px-1 text-gray-600">Password</span>
                                <div>
                                    <span class="z-10 text-gray-600 absolute pl-3 pt-3">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input name="password" placeholder="Masukan Password" type="password" class="input-text-icon @error('password') input-is-invalid @enderror" />
                                </div>
                                @error('password')
                                <div class="alert alert-warning">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="text-right my-5">
                                <a href="{{route('password.request')}}" class="text-blue-500 hover:text-blue-700 border-b-2 border-blue-500 hover:border-blue-700">
                                    Lupa Password?</a>
                            </div>
                            <div class="flex flex-wrap">
                                <button type="submit" class="btn btn-primary w-full">
                                    Login
                                </button>
                            </div>
                            <div class="my-5 text-center">
                                <p>Belum punya akun Ngajar.in?
                                    <a href="{{route('register')}}" class="text-blue-500 hover:text-blue-700 border-b-2 border-blue-500 hover:border-blue-700 font-bold">
                                        Daftar disini</a>
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