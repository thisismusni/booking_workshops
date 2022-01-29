<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    {{-- <link rel="icon" type="image/png" href="{{ asset('BW.png') }}"> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title> @stack('tap_title') {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @laravelPWA

    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('user-template/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('user-template/css/style.css') }}" rel="stylesheet">

    @stack('page_style')

</head>

<body>

    @yield('content')

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
