<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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

    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <section class="text-gray-700 body-font">
        <div class="container px-8 py-48 mx-auto lg:px-4">
            <div class="flex flex-col w-full mb-12 text-left lg:text-center">
                <h2 class="mb-1 text-xs font-semibold tracking-widest text-blue-600 uppercase title-font">ini sub-header</h2>
                <h1 class="mb-6 text-2xl font-semibold tracking-tighter text-blue-500 sm:text-5xl title-font">
                    Capek belajar sendiri ? ditinggal dosen melulu ?
                </h1>
                <h1 class="mb-6 text-2xl font-semibold tracking-tighter text-blue-500 sm:text-5xl title-font">
                    ikut <a href="#" class="text-blue-700">ngajar.in</a> aja!
                </h1>
                <p class="mx-auto text-base font-medium leading-relaxed text-gray-700 lg:w-2/3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quam optio assumenda eveniet minima accusantium incidunt dignissimos aut, modi, ea at similique rem officiis sapiente earum quas! Pariatur, tenetur quo.</p>
            </div>
            <div class="flex lg:justify-center">
                <a href="{{ route('register') }}">
                    <button class="inline-flex px-4 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:shadow-outline focus:outline-none">Daftar</button>
                </a>

                <a href="{{ route('login') }}"><button class="inline-flex items-center px-4 py-2 ml-4 font-semibold text-blue-800 transition duration-500 ease-in-out transform bg-white border rounded-lg shadow-xl hover:border-gray-600 hover:bg-gray-600 hover:text-white focus:shadow-outline focus:outline-none">Masuk</button></a>
            </div>
    </section>





</body>

</html>