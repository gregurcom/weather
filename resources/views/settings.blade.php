@extends('layouts.layout')

@inject('settingsService', 'App\Services\SettingsService')

@section('title', 'Weather App - settings')

@section('navbar-right')
    <div class="d-inline-flex align-items-center">
        @auth
            <div class="dropdown mr-4 h-25">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('app.title.dashboard') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('auth.button.logout') }}</a>
                </div>
            </div>
        @else
            <div class="mr-4">
                <a href="{{ route('login') }}" class="h3"><i class="fa fa-sign-in text-dark" aria-hidden="true"></i></a>
            </div>
        @endauth
    </div>
@endsection

@section('sidebar')
    <div class="h4 back">
        <a href="{{ $previousPage ? route($previousPage, ['q' => $query]) : route('home') }}">
            <span class="fa fa-chevron-left"></span>
            {{ __('app.button.back') }}
        </a>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="h1 text-center">{{ __('app.title.settings') }}</div>

        <div class="row justify-content-center">
            <div class="col-sm-5">
                <form action="{{ route('settings') }}" method="POST">
                    @csrf
                    <div class="input-group mt-3">
                        <div class="col">
                            <div class="h4">{{ __('app.units.temperature') }}</div>
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
                            <div class="h4">{{ __('app.units.speed') }}</div>
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
                            <div class="h4">{{ __('app.units.pressure') }}</div>
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
                            <div class="h4">{{ __('app.units.precipitation') }}</div>
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
                            <div class="h4">{{ __('app.label.language') }}</div>
                        </div>
                        <select class="p-1 rounded-2 select-data-weather" name="language">
                            <option value="en">en</option>
                            <option value="ru" {{ $settingsService->get('language') === 'ru' ? 'selected' : '' }}>ru</option>
                        </select>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success mt-2">
                            {{ __('app.alert.settings_changed') }}
                        </div>
                    @endif
                    <div class="text-center mt-3">
                        <button name="settings-button" type="submit" class="btn btn-light w-25 border-dark fw-bold text-dark">{{ __('app.button.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
