<?php

namespace Tests\Browser;

use Faker\Factory;
use Laravel\Dusk\Browser;

class WeatherTest extends DuskTestCase
{
    public function test_weather_page_with_city_name(): void
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
