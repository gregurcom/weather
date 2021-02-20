<?php

namespace Tests\Unit\Services;

use App\Services\WeatherApiService;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherApiServiceTest extends TestCase
{
    public function test_get_current_weather_query(): void
    {
        Http::fake();

        $weather = new WeatherApiService();

        $weather->getCurrentWeather('Balti');

        Http::assertSent(function (Request $request) {
            return $request['q'] == 'Balti';
        });
    }
}
