<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('customCSS')
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>

</head>

<body class="antialiased">

    <main>
        @yield('content')
    </main>

    @include('layouts.student.footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('customJS')
    @include('sweetalert::alert')
</body>

</html>