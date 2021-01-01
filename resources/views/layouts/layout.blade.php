<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>

        @section('title')
            <title>Weather App</title>
        @show
    </head>
    <body>
        @section('header')
            <header>
                <div class="container-fluid">
                    <nav class="navbar navbar-light bg-light mb-5">
                        <div class="container-fluid">
                            <i class="fa fa-sun-o fa-2x"></i>
                            <i class="fa fa-sliders fa-2x"></i>
                        </div>
                    </nav>
                </div>
            </header>
        @show

        @yield('content')

        @section ('footer')
            <footer class="bg-light text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3">
                    Footer
                </div>
                <!-- Copyright -->
            </footer>
        @show
    </body>
</html>
