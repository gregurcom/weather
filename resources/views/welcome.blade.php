@extends ('layouts.layout')

@section ('content')
    <div class="row justify-content-center align-items-center">
        <div class="mt-5 w-25 text-center">
            <form action="{{ route('weather', ['city' => ''])}}">
                <div class="form-group has-search">
                    <label for="search-input" class="form-label fs-3">Weather App</label>
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control rounded-pill" name="city" id="search-input" placeholder="Search by city">
                    <div class="mt-4">
                        <button id="search-button" type="submit" class="btn btn-light mb-3 border-dark rounded-pill"><span class="search">Search</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
