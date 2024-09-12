<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .trang-tinh {
            background-color: #fff;;
        }
        .trang-tinh img {width: auto;}
        .trang-tinh .banner img {margin-left: 0 !important;}
    </style>
    <link rel="stylesheet" href="{{ asset('assets/jqwidgets/styles/jqx.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-pm.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ipu_style.css') }}">
    <link rel="stylesheet" href="http://tongdai.dev.test/assets/css/lythuyet.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/tippy-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/jqwidgets/jqxcore.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxdata.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxbuttons.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxscrollbar.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxmenu.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxgrid.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxgrid.selection.js') }}"></script>


</head>

<body class="antialiased trang-tinh">
    <div
        class="relative  items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @include('mainMenu')

            <div>
            @include($trang_tinh_view)
            </div>

        </div>
    </div>



   


</body>

</html>
