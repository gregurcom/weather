@extends('layouts.layout')

@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <form action="{{ route('weather') }}">
                    <div class="form-group has-search">
                        <label for="search-input" class="form-label h3">Weather App</label>
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control rounded-pill" name="q" id="search-city-input" placeholder="Search by city">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-danger mt-2">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-4">
                            <button id="search-button" type="submit" class="btn btn-light border-dark rounded-pill">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
