@extends('layouts.layout')

@section('back-button')
    <div class="h4 back">
        <a href="{{ route('weather', ['q' => $query]) }}">
            <span class="fa fa-chevron-left"></span>
            Back
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
