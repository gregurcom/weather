<?php

declare(strict_types = 1);

namespace Tests\Browser;

use Laravel\Dusk\Browser;

class SettingControllerTest extends DuskTestCase
{
    public function test_apply_settings(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('settings')
                ->assertTitle('Weather App - settings')
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
