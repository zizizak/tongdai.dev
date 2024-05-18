<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Khai báo bằng phần mềm</title>

        <!-- Styles -->
        <style>

        </style>


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

        <script src="{{ asset('assets/js/main-pm.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/jqwidgets/styles/jqx.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main-pm.css') }}">

        <style>

        </style>
    </head>
    <body class="antialiased">
        <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif




            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">



                @include('mainMenu')

                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h2 style="margin:10px 330PX;">THỰC HÀNH KHAI BÁO BẰNG PHẦN MỀM</h2>
                </div>



                <div class="mt-1 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <!-- Giao diện phần mềm -->
                    @include('PhanmemUI.show_error')
                    <!-- Giao diện phần mềm -->
                    @include('PhanmemUI.main')

                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                       Đơn vị:Trường Cao Đẳng Kỹ thuật thông tin
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Thiếu tá Trần Đăng Lượng
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
