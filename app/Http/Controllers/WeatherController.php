<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class WeatherController extends Controller
{
    private WeatherApiService $weatherApiService;

    public function __construct(WeatherApiService $weatherApiService)
    {
        $this->weatherApiService = $weatherApiService;
    }

    public function weather(WeatherRequest $request): View|RedirectResponse
    {
        $response = $this->weatherApiService->getCurrentWeather($request->q);

        if ($response->successful()) {
            return view('weather', ['data' => $response->json(), 'query' => $request->q]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'City was not found');
        }
    }

    public function map(WeatherRequest $request): View|RedirectResponse
    {
        $response = $this->weatherApiService->getCurrentWeather($request->q);

        if ($response->successful()) {
            return view('map', ['data' => $response->json(), 'query' => $request->q]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'City was not found');
        }
    }
}

