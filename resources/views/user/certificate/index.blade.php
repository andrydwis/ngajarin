@extends('layouts.student.app-new')
@section('content')
<section class="px-3 antialiased bg-indigo-600">

    <div class="container min-h-screen mx-auto text-center py-28 sm:px-4">
        <h1 class="text-4xl font-semibold leading-10 tracking-tight text-white sm:text-4xl sm:leading-none md:text-5xl xl:text-6xl">
            <span class="block">Cek validitas sertifikat</span>
            <div class="relative inline-block mt-3">
                course <span class="font-bold">Ngajar.in</span>
            </div>
        </h1>
        <div class="max-w-lg mx-auto mt-6 text-sm text-center text-gray-100 md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">gunakan fitur pengecekan sertifikat untuk memastikan kelulusan peserta dalam suatu kursus di platform ngajar.in</div>

        <!-- pencarian -->
        <form action="{{route('verify-certificate.store')}}" method="POST">
            @csrf
            <div class="relative flex items-center max-w-md mx-auto mt-12 overflow-hidden text-center rounded-full">
                <input type="text" name="nomor_seri" value="{{old('nomor_seri')}}" placeholder="Nomor seri sertifikat" class="w-full h-12 px-6 py-2 font-medium text-gray-600 focus:outline-none">

                <span class="relative top-0 right-0 block">
                    <button type="submit" class="inline-flex items-center justify-center w-32 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out border border-transparent bg-primary-darker hover:bg-primary-lighter focus:outline-none active:bg-primary-darker">
                        Validasi
                    </button>
                </span>
            </div>
        </form>
        <!-- end of pencarian -->

    </div>

</section>
@endsection