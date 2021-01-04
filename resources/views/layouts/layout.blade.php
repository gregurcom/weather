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
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid h5">
                        <div class="fw-bold">Weather App</div>
                        <i class="fa fa-sliders fa-2x"></i>
                    </div>
                </nav>
            </header>
        @show

        @yield('content')

        @section('footer')
            <footer class="footer">
                <div class="container">
                    <span class="text-muted">Place sticky footer content here.</span>
                </div>
            </footer>
        @show
    </body>
</html>
