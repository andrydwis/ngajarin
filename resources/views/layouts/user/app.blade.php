<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.css')}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('customCSS')
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    @livewireStyles
</head>

<body class="antialiased"> 
    @include('layouts.user.navbar')
    <main class="min-h-[75vh]">
        @yield('content')
    </main>
    @include('layouts.user.footer')

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('customJS')
    @include('sweetalert::alert')
    @livewireScripts
</body>

</html>