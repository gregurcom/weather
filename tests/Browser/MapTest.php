<?php

namespace Tests\Browser;

use Faker\Factory;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MapTest extends DuskTestCase
{
    public function testCityOnMap(): void
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
