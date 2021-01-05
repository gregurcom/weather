@extends('layouts.layout')

@section('header')
    @parent
    <div class="h4 back">
        <a href="{{ route('home') }}">
            <span class="fa fa-chevron-left"></span>
            Back
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid text-center">
        <div class="h1">{{ $data['location']['name'] }}
            <span class="fa fa-map-marker ml-1"></span>
        </div>

        <div class="h1 mt-4">
            <img src="{{ $data['current']['condition']['icon'] }}" class="h1">
            {{ $data['current']['temp_c'] }} °С
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-4">
                <table class="table table-bordered mt-4 text-center weather-data-table">
                    <thead>
                        <tr>
                            <th scope="col">Humidity
                                <div class="w-auto data-weather">{{ $data['current']['humidity'] }}%</div>
                            </th>
                            <th scope="col">Wind
                                <div class="w-auto data-weather">{{ $data['current']['wind_kph'] }} km/h</div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">Pressure
                                <div class="w-auto data-weather">{{ $data['current']['pressure_mb'] }} mb</div>
                            </th>
                            <th scope="col">Precipitation
                                <div class="w-auto data-weather">{{ $data['current']['precip_mm'] }} mm</div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
