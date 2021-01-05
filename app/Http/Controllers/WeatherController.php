<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weather(WeatherRequest $request): View|RedirectResponse
    {
        $response = HTTP::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $request->q,
        ]);

        if ($response->successful()) {
            return view('weather', ['data' => $response->json()]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'City ​​was not found');
        }
    }

    public function map(Request $request): View|RedirectResponse
    {
        $response = HTTP::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $request->q,
        ]);

        if ($response->successful()) {
            return view('map', ['data' => $response->json()]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'City ​​was not found');
        }
    }
}

