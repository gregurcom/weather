@extends('layouts.layout')

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

        <a href="{{ route('settings') }}">
            <i class="fa fa-sliders fa-2x text-dark"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="h2">
                {{ __('app.title.dashboard') }}
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column px-3 py-3">
                @if (auth()->user()->subscriptions->count() == 0)
                    <span class="h4">{{ __('app.title.without_subscription') }}</span>
                @else
                    <span class="h4">{{ __('app.title.subscription') }}</span>
                @endif

                <ul>
                    @foreach (auth()->user()->subscriptions as $city)
                        <div class="mt-3 d-inline-flex align-items-center">
                            <form action="{{ route('subscribe.remove') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="city" value="{{ $city->name }}">
                                <button class="btn btn-danger" type="submit">{{ __('app.button.delete') }}</button>
                            </form>
                            <li class="ml-5"><a href="{{ route('weather', ['q' => $city->name]) }}" class="h4 text-dark">{{ $city->name }}</a></li>
                        </div>
                        <br>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
