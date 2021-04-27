@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('login') }}" method="POST" class="form-signin w-25 justify-content-center text-center">
                @csrf
{{--                MUST CHANGE IMG--}}
                <a href="{{ route('home') }}">
                    <img src="https://img.icons8.com/ios/100/000000/apple-weather.png"/>
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

                <label for="inputName" class="sr-only">Name</label>
                <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="mt-2 form-control" placeholder="Password" required>
                <div class="text-left mt-1">
                    <a href="{{ route('register') }}">Register an account</a>
                </div>
                <div class="checkbox mb-3">
                    <label class="mt-3">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection
