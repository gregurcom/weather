<?php

declare(strict_types = 1);

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class WeatherControllerTest extends DuskTestCase
{
    public function test_weather(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('weather', ['q' => 'Chisinau'])
                ->assertTitle('Chisinau - weather forecast')
                ->assertSee('Chisinau')
                ->assertVisible('.fa-map-marker')
                ->assertVisible('.fa-sliders');
        });
    }

    public function test_map(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('weather.map', ['q' => 'Chisinau'])
                ->assertTitle('Chisinau - map')
                ->assertSee('Chisinau')
                ->assertSee('OpenStreetMap');
        });
    }
}
