<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link href="{{ asset('css/new-admin.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    @yield('customCSS')
</head>

<body>

    @include('layouts.admin.navbar')

    <div class="flex flex-row flex-wrap h-screen">

        @include('layouts.admin.sidebar-new')

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/new-admin.js') }}"></script>
    @yield('customJS')
</body>

</html>