@extends('layouts.layout')

@section('slider')
    <a href="{{ route('weather.settings', ['from' => Route::currentRouteName(),  'q' => $query]) }}"><i class="fa fa-sliders fa-2x text-dark"></i></a>
@endsection

@section('back-button')
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
            <a href="{{ route('weather.map', ['q' => $query]) }}">
                <span class="fa fa-map-marker ml-1 text-dark"></span>
            </a>
        </div>

        <div class="h1 mt-4">
            <img src="{{ $data['current']['condition']['icon'] }}" class="h1">
            {{ $data['current'][session('temperature') == 'temp_f' ? 'temp_f' : 'temp_c'] }}
            {{ session('temperature') == 'temp_f' ? '°F' : '°C' }}
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
                                <div class="w-auto data-weather">
                                    {{ $data['current'][session('speed') == 'wind_mph' ? 'wind_mph' : 'wind_kph'] }}
                                    {{ session('speed') == 'wind_mph' ? 'mi/h' : 'km/h' }}
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">Pressure
                                <div class="w-auto data-weather">
                                    {{ $data['current'][session('pressure') == 'pressure_in' ? 'pressure_in' : 'pressure_mb'] }}
                                    {{ session('pressure') == 'pressure_in' ? 'in' : 'mb' }}
                                </div>
                            </th>
                            <th scope="col">Precipitation
                                <div class="w-auto data-weather">
                                    {{ $data['current'][session('precipitation') == 'precip_in' ? 'precip_in' : 'precip_mm'] }}
                                    {{ session('precipitation') == 'precip_in' ? 'in' : 'mm' }}
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
