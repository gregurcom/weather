@extends('layouts.layout')

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
