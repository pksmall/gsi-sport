<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- site asset -->
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/bootstrap/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/custom-scrollbar/custom-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    @if (Route::is('history'))<link href="{{ asset('assets/css/styles-history.css') }}" rel="stylesheet"> @endif

    <!-- title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>


            @yield('content')



<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/libs/slick/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libs/select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libs/custom-scrollbar/custom-scrollbar.concat.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/products.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.validation.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
@yield('header-js-script')
@yield('page-js-script')
</body>
</html>

