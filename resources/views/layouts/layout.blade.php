<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>

        <title>@section('title', 'Weather App')</title>
    </head>
    <body>
        @section('header')
            <header>
                <div class="mt-2 mb-5">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid h5">
                            <div class="fw-bold">Weather App</div>
                            <i class="fa fa-sliders fa-2x"></i>
                        </div>
                    </nav>
                </div>
            </header>
        @show

        @yield('content')

        @section('footer')
            <footer class="bg-light text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3">
                    Copyright © {{ date("Y") }} <span class="fw-bold">Weather App</span>
                </div>
                <!-- Copyright -->
            </footer>
        @show
    </body>
</html>
