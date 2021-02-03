<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SettingsTest extends DuskTestCase
{
    public function testApplySettings()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('settings')
                ->select('temperature', 'temp_c')
                ->select('speed', 'wind_mph')
                ->select('pressure', 'pressure_in')
                ->select('precipitation', 'precip_in')
                ->select('language', 'ru')
                ->press('settings-button')
                ->assertSee('Настройки');
        });
    }
}
