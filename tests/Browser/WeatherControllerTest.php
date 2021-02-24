<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class WeatherControllerTest extends DuskTestCase
{
    public function test_weather(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('weather', ['q' => 'Balti'])
                ->assertSee('Balti')
                ->assertVisible('.fa-map-marker')
                ->assertVisible('.fa-sliders');
        });
    }

    public function test_map(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('weather.map', ['q' => 'Balti'])
                ->assertSee('Balti')
                ->assertSee('OpenStreetMap');
        });
    }
}
