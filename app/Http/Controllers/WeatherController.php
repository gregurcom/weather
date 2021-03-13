<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class WeatherController extends Controller
{
    public function weatherValues(WeatherRequest $request, WeatherApiService $weatherApiService, string $route): View|RedirectResponse
    {
        $response = $weatherApiService->getCurrentWeather($request->q);

        if ($response != null) {

            return view($route, ['data' => $response, 'query' => $request->q]);
        }

        return redirect()
            ->route($route)
            ->with('status',  __('app.alert.city_not_found '));
    }

    public function weather(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        return $this->weatherValues($request, $weatherApiService, 'weather');
    }

    public function map(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        return $this->weatherValues($request, $weatherApiService, 'map');
    }
}

