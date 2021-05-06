@extends('layouts.layout')

@section('navbar-right')
    <a href="{{ route('settings') }}">
        <i class="fa fa-sliders fa-2x text-dark"></i>
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('login.user') }}" method="POST" class="form-signin w-25 justify-content-center text-center">
                @csrf
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/weather-logo.png') }}" class="mb-3"/>
                </a>

                <input type="email" name="email" class="form-control" placeholder="{{ __('auth.input.email') }}" required autofocus>
                <input type="password" name="password" class="mt-2 form-control" placeholder="{{ __('auth.input.password') }}" required>
                @if (session('status'))
                    <div class="alert alert-danger mt-2">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="text-left mt-1">
                    <a href="{{ route('register') }}">{{ __('auth.button.register') }}</a>
                </div>
                <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">{{ __('auth.button.login') }}</button>
            </form>
        </div>
    </div>
@endsection
