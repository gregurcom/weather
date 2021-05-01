@extends('layouts.layout')

@inject('historyService', 'App\Services\HistoryService')

@section('navbar-right')
    <div class="d-inline-flex">
        @auth
            <div class="dropdown mr-4 h-25">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        @endauth
        @guest
            <div class="mr-4 h3 mr-4">
                <a href="{{ route('login') }}"><i class="fa fa-sign-in text-dark" aria-hidden="true"></i></a>
            </div>
        @endguest

        <a href="{{ route('settings') }}">
            <i class="fa fa-sliders fa-2x text-dark"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <form action="{{ route('weather') }}">
                    <div class="form-group has-search">
                        <label for="search-input" class="form-label h3">Weather App</label>

                        <div class="input-group">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input
                                type="text"
                                class="form-control {{ $historyService->get('history') ? 'rounded-pill-left' : 'rounded-pill' }} cityAutoComplete"
                                name="q" id="search-city-input"
                                placeholder="{{ __('app.button.search_city') }}"
                                data-url="{{ route('api.weather.auto_complete') }}"
                                autocomplete="off"
                            >

                            @if ($historyService->get('history'))
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary dropdown-toggle rounded-pill-right" id="history-button" type="button" data-toggle="dropdown">
                                        <span class="fa fa-history"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @foreach($historyService->get('history') as $city)
                                            <a class="dropdown-item city" href="{{ route('weather', ['q' => $city]) }}">{{ $city }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-danger mt-2">
                                {{ __('app.alert.city_not_found') }}
                            </div>
                        @endif

                        <div class="mt-4">
                            <button id="search-button" type="submit" class="btn btn-light border-dark rounded-pill">
                                {{ __('app.button.search') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
