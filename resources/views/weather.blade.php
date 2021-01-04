@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="h4 mb-5 back">
            <a href="{{ route('home') }}">
                <span class="fa fa-chevron-left ml-5"></span>
                Back
            </a>
        </div>

        <div class="h1 text-center">{{ $data['location']['name'] }}
            <span class="fa fa-map-marker ml-1"></span>
        </div>

        <div class="h1 text-center mt-4">
            <img src="{{ $data['current']['condition']['icon'] }}" class="h1">
            {{ $data['current']['temp_c'] }} °С
        </div>

        <table class="table table-bordered mt-4 text-center">
            <thead>
                <tr>
                    <th scope="col">Humidity
                        <div class="w-auto">{{ $data['current']['humidity'] }}%</div>
                    </th>
                    <th scope="col">Wind
                        <div class="w-auto">{{ $data['current']['wind_kph'] }} km/h</div>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Pressure
                        <div class="w-auto">{{ $data['current']['pressure_mb'] }} mb</div>
                    </th>
                    <th scope="col">Precipitation
                        <div class="w-auto">{{ $data['current']['precip_mm'] }} mm</div>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
