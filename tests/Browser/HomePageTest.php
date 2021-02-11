<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class HomePageTest extends DuskTestCase
{
    public function test_home_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('home'))
                ->assertSee('Weather App');
        });
    }
}
