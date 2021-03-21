@extends('layouts.user.app')
@section('content')


<!-- Section 1 -->
<section class="w-full min-h-screen px-8 py-10 bg-gray-100 md:py-16 xl:px-8">
    <div class="max-w-5xl mx-auto md:mt-10">
        <div class="flex flex-col items-center md:flex-row ">

            <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                <!-- <p class="font-semibold text-blue-500 uppercase">Building Businesses</p> -->
                <!-- <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                    Changing The Way People Do Business.
                </h2> -->
                <img
                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Empty%20State/EmptyState3/Empty-3-5.png"
                alt="missing img" 
                class="hidden transform translate-y-10 md:inline">
                <!-- <p class="text-xl text-gray-600 md:pr-16">Learn how to engage with your visitors and teach them about your mission. We're revolutionizing the way customers and businesses interact.</p> -->
            </div>

            <div class="w-full mt-16 md:mt-0 md:w-2/5">
                <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                    <h3 class="mb-6 text-2xl font-semibold text-center">Masuk ke akun Ngajar.in anda</h3>

                    @if(session()->has('status'))
                    <p class="alert alert-danger">{{session()->get('status')}}</p>
                    @endif
                    <form action="{{route('login')}}" method="post" class="mt-8">
                        @csrf
                        <div class="py-1">
                            <label for="email" class="px-1 text-sm text-gray-600 md:text-base">Email</label>
                            <div>
                                <span class="absolute z-10 pt-4 pl-3 text-gray-600 md:pt-3">
                                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </span>
                                <input type="text" name="email" id="email" placeholder="Masukan Email" type="email" value="{{old('email')}}" class="input-text-icon @error('email') input-is-invalid @enderror" />
                            </div>

                            @error('email')
                            <div class="mt-2 alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="py-1">
                            <label for="password" class="px-1 text-sm text-gray-600 md:text-base">Password</label>
                            <div>
                                <span class="absolute z-10 pt-4 pl-3 text-gray-600 md:pt-3">
                                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input name="password" id="password" placeholder="Masukan Password" type="password" class="input-text-icon @error('password') input-is-invalid @enderror" />
                            </div>
                            @error('password')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="block pt-4">
                            <button type="submit" class="w-full btn-bs-primary">Masuk</button>
                        </div>
                    </form>
                    <p class="w-full mt-4 text-sm text-center text-gray-500 md:text-base">Belum Punya Akun Ngajar.In? <a href="#_" class="text-blue-500 underline">Daftar Disini</a></p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection