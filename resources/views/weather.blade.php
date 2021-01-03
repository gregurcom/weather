@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="h4 mb-5 back">
            <a href="{{ route('home') }}"><span class="fa fa-chevron-left ml-5"></span>Back</a>
        </div>

        <div class="h1 text-center">{{ $response['location']['name'] }}
            <span class="fa fa-map-marker ml-1"></span>
        </div>

        <div class="h1 text-center mt-4">
            <span class="fa fa-cloud mr-2"></span>{{ $response['current']['temp_c'] }} °С
        </div>

        <table class="w-50 table table-bordered mt-5 text-center">
            <thead>
                <tr>
                    <th scope="col">Humidity {{ $response['current']['humidity'] }}%</th>
                    <th scope="col">Wind {{ $response['current']['wind_kph'] }} km/h</th>
                </tr>
                <tr>
                    <th scope="col">Pressure {{ $response['current']['pressure_mb'] }} mb</th>
                    <th scope="col">Precipitation {{ $response['current']['precip_mm'] }} mm</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
