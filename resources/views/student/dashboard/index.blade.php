@extends('layouts.student.app-new')
@section('content')

<section class="min-h-screen mb-10 bg-gray-100" style="overflow-x: hidden">
    <div class="relative md:w-[110%] w-full md:left-[-5%] bg-[gray-700] pt-10 pb-14 md:pb-24 md:rounded-bl-[50%] md:rounded-br-[50%]" style="background: url( {{asset('img/patternpad.svg')}} )">

        <div class="px-10">
            <div class="flex flex-col items-center w-full max-w-3xl gap-10 p-10 mx-auto text-center text-gray-100 md:text-left rounded-xl md:flex-row">
                <div class="flex-grow-0 flex-shrink-0 overflow-hidden rounded-full w-28 h-28">
                    <img src="https://ui-avatars.com/api/?background=dddddd&name=pak_bagas" class="w-full ">
                </div>
                <div class="flex flex-col justify-center flex-1 h-full gap-1 font-semibold">
                    <h6 class="text-2xl">Student</h6>
                    <h6 class="text-xl">student@example.com</h6>
                    <div class="flex justify-center gap-2 text-3xl text-gray-200 md:justify-start">
                        <a href="">
                            <i class=" fab fa-github-square hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-linkedin hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-facebook-square hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-twitter-square hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-instagram-square hover:text-white"></i>
                        </a>

                    </div>
                </div>
                <div class="flex flex-row md:flex-col">
                    <button class="text-base font-bold text-white border border-white hover:bg-white hover:text-gray-700 btn">Profil</button>
                    <button class="text-base font-bold text-white btn">Keluar</button>
                </div>
            </div>
        </div>

    </div>

    <div class="relative w-full max-w-[800px] gap-10 px-10 mx-auto -mt-16 text-gray-700 md:flex-row ">
        <div class="flex flex-col items-center justify-between px-10 py-5 bg-gray-800 shadow-md md:flex-row rounded-xl">
            <h6 class="text-lg font-semibold text-center text-gray-300 normal-case md:text-left">Upgrade skill kamu dengan course terbaru dari kami!</h6>
            <button class="text-base font-semibold btn btn-primary ">Semua Course</button>
        </div>

        <div class="grid grid-cols-1 gap-5 mt-10 md:grid-cols-2">

            <!-- lanjutkan course -->
            <div class="flex flex-col gap-4 px-8 py-5 bg-white shadow-md rounded-xl">
                <h6 class="text-gray-800 h6">Lanjukan Course</h6>

                <div>
                    <!-- items -->
                    <a href="" class="mb-1 duration-100">
                        <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                            <div class="flex items-center gap-2">
                                <div>
                                    <div class="grid w-10 h-10 bg-gray-700 border rounded-full md:w-14 md:h-14 place-items-center">
                                        <!-- diganti gambar -->
                                        <!-- <img src="" class="w-full h-full" alt="missing img"> -->
                                        <i class="ml-1 text-xl text-gray-100 fab fa-react"></i>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 md:text-base line-clamp-1">
                                        ReactJS untuk Pemula ReactJS untuk Pemula
                                    </span>

                                    <div class="flex text-xs text-gray-600 md:text-sm line-clamp-1">
                                        <span class="mr-2">
                                            4 / 12 Progress Submission
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- items -->
                </div>

                <div>
                    <button class="w-full text-base font-semibold border-opacity-50 border-none btn btn-outline-primary border-primary-lighter hover:bg-primary-lighter">Lihat Semua</button>
                </div>

            </div>
            <!-- end of lanjutkan course -->

            <!-- kelas saya -->
            <div class="flex flex-col gap-4 px-8 py-5 bg-white shadow-md rounded-xl">
                <h6 class="text-gray-800 h6">Kelas Saya</h6>

                <div>
                    <!-- items -->
                    <a href="" class="mb-1 duration-100">
                        <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                            <div class="flex items-center gap-2">
                                <div>
                                    <div class="grid w-10 h-10 overflow-hidden border rounded-full md:w-14 md:h-14 place-items-center">
                                        <!-- diganti gambar -->
                                        <img src="https://ui-avatars.com/api/?background=dddddd&name=pak_bagas" class="w-full h-full" alt="missing img">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 md:text-base line-clamp-1">
                                        Kelas Database pak Bagas
                                    </span>

                                    <div class="flex text-xs text-gray-600 md:text-sm line-clamp-1">
                                        <span class="mr-2">
                                            kunjungi kelas
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- items -->
                </div>

                <div>
                    <button class="w-full text-base font-semibold border-opacity-50 border-none btn btn-outline-primary border-primary-lighter hover:bg-primary-lighter">Lihat Semua</button>
                </div>

            </div>
            <!-- end of kelas saya -->


        </div>

        <div class="flex flex-col items-center justify-between px-10 py-5 my-10 bg-gray-800 shadow-md md:flex-row rounded-xl">
            <h6 class="text-lg font-semibold text-gray-300 normal-case">Butuh bantuan atau menemukan bug?</h6>
            <button class="text-base font-semibold btn btn-success">
                <i class="mr-1 fas fa-comments"></i>
                Hubungi Admin
            </button>
        </div>

    </div>

</section>

@endsection

@section('customCSS')

@endsection