<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class WeatherController extends Controller
{
    public function weather(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        $data = $weatherApiService->getCurrentWeather($request->q);

        if ($data != null) {
            if (session()->has('history')) {
                if (in_array($data, session('history'))) {
                    // do nothing
                } elseif (count(session('history')) < 3) {
                    session()->push('history', $data);
                } else {
                    session()->forget('history.' . array_key_first(session('history')));
                    session()->push('history', $data);
                }
            } else {
                session()->put('history', [$data]);
            }

            return view('weather', ['data' => $data, 'query' => $request->q]);
        }

        return redirect()
            ->route('home')
            ->with('status',  __('app.alert.city_not_found '));
    }

    public function map(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        $data = $weatherApiService->getCurrentWeather($request->q);

        if ($data != null) {
            return view('map', ['data' => $data, 'query' => $request->q]);
        }

        return redirect()
            ->route('home')
            ->with('status',  __('app.alert.city_not_found '));
    }
}

