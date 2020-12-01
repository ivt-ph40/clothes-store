<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @yield('title')
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tmart/images/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
        <!-- All css files are included here. -->
        <!-- Bootstrap fremwork main css -->
        <link rel="stylesheet" href="{{ asset('tmart/css/bootstrap.min.css') }}">
        <!-- Owl Carousel main css -->
        <link rel="stylesheet" href="{{ asset('tmart/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('tmart/css/owl.theme.default.min.css') }}">
        <!-- This core.css file contents all plugings css file. -->
        <link rel="stylesheet" href="{{ asset('tmart/css/core.css') }}">
        <!-- Theme shortcodes/elements style -->
        <link rel="stylesheet" href="{{ asset('tmart/css/shortcode/shortcodes.css') }}">
        <!-- Theme main style -->
        <link rel="stylesheet" href="{{ asset('tmart/style.css') }}">
        <!-- User style -->
        <link rel="stylesheet" href="{{ asset('tmart/css/custom.css') }}">
        <!-- Modernizr JS -->
        <script src="{{ asset('tmart/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        @yield('css')
    </head>
    <body>

        @include('front-end.components.header')

        @yield('content')

        @include('front-end.components.footer')
        <!-- jquery latest version -->
        <script src="{{ asset('tmart/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <!-- Bootstrap framework js -->
        <script src="{{ asset('tmart/js/bootstrap.min.js') }}"></script>
        <!-- All js plugins included in this file. -->
        <script src="{{ asset('tmart/js/plugins.js') }}"></script>
        <script src="{{ asset('tmart/js/slick.min.js') }}"></script>
        <script src="{{ asset('tmart/js/owl.carousel.min.js') }}"></script>
        <!-- Waypoints.min.js. -->
        <script src="{{ asset('tmart/js/waypoints.min.js') }}"></script>
        <!-- Main js file that contents all jQuery plugins activation. -->
        <script src="{{ asset('tmart/js/main.js') }}"></script>
        @yield('js')
    </body>
</html>