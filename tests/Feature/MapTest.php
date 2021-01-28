<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class MapTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_map_page()
    {

        $city = Factory::create()->citySuffix;

        $response = $this->get(route('weather.map', ['q' => $city]));

        $response->assertOk()->assertSee($city)->assertSee('OpenStreetMap');
    }
}
