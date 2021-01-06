<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class WeatherApiService
{
    public function getCurrentWeather(string $query): Response
    {
        return HTTP::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query
        ]);
    }
}
