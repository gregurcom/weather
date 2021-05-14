@extends('layouts.layout')

@section('navbar-right')
    <a href="{{ route('settings') }}">
        <i class="fa fa-sliders fa-2x text-dark"></i>
    </a>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('register.user') }}" method="POST" class="form-signin w-25 justify-content-center text-center">
                @csrf
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/weather-logo.png') }}" class="mb-3"/>
                </a>

                <input type="text" name="name" class="form-control" placeholder="{{ __('auth.input.name') }}" required autofocus>
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <input type="email" name="email" class="mt-2 form-control" placeholder="{{ __('auth.input.email') }}" required autofocus>
                @error('email')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <input type="password" name="password" class="mt-2 form-control" placeholder="{{ __('auth.input.password') }}" required>

                <input type="password" name="password_confirmation" class="mt-2 form-control" placeholder="{{ __('auth.input.password_repeat') }}" required>
                @error('password')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                @if (session('status'))
                    <div class="alert alert-danger mt-2">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="text-left mt-1">
                    <a href="{{ route('login') }}">{{ __('auth.button.login') }}</a>
                </div>
                <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">{{ __('auth.button.register') }}</button>
            </form>
        </div>
    </div>
@endsection
