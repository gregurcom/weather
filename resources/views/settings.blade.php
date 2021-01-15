@extends('layouts.layout')

@section('sidebar')
    <div class="h4 back">
        <a href="{{ $previousPage ? route($previousPage, ['q' => $query]) : route('home') }}">
            <span class="fa fa-chevron-left"></span>
            Back
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="h1 text-center">Settings</div>

        <div class="row justify-content-center">
            <div class="col-sm-5">
                <form action="{{ route('settings') }}" method="POST">
                    @csrf
                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">Temperature</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="temperature">
                            <option value="temp_c">Celsius</option>
                            <option value="temp_f" {{ session('settings.temperature') === 'temp_f' ? 'selected' : '' }}>Fahrenheit</option>
                        </select>
                    </div>
                    @error('temperature')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">Speed</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="speed">
                            <option value="wind_kph">km/h</option>
                            <option value="wind_mph" {{ session('settings.speed') === 'wind_mph' ? 'selected' : '' }}>mi/h</option>
                        </select>
                    </div>
                    @error('speed')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">Pressure</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="pressure">
                            <option value="pressure_mb">mb</option>
                            <option value="pressure_in" {{ session('settings.pressure') === 'pressure_in' ? 'selected' : '' }}>in</option>
                        </select>
                    </div>
                    @error('pressure')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">Precipitation</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="precipitation">
                            <option value="precip_mm">mm</option>
                            <option value="precip_in" {{ session('settings.precipitation') === 'precip_in' ? 'selected' : '' }}>in</option>
                        </select>
                    </div>
                    @error('precipitation')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">Language</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="language">
                            <option value="en">en</option>
                            <option value="ro">ro</option>
                        </select>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center mt-3">
                        <button name="settings-button" type="submit" class="btn btn-light w-25 border-dark fw-bold text-dark" id="save-settings-button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
