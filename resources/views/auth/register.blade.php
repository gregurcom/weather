@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('register.user') }}" method="POST" class="form-signin w-25 justify-content-center text-center">
                @csrf
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/weather-logo.png') }}"/>
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>

                <label for="inputName" class="sr-only">Name</label>
                <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <label for="inputEmail" class="mt-3 sr-only mt-3">Email address</label>
                <input type="email" id="inputEmail" name="email" class="mt-2 form-control" placeholder="Email address" required autofocus>
                @error('email')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="mt-2 form-control" placeholder="Password" required>
                @error('password')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <label for="inputRepeatPassword" class="sr-only">Repeat password</label>
                <input type="password" id="inputRepeatPassword" name="repeatPassword" class="mt-2 form-control" placeholder="Repeat password" required>
                <div class="text-left mt-1">
                    <a href="{{ route('login') }}">Have already account?</a>
                </div>
                <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection
