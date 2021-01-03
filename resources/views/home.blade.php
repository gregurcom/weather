@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="mt-5 w-25 text-center">
            <form action="{{ route('weather') }}">
                <div class="form-group has-search">
                    <label for="search-input" class="form-label h3">Weather App</label>
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control rounded-pill" name="city" id="search-input" placeholder="Search by city">
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
                        <button id="search-button" type="submit" class="btn btn-light mb-3 border-dark rounded-pill">
                            <span class="search">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection