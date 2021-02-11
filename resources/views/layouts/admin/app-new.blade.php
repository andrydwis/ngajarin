<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link href="{{ asset('css/new-admin.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Ubuntu&display=swap");
        body{
            font-family : "Ubuntu";
        }
        </style>
    @yield('customCSS')
</head>

<body>

    @include('layouts.admin.navbar')

    <div class="flex flex-row flex-wrap h-screen bg-gray-50">

        @include('layouts.admin.sidebar-new')

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('customJS')
</body>

</html>