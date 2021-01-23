<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

final class WeatherApiService
{
    public function getCurrentWeather(string $query): Response
    {
        return Http::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query
        ]);
    }
}
