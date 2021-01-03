<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchByCityRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class WeatherController extends Controller
{
    public function weather(SearchByCityRequest $request): View|RedirectResponse
    {
        $response = HTTP::get("http://api.weatherapi.com/v1/current.json", [
            "key" => config("app.weather_key"),
            "q" => $request->city
        ]);

        if (!isset($response->json()['error'])) {

            return view('weather', ['response' => $response->json()]);
        } else {
            return redirect()->route('home')->with('status', 'Сity ​​was not found');
        }
    }
}

