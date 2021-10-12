<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('favicon2.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title> @stack('tap_title') {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('user-template/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('user-template/css/style.css') }}" rel="stylesheet">
    @stack('page_style')
</head>

<body>
    @include('sweetalert::alert')
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        @include('layouts.user.header')

        <!--end: Inspiro Slider -->
        <!-- Content -->
        @yield('content')
        <!-- end: Content -->
        <!-- Footer -->
        @include('layouts.user.footer')
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    @auth

    @include('layouts.firebase_script')
    @endauth
    <!--Plugins-->
    <script src="{{ asset('user-template/js/jquery.js') }}"></script>
    <script src="{{ asset('user-template/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('user-template/js/functions.js') }}"></script>
    @stack('page_script')

</body>

</html>