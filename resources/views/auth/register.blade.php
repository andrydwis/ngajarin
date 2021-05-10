@extends('layouts.guest.app')
@section('content')
<!-- Section 1 -->
<section class="w-full min-h-screen px-8 py-10 bg-gray-100 md:py-16 xl:px-8">
    <div class="max-w-5xl mx-auto mt-3 mb-5 ">

        <div class="bg-white shadow-xl rounded-xl">
            <div class="flex flex-col items-center md:flex-row">

                <div class="hidden w-full md:p-10 md:w-2/4 md:pr-16 md:inline ">
                    <h2 class="text-lg font-extrabold leading-none text-center text-black transform -translate-y-8 md:text-3xl">
                        Mulai dengan mendaftarkan diri anda sekarang
                    </h2>
                    <img src="{{ asset('img/register_img.svg') }}" alt="missing img" class="transform scale-125">

                </div>

                <div class="w-full p-10 mt-5 md:mt-5 md:w-2/4">
                    <div class="relative z-10 h-auto py-10 overflow-hidden border-gray-300 rounded-lg px-7">
                        <h2 class="inline text-xl font-extrabold leading-none text-center text-black md:hidden md:text-3xl">
                            Mulai dengan mendaftarkan diri anda sekarang
                        </h2>

                        <form x-data="{tab : 'data1'}" action="{{route('register')}}" method="post" class="relative flex mt-8 " :class="{'flex-col' : tab === 'data1', 'flex-col-reverse' : tab === 'data2'}">
                            @csrf



                            <!-- data 1 -->
                            <div x-cloak style="min-height: 300px;" :class="{'w-full absolute' : tab != 'data1'}" x-show="tab === 'data1'" x-transition:enter="transition duration-1000 opacity-0" x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition duration-1000 " x-transition:leave-start="transform opacity-10" x-transition:leave-end="transform -translate-x-full opacity-0">

                                <div class="py-1">
                                    <label for="nama" class="px-1 text-sm text-gray-600 md:text-base">Nama Lengkap</label>
                                    <div>
                                        <span class="absolute z-10 pt-3 pl-3 text-gray-600">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="nama" id="nama" placeholder="Masukan Nama Anda" type="nama" value="{{old('nama')}}" class="input-text-icon @error('nama') input-is-invalid @enderror" />
                                    </div>
                                    @error('nama')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

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
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="py-1">
                                    <label for="telepon" class="px-1 text-sm text-gray-600 md:text-base">No HP/Telepon</label>
                                    <div>
                                        <span class="absolute z-10 pt-3 pl-3 text-gray-600">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="telepon" id="telepon" placeholder="Masukan telepon" type="telepon" value="{{old('telepon')}}" class="input-text-icon @error('telepon') input-is-invalid @enderror" />
                                    </div>
                                    @error('telepon')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="block pt-4">
                                    <button @click="tab = 'data2'" type="button" class="w-full btn-bs-primary focus:outline-none bg-pri">
                                        Lanjut
                                        <i class="ml-1 text-xs text-white fas fa-chevron-right"></i>
                                    </button>
                                </div>

                            </div>
                            <!-- end of data 1 -->

                            <!-- data 2 -->
                            <div x-cloak style="min-height: 300px;" :class="{'absolute w-full' : tab != 'data2'}" x-show="tab === 'data2'" x-transition:enter="transition duration-1000 opacity-0" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition duration-1000 " x-transition:leave-start="transform opacity-10" x-transition:leave-end="transform translate-x-full opacity-0">

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

                                <div class="py-1">
                                    <label for="password_confirmation" class="px-1 text-sm text-gray-600 md:text-base">Konfirmasi Password</label>
                                    <div>
                                        <span class="absolute z-10 pt-4 pl-3 text-gray-600 md:pt-3">
                                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input name="password_confirmation" id="password_confirmation" placeholder="Masukan Password" type="password" class="input-text-icon @error('password_confirmation') input-is-invalid @enderror" />
                                    </div>
                                </div>


                                <div class="block pt-4">
                                    <button type="submit" class="w-full mx-0 text-base btn btn-primary focus:outline-none">Daftar</button>
                                    <hr class="my-1">
                                    <button @click="tab = 'data1'" type="button" class="w-full mx-0 text-base btn btn-outline-primary">
                                        <i class="mr-1 text-xs text-primary fas fa-chevron-left"></i> Kembali
                                    </button>
                                </div>

                            </div>
                            <!-- end of data 2 -->

                        </form>
                        <p class="w-full mt-4 text-sm text-center text-gray-500 md:text-base">Sudah Punya Akun? <a href="{{ route('login') }}" class="text-blue-500 underline"> Masuk Disini</a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection