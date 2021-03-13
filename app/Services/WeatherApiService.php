<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

final class WeatherApiService
{
    public function getCurrentWeather(string $query): array|null
    {
        $data = Http::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query,
        ]);

        if ($data->successful()) {
            return Cache::remember('weather' . $query, 600, function () use ($data) {

                return $data->json();
            });
        }

        return null;
    }
}
