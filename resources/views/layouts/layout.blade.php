<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>

        <title>@section('title', 'Weather App')</title>
    </head>
    <body class="h-100">
        <div class="d-flex w-100 h-100 mx-auto flex-column">
            @section('header')
                <header class="mb-auto">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <a href="{{ route('home') }}" id="logo" class="fw-bold">Weather App</a>
                            @yield('slider')
                        </div>
                    </nav>
                </header>
            @show

            @yield('back-button')

            @yield('content')

            @section('footer')
                <footer class="footer mt-auto py-3 text-center">
                    <div class="container">
                        <span class="text-muted">Copyright © {{ date("Y") }} Weather App</span>
                    </div>
                </footer>
            @show
        </div>
    </body>
</html>
