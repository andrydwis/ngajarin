<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.css')}}">
    <link href="{{ asset('css/new-admin.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Ubuntu&display=swap");

        body {
            font-family: "Ubuntu";
            table-layout: auto !important;
        }

        #datatables {
            width: 100% !important;
        }

        .dataTables_wrapper th {
            font-weight: 500 !important;
        }

        /* Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #4f46e5 !important;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #4f46e5 !important;
            border: 1px solid transparent;
        }

        .form-input {
            background-color: rgb(243, 244, 246);
        }


        .img-thumbnail {
            padding: 0.25rem;
            background-color: #fff;
            border: 1px solid #dddfeb;
            border-radius: 0.35rem;
            max-width: 100%;
            height: auto;
        }
    </style>
    @yield('customCSS')
</head>

<body class="bg-gray-50">

    @include('layouts.admin.navbar')

    <div class="flex flex-row flex-wrap h-screen bg-gray-50">

        @include('layouts.admin.sidebar')

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/new-admin.js') }}"></script>
    @yield('customJS')
    @include('sweetalert::alert')
</body>

</html>