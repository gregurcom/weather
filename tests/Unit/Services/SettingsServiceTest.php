<?php

namespace Tests\Unit\Services;

use App\Services\SettingsService;
use Illuminate\Session\Store;
use Mockery\MockInterface;
use Tests\TestCase;

class SettingsServiceTest extends TestCase
{
    public function test_save_dates_of_weather(): void
    {
        $dates = [
            'temperature' => 'temp_f',
            'pressure' => 'mm',
            'speed' => 'wind_kph',
            'precipitation' => 'mm',
            'language' => 'ru',
        ];

        $store = $this->mock(Store::class, function (MockInterface $mock) use ($dates) {
            $mock->shouldReceive('put')->with('settings', $dates)->once();
        });

        $settingsService = new SettingsService($store);

        $settingsService->save($dates);
    }

    public function test_get_dates_of_weather(): void
    {
        $store = $this->mock(Store::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')->with('settings.temperature', null)->once();
        });

        $settings = new SettingsService($store);
        $settings->get('temperature');
    }
}
