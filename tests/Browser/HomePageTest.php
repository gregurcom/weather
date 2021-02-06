<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    public function testHomePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('home'))
                ->assertSee('Weather App');
        });
    }
}
