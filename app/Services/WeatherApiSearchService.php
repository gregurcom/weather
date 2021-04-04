<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherApiSearchService
{
    public function getWeather(string $query): array
    {
        $data = Http::get('http://api.weatherapi.com/v1/search.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query,
        ]);

        return $data->json();
    }
}
