<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class WeatherController extends Controller
{
    public function weather(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        $response = $weatherApiService->getCurrentWeather($request->q);

        if ($response->successful()) {
            return view('weather', ['data' => $response->json(), 'query' => $request->q]);
        } else {
            return redirect()
                ->route('home')
                ->with('status',  __('validation.search-city'));
        }
    }

    public function map(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        $response = $weatherApiService->getCurrentWeather($request->q);

        if ($response->successful()) {
            return view('map', ['data' => $response->json(), 'query' => $request->q]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', __('validation.search-city'));
        }
    }
}

