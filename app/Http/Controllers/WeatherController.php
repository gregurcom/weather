<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class WeatherController extends Controller
{
    public function weather(WeatherRequest $request): View|RedirectResponse
    {
        $response = HTTP::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $request->city,
        ]);

        if ($response->successful()) {
            return view('weather', ['data' => $response->json()]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'Сity ​​was not found');
        }
    }
}

