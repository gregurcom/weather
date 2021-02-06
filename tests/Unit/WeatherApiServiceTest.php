<?php

namespace Tests\Unit;

use App\Services\WeatherApiService;
use Faker\Factory;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherApiServiceTest extends TestCase
{
    public function test_get_success_status_weather_page_with_api_keys(): void
    {
        $city = Factory::create()->citySuffix;

        $weatherApi = new WeatherApiService();
        $head = $weatherApi->getCurrentWeather($city)->handlerStats();

        $this->assertEquals(200, $head['http_code']);
    }
}
