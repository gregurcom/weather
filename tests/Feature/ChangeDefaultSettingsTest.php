<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class ChangeDefaultSettingsTest extends TestCase
{
    public function test_change_temperature_settings(): void
    {
        $city = Factory::create()->citySuffix;

        $response = $this->withSession(['settings.temperature' => 'temp_f'])->get(route('weather', ['q' => $city]));

        $response->assertOk()->assertSee($city)->assertSee('°F');
    }
}
