<?php

namespace Tests\Feature;

use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    public function test_weather(): void
    {
        $response = $this->call('GET','/weather', ['q' => 'Balti']);

        $response->assertOk()
            ->assertSee('Balti')
            ->assertSee('Humidity')
            ->assertSee('Pressure')
            ->assertSee('Wind')
            ->assertSee('Precipitation');
    }

    public function test_map(): void
    {
        $response = $this->call('GET','/weather/map', ['q' => 'Balti']);

        $response->assertOk()
            ->assertSee('Balti')
            ->assertSee('OpenStreetMap');
    }
}
