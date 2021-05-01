@extends('layouts.layout')

@section('navbar-right')
    <div class="dropdown">
        <button class="h-25 btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ auth()->user()->name }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="h2 d-flex justify-content-center align-sta">
                Dashboard
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column">
                <span class="h4">Your subscriptions</span>
                <ul class="text-left">
                    @foreach (auth()->user()->cities as $city)
                        <li><a href="{{ route('weather', ['q' => $city->name]) }}">{{ $city->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
