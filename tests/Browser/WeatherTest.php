<?php

namespace Tests\Browser;

use Faker\Factory;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WeatherTest extends DuskTestCase
{
     /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testWeather()
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
