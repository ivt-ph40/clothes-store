<html>
    <head>
        @include('front-end.layouts.head')
    </head>
    <body>
    
        @include('front-end.layouts.header')

        @yield('content')

        @include('front-end.layouts.footer')
        
        @include('front-end.layouts.script')
        
        @include('front-end.layouts.cart')
    </body>
</html>