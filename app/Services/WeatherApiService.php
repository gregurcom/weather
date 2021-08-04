<?php

declare(strict_types = 1);

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

final class WeatherApiService
{
    private const URL = 'http://api.weatherapi.com/v1';

    /**
     * @param string $query
     *
     * @return array<string>
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function getCurrentWeather(string $query): array
    {
        if (Cache::has('weather_' . $query)) {

            return Cache::get('weather_'. $query);
        } else {
            $data = Http::get(self::URL . '/current.json', [
                'key' => config('app.weatherapi_key'),
                'q' => $query,
            ]);

            $data->throw();

            return Cache::remember('weather_' . $query, 600, function () use ($data) {

                return $data->json();
            });
        }
    }

    /**
     * @param string $query
     *
     * @return array<string>
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function getSearch(string $query): array
    {
        $data = Http::get(self::URL . '/search.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $query,
        ]);

        $data->throw();

        return array_map(fn($city) => $city['name'], $data->json());
    }
}
