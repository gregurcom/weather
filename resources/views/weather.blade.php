@extends('layouts.layout')

@inject('settingsService', 'App\Services\SettingsService')

@section('meta')
    <meta property="og:image" content="{{ 'http:' . $data['current']['condition']['icon'] }}">
@endsection

@section('title', $data['location']['name'] . ' - weather forecast')

@section('navbar-right')
    <a href="{{ route('settings', ['from' => Route::currentRouteName(), 'q' => $query]) }}">
        <i class="fa fa-sliders fa-2x text-dark"></i>
    </a>
@endsection

@section('sidebar')
    <div class="h4 back">
        <a href="{{ route('home') }}">
            <span class="fa fa-chevron-left"></span>
            {{ __('app.button.back') }}
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid text-center">
        <div class="h1">{{ $data['location']['name'] }}
            <a href="{{ route('weather.map', ['q' => $query]) }}">
                <span class="fa fa-map-marker ml-1 text-dark" id="map-button"></span>
            </a>
        </div>

        <div class="h1 mt-4">
            <img src="{{ $data['current']['condition']['icon'] }}" class="h1">
            {{ $data['current'][$settingsService->get('temperature', 'temp_c')] }}
            {{ $settingsService->get('temperature') === 'temp_f' ? '°F' : '°C' }}
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-4">
                <table class="table table-bordered mt-4 text-center weather-data-table">
                    <thead>
                        <tr>
                            <th scope="col">
                                {{ __('app.units.humidity') }}
                                <div class="w-auto data-weather">{{ $data['current']['humidity'] }}%</div>
                            </th>
                            <th scope="col">
                                {{ __('app.units.wind') }}
                                <div class="w-auto data-weather">
                                    {{ $data['current'][$settingsService->get('speed', 'wind_kph')] }}
                                    {{ $settingsService->get('speed') === 'wind_mph' ? 'mi/h' : 'km/h' }}
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <th scope="col">
                                {{ __('app.units.pressure') }}
                                <div class="w-auto data-weather">
                                    {{ $data['current'][$settingsService->get('pressure', 'pressure_mb')] }}
                                    {{ $settingsService->get('pressure') === 'pressure_in' ? 'in' : 'mb' }}
                                </div>
                            </th>
                            <th scope="col">
                                {{ __('app.units.precipitation') }}
                                <div class="w-auto data-weather">
                                    {{ $data['current'][$settingsService->get('precipitation', 'precip_mm')] }}
                                    {{ $settingsService->get('precipitation') === 'precip_in' ? 'in' : 'mm' }}
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
