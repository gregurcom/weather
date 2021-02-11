<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    public function test_map_page_with_name_of_city(): void
    {
        $city = Factory::create()->citySuffix;

        $response = $this->get(route('weather.map', ['q' => $city]));

        $response->assertOk()->assertSee($city)->assertSee('OpenStreetMap');
    }
}
