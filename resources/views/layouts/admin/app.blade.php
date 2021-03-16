<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('customCSS')
    @livewireStyles
</head>

<body class="bg-gray-50">

    @include('layouts.admin.navbar')

    <div class="flex flex-row flex-wrap h-screen bg-gray-100">

        @include('layouts.admin.sidebar')

        @yield('content')
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/new-admin.js') }}"></script>
    @yield('customJS')
    @include('sweetalert::alert')
    
</body>

</html>