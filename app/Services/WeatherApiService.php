<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class WeatherApiService
{
    private Http $weatherApiService;

    public function __construct(Http $weatherApiService)
    {
        $this->weatherApiService = $weatherApiService;
    }

    public function getCurrentWeather(string $query): Response
    {
        return $this->weatherApiService::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query
        ]);
    }
}
