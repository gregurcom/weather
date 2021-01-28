<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class SearchCityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_change_settings()
    {
        $city = Factory::create()->citySuffix;

        $response = $this->withSession(['settings.temperature' => 'temp_f'])->get(route('weather', ['q' => $city]));

        $response->assertOk()->assertSee($city)->assertSee('°F');
    }
}
