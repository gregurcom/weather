@extends('layouts.layout')

@inject('settingsService', 'App\Services\SettingsService')

@section('sidebar')
    <div class="h4 back">
        <a href="{{ $previousPage ? route($previousPage, ['q' => $query]) : route('home') }}">
            <span class="fa fa-chevron-left"></span>
            {{ __('weather.sidebar') }}
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="h1 text-center">{{ __('weather.title') }}</div>

        <div class="row justify-content-center">
            <div class="col-sm-5">
                <form action="{{ route('settings') }}" method="POST">
                    @csrf
                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">{{ __('units.temperature') }}</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="temperature">
                            <option value="temp_c">Celsius</option>
                            <option value="temp_f" {{ $settingsService->get('temperature') === 'temp_f' ? 'selected' : '' }}>Fahrenheit</option>
                        </select>
                    </div>
                    @error('temperature')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">{{ __('units.speed') }}</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="speed">
                            <option value="wind_kph">km/h</option>
                            <option value="wind_mph" {{ $settingsService->get('speed') === 'wind_mph' ? 'selected' : '' }}>mi/h</option>
                        </select>
                    </div>
                    @error('speed')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">{{ __('units.pressure') }}</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="pressure">
                            <option value="pressure_mb">mb</option>
                            <option value="pressure_in" {{ $settingsService->get('pressure') === 'pressure_in' ? 'selected' : '' }}>in</option>
                        </select>
                    </div>
                    @error('pressure')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">{{ __('units.precipitation') }}</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="precipitation">
                            <option value="precip_mm">mm</option>
                            <option value="precip_in" {{ $settingsService->get('precipitation') === 'precip_in' ? 'selected' : '' }}>in</option>
                        </select>
                    </div>
                    @error('precipitation')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">{{ __('weather.language') }}</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="language">
                            <option value="en">en</option>
                            <option value="ru" {{ $settingsService->get('language') === 'ru' ? 'selected' : '' }}>ru</option>
                        </select>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success mt-2">
                            {{ __('validation.success') }}
                        </div>
                    @endif
                    <div class="text-center mt-3">
                        <button name="settings-button" type="submit" class="btn btn-light w-25 border-dark fw-bold text-dark">{{ __('weather.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
