@extends('layouts.layout')

@section('back-button')
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
                <span class="h1">{{ $data['location']['name'] }}</span>
                <div id="weather-map" class="justify-content-center mt-4"></div>
            </div>
        </div>
    </div>

    <script>
        let weathermap = L.map('weather-map').setView([{{ $data['location']['lat'] }}, {{ $data['location']['lon'] }}], 12);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWF6dXJvIiwiYSI6ImNrams3emQzeTR4Y3Qycm5xcm43OWZudXcifQ.Qqk6OhG9yM9QmzsuNhY7oA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWF6dXJvIiwiYSI6ImNrams3emQzeTR4Y3Qycm5xcm43OWZudXcifQ.Qqk6OhG9yM9QmzsuNhY7oA'
        }).addTo(weathermap);

        L.marker([{{ $data['location']['lat'] }}, {{ $data['location']['lon'] }}]).addTo(weathermap);
    </script>
@endsection
