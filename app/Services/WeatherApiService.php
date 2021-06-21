<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

final class WeatherApiService
{
    private const URL = 'http://api.weatherapi.com/v1';

    public function getCurrentWeather(string $query): array|null
    {
        if (Cache::has('weather_' . $query)) {

            return Cache::get('weather_'. $query);
        } else {
            $data = Http::get(self::URL . '/current.json', [
                'key' => config('app.weatherapi_key'),
                'q' => $query,
            ]);

            if ($data->successful()) {
                return Cache::remember('weather_' . $query, 600, function () use ($data) {

                    return $data->json();
                });
            }

            return null;
        }
    }

    public function getSearch(string $query): array
    {
        $data = Http::get(self::URL . '/search.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query,
        ]);

        if ($data->failed() || empty($data->json())) {
            throw new \Exception('City was not found');
        }

        return array_map(fn($city) => $city['name'], $data->json());
    }
}
