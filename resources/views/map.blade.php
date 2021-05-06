@extends('layouts.layout')

@section('navbar-right')
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
                <a href="{{ route('login') }}" class="h3"><i class="fa fa-sign-in text-dark" aria-hidden="true"></i></a>
            </div>
        @endauth

        <a href="{{ route('settings', ['from' => Route::currentRouteName(), 'q' => $query]) }}">
            <i class="fa fa-sliders fa-2x text-dark"></i>
        </a>
    </div>
@endsection

@section('meta')
    <meta property="og:image" content="{{ 'http:' . $data['current']['condition']['icon'] }}">
@endsection

@section('title', $data['location']['name'] . ' - map')

@section('sidebar')
    <div class="h4 back">
        <a href="{{ route('weather', ['q' => $query]) }}">
            <span class="fa fa-chevron-left"></span>
            {{ __('app.button.back') }}
        </a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm text-center">
                <span class="h1">{{ $data['location']['name'] }}</span>
                <div id="weather-map" class="justify-content-center mt-4"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let weathermap = L.map('weather-map').setView([{{ $data['location']['lat'] }}, {{ $data['location']['lon'] }}], 12);
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1,
        }).addTo(weathermap);

        L.marker([{{ $data['location']['lat'] }}, {{ $data['location']['lon'] }}]).addTo(weathermap);
    </script>
@endsection
