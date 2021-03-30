@extends('layouts.layout')

@inject('historyService', 'App\Services\HistoryService')

@section('navbar-right')
    <a href="{{ route('settings') }}">
        <i class="fa fa-sliders fa-2x text-dark"></i>
    </a>
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
                            <input type="text" class="form-control rounded-pill" name="q" id="search-city-input" placeholder="{{ __('app.button.search_city') }}">
                            @if ($historyService->get('history'))
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach($historyService->get('history') as $city)
                                            <li><a class="dropdown-item" href="{{ route('weather', ['q' => $city]) }}">{{ $city }}</a></li>
                                        @endforeach
                                    </ul>
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
