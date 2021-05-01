@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('login.user') }}" method="POST" class="form-signin w-25 justify-content-center text-center">
                @csrf
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/weather-logo.png') }}"/>
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Log in</h1>

                <label for="inputName" class="sr-only">Email</label>
                <input type="email" id="inputName" name="email" class="form-control" placeholder="Email" required autofocus>

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="mt-2 form-control" placeholder="Password" required>
                @if (session('status'))
                    <div class="alert alert-danger mt-2">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="text-left mt-1">
                    <a href="{{ route('register') }}">Register an account</a>
                </div>
                <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection
