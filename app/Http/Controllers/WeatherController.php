<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\HistoryService;
use App\Services\WeatherApiService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

final class WeatherController extends Controller
{
    public function weather(WeatherRequest $request, WeatherApiService $weatherApiService, HistoryService $historyService): View|RedirectResponse
    {
        try {
            $data = $weatherApiService->getCurrentWeather($request->q);
            $historyService->save($request->q);

            return view('weather', ['data' => $data, 'query' => $request->q]);
        } catch (RequestException $e) {
            Log::error($e->getMessage());

            return redirect()
                ->route('home')
                ->with('status',  __('app.alert.city_not_found '));
        }
    }

    public function map(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        try {
            $data = $weatherApiService->getCurrentWeather($request->q);

            return view('map', ['data' => $data, 'query' => $request->q]);
        } catch (RequestException $e) {
            Log::error($e->getMessage());

            return redirect()
                ->route('home')
                ->with('status',  __('app.alert.city_not_found '));
        }
    }
}

