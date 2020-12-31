@extends ('layouts.layout')

@section ('content')
    <div class = "row justify-content-center align-items-center">
        <div class = "mt-5 w-25 text-center">
            <form action = "{{ route('result.weather', 1) }}">
                <div class = "form-group has-search">
                    <label for="search-input" class="form-label fs-3">Weather App</label>
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control form-rounded" id="search-input" placeholder="Search by city">
                    <div class="mt-4">
                        <button id = "search-button" type="submit" class="btn btn-light mb-3"><span class = "search">Search</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
