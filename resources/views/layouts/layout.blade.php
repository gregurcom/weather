<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:site_name" content="Weather App">
        <meta property="og:title" content="@yield('title', 'Weather App')">
        @yield('meta')

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @env('production')
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-HK8TXWSM3Z"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-HK8TXWSM3Z');
            </script>
        @endenv

        <title>@yield('title', 'Weather App')</title>
    </head>
    <body class="h-100">
        <div class="d-flex w-100 h-100 mx-auto flex-column">
            @section('header')
                <header class="mb-auto">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <a href="{{ route('home') }}" id="logo" class="font-weight-bold">Weather App</a>
                            <div class="d-inline-flex align-items-center">
                                @auth
                                    <div class="dropdown mr-4 h-25">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ auth()->user()->name }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('app.title.dashboard') }}</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}">{{ __('auth.button.logout') }}</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="mr-4">
                                        <a href="{{ route('login.show') }}" class="h3"><i class="fa fa-sign-in text-dark" aria-hidden="true"></i></a>
                                    </div>
                                @endauth

                                @yield('navbar-right')
                            </div>
                        </div>
                    </nav>
                </header>
            @show

            @yield('sidebar')

            @yield('content')

            @section('footer')
                <footer class="footer mt-auto py-3 text-center">
                    <div class="container">
                        <span class="text-muted">Copyright © {{ date("Y") }} Weather App</span>
                    </div>
                </footer>
            @show
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')
    </body>
</html>
