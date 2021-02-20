<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class IndexControllerTest extends DuskTestCase
{
    public function test_home(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('home')
                ->assertSee('Weather App')
                ->type('q', 'Balti')
                ->click('#search-button')
                ->assertPathIs('/weather');
        });
    }
}
