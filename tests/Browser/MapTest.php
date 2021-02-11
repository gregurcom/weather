<?php

namespace Tests\Browser;

use Faker\Factory;
use Laravel\Dusk\Browser;

class MapTest extends DuskTestCase
{
    public function test_city_on_map(): void
    {
        $city = Factory::create()->citySuffix;

        $this->browse(function (Browser $browser) use ($city) {
            $browser->visitRoute('weather', ['q' => $city])
                ->click('#map-button')
                ->assertSee(ucfirst($city))
                ->assertSee('OpenStreetMap');
        });
    }
}
