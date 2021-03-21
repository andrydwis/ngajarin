<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ngajarin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="antialiased">

    <main class="w-full px-3 antialiased bg-indigo-600 lg:px-6">
        <div class="mx-auto max-w-7xl">
            <!-- navbar -->
            <nav class="flex items-center w-full h-24 select-none" x-data="{ showMenu: false }">
                <div class="relative flex flex-wrap items-center justify-between w-full h-24 mx-auto font-medium md:justify-center">
                    <a href="#_" class="w-1/4 py-4 pl-6 pr-4 md:pl-4 md:py-0">
                        <span class="p-1 text-xl font-black leading-none text-white select-none"><span>Ngajar</span><span class="text-gray-100">.in</span></span>
                    </a>

                    <!-- navigation menu -->
                    <div class="fixed inset-0 z-40 items-center hidden w-full h-full p-3 text-xl bg-gray-900 bg-opacity-50 md:text-sm lg:text-base md:w-3/4 md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex': showMenu, 'hidden': !showMenu }">
                        <div class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg select-none md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">


                            <div class="flex flex-col items-center justify-center w-full h-full mt-12 text-center text-primary-lighter md:text-indigo-100 md:w-2/3 md:mt-0 md:flex-row md:items-center">

                                <a href="#" class="inline-block px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-primary-darker md:hover:text-white lg:mx-3 md:text-center">Home</a>

                                <a href="#" class="inline-block px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-primary-darker md:hover:text-white lg:mx-3 md:text-center">Course</a>

                                <a href="#" class="inline-block px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-primary-darker md:hover:text-white lg:mx-3 md:text-center">Forum</a>

                                <a href="#" class="inline-block px-4 py-2 mx-2 font-medium text-left md:px-0 hover:text-primary-darker md:hover:text-white lg:mx-3 md:text-center">Tutoring</a>
                            </div>


                            <div class="flex flex-col items-center justify-end w-full h-full pt-4 md:w-1/3 md:flex-row md:py-0">
                                @if (Route::has('login'))

                                @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 my-2 mr-1 text-base font-medium leading-6 text-indigo-600 whitespace-no-wrap transition duration-150 ease-in-out bg-white border border-transparent rounded-full md:my-0 hover:bg-white focus:outline-none hover:border-indigo-700 hover:shadow-sm active:bg-primary-darker">
                                    Dashboard
                                </a>
                                @else
                                <a href="{{ route('login') }}" class="w-full pl-6 mr-0 text-indigo-200 hover:text-white md:pl-0 md:mr-3 lg:mr-5 md:w-auto">Login</a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 ml-4 mr-1 text-base font-medium leading-6 text-indigo-600 whitespace-no-wrap transition duration-150 ease-in-out bg-white border border-transparent rounded-full hover:bg-white focus:outline-none hover:border-indigo-700 hover:shadow-sm active:bg-primary-darker">Register</a>
                                @endif

                                @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end of navigation menu -->

                    <!-- modal trigger -->
                    <div @click="showMenu = !showMenu" class="absolute right-0 z-50 flex flex-col items-end w-10 h-10 p-2 mr-4 text-gray-100 rounded-full cursor-pointer md:hidden hover:bg-gray-900 hover:bg-opacity-10" :class="{ 'text-gray-400': showMenu, 'text-gray-100': !showMenu }">
                        <svg class="w-6 h-6" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <!-- end of modal trigger -->

                </div>
            </nav>
            <!-- end of navbar -->

            <!-- hero section -->
            <section class="container min-h-screen mx-auto mb-5 text-center py-28 sm:px-4">

                <h1 class="text-4xl font-semibold leading-10 tracking-tight text-white sm:text-4xl sm:leading-none md:text-5xl xl:text-6xl">
                    <span class="block">Belajar sampai jago tanpa ribet?</span>
                    <div class="relative inline-block mt-3">
                        belajar di <span class="font-bold">Ngajar.in!</span>
                    </div>
                </h1>
                <div class="max-w-lg mx-auto mt-6 text-sm text-center text-gray-100 md:mt-12 sm:text-base md:max-w-xl md:text-lg xl:text-xl">gak usah bingung mulai belajar dari mana, tinggal pilih kursus nya, kami yang atur :) </div>

                <!-- pencarian -->
                <div class="relative flex items-center max-w-md mx-auto mt-12 overflow-hidden text-center rounded-full">
                    <input type="text" name="search" placeholder="Mau belajar apa?" class="w-full h-12 px-6 py-2 font-medium text-gray-600 focus:outline-none">

                    <span class="relative top-0 right-0 block">
                        <button type="button" class="inline-flex items-center justify-center w-32 h-12 px-8 text-base font-bold leading-6 text-white transition duration-150 ease-in-out border border-transparent bg-primary-darker hover:bg-primary-lighter focus:outline-none active:bg-primary-darker">
                            Pencarian
                        </button>
                    </span>
                </div>
                <!-- pencarian -->

            </section>
            <!-- end of hero section -->
        </div>
    </main>

    <!-- course highlight section -->
    <section class="w-full py-20 bg-white">
        <div class="container max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold tracking-tight text-center">Highlight Course</h2>
            <p class="mt-2 text-lg text-center text-gray-600">Course terbaik untuk mulai belajar pemrograman</p>
            <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">

                @for($i = 0; $i < 6; $i++) <div class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl">
                    <div class="p-3 text-white bg-blue-500 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"></path>
                            <circle cx="6" cy="14" r="3"></circle>
                            <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">Certifications</h4>
                    <p class="text-base text-center text-gray-500">Each of our plan will provide you and your team with certifications.</p>
            </div>
            @endfor
        </div>
        </div>
    </section>
    <!-- end of course highlight section -->

    <!-- benefit section -->
    <section class="w-full h-full px-8 py-20 mx-auto bg-white">

        <h2 class="text-4xl font-bold tracking-tight text-center">Kenapa belajar di Ngajar.in?</h2>
        <p class="mt-2 text-lg text-center text-gray-600">benefit yang didapat ketika belajar di platform ngajar.in</p>

        <div class="flex flex-col items-center justify-center mt-12 lg:flex-row">

            <!-- Left Column -->
            <div class="flex justify-center w-full mb-12 text-center lg:w-1/2 lg:mb-0">
                <img id="hero-content-3-1" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-1.png" alt="">
            </div>
            <!-- Right Column -->

            <div class="flex flex-col items-center w-full text-center lg:w-1/3 lg:items-start lg:text-left md:-mb-14">
                <ul>
                    <li class="mb-8">
                        <h4 class="flex flex-col items-center justify-center mb-5 text-2xl font-medium lg:flex-row lg:justify-start ">
                            <span class="flex items-center justify-center w-12 h-12 mb-5 text-xl text-white rounded-full bg-primary-lighter lg:mr-5 lg:mb-0">1</span>
                            Mastery based learning
                        </h4>
                        <p class="inline-block text-base leading-7 tracking-wide ">
                            Are you busy at work so it's hard to consult? don't<br>
                            worry because you can access anytime.
                        </p>
                    </li>
                    <li class="mb-8">
                        <h4 class="flex flex-col items-center justify-center mb-5 text-2xl font-medium lg:flex-row lg:justify-start ">
                            <span class="flex items-center justify-center w-12 h-12 mb-5 text-xl text-white rounded-full bg-primary-lighter lg:mr-5 lg:mb-0">2</span>
                            Waktu Fleksibel
                        </h4>
                        <p class="inline-block text-base leading-7 tracking-wide">
                            We provide economical packages for those of you
                            who are still in school or workers.
                        </p>
                    </li>
                    <li class="mb-8">
                        <h4 class="flex flex-col items-center justify-center mb-5 text-2xl font-medium lg:flex-row lg:justify-start ">
                            <span class="flex items-center justify-center w-12 h-12 mb-5 text-xl text-white rounded-full bg-primary-lighter lg:mr-5 lg:mb-0">3</span>
                            Diajari sampai bisa
                        </h4>
                        <p class="inline-block text-base leading-7 tracking-wide ">
                            We have provided highly experienced mentors
                            for several years.
                        </p>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!-- end of benefit section -->

    <!-- call to action -->
    <section class="py-20 bg-primary">
        <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-100 sm:text-4xl md:text-5xl ">
                Tunggu apa lagi?
            </h2>
            <p class="max-w-md mx-auto mt-3 text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                belajar itu nggak harus ribet, daftar di platform belajar ngajar.in sekarang dan nikmati kemudahan belajar didampingi mentor-mentor yang kompeten
            </p>
            <div class="flex justify-center mt-8 space-x-3 font-semibold">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-3 text-base text-white border border-transparent rounded-md shadow bg-primary-darker hover:bg-primary-lighter">Masuk</a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 text-base text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200">Daftar Sekarang</a>
            </div>
        </div>
    </section>
    <!-- end of call to action -->

    <!-- footer -->
    <footer class="w-full text-gray-100 bg-primary body-font">
        <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
            <a href="#_" class="text-xl font-black leading-none text-gray-200 select-none">
                Ngajar<span class="text-white">.in</span>
            </a>
            <p class="mt-4 text-sm text-gray-100 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">
                ©2021 - Ngajarin | Andry Dwi S. | Muhammad Ihya F. B.
            </p>
            <span class="inline-flex flex-wrap justify-center mt-4 space-x-5 sm:ml-auto sm:mt-0 sm:justify-start">
                <a href="#" class="text-gray-200 hover:text-gray-500">
                    <span class="">Facebook</span>

                </a>

                <a href="#" class="text-gray-200 hover:text-gray-500">
                    <span class="">Instagram</span>

                </a>

                <a href="#" class="text-gray-200 hover:text-gray-500">
                    <span class="">Twitter</span>

                </a>

                <a href="#" class="text-gray-200 hover:text-gray-500">
                    <span class="">GitHub</span>

                </a>

                <a href="#" class="text-gray-200 hover:text-gray-500">
                    <span class="">Dribbble</span>

                </a>
            </span>
        </div>
    </footer>
    <!-- footer -->
</body>

</html>