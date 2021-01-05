@extends('layouts.layout')

@section('link-script')
    @parent

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin="">
    </script>
@endsection

@section('header')
    @parent

    <div class="h4 back">
        <a href="{{ route('weather', ['q' => $data['location']['name']]) }}">
            <span class="fa fa-chevron-left"></span>
            Back
        </a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm text-center">
                <span class="city-map h1">{{ $data['location']['name'] }}</span>
                <div id="mapid" class="justify-content-center"></div>
            </div>
        </div>
    </div>

    <script>
        let weathermap = L.map('mapid').setView([{{ $data['location']['lat'] }}, {{ $data['location']['lon'] }}], 12);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWF6dXJvIiwiYSI6ImNrams3emQzeTR4Y3Qycm5xcm43OWZudXcifQ.Qqk6OhG9yM9QmzsuNhY7oA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(weathermap);

        L.marker([{{ $data['location']['lat'] }}, {{ $data['location']['lon'] }}]).addTo(weathermap);
    </script>
@endsection
