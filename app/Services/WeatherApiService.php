<?php

namespace App\Services;

use App\Http\Requests\WeatherRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class WeatherApiService
{
    public static function weatherApi(WeatherRequest $request): Response
    {
        return HTTP::get('http://api.weatherapi.com/v1/current.json', [
            'key' => config('app.weatherapi_key'),
            'q' => $request->q
        ]);
    }
}
