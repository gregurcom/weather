<?php

namespace Tests\Browser;

use Faker\Factory;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WeatherTest extends DuskTestCase
{
    public function testWeatherPageWithCityName(): void
    {
        $city = Factory::create()->citySuffix;

        $this->browse(function (Browser $browser) use ($city) {
            $browser->visitRoute('home')
                ->type('q', $city)
                ->click('#search-button')
                ->assertSee(ucfirst($city));
        });
    }
}
