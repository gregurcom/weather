<?php

declare(strict_types = 1);

namespace Tests\Unit\Services;

use App\Services\SettingsService;
use Illuminate\Session\Store;
use Mockery\MockInterface;
use Tests\TestCase;

class SettingsServiceTest extends TestCase
{
    public function test_save(): void
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

    public function test_get(): void
    {
        $store = $this->mock(Store::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->with('settings.temperature', null)
                ->once()
                ->andReturn('temp_f');
        });

        $settings = new SettingsService($store);
        $temperature = $settings->get('temperature');

        $this->assertEquals('temp_f', $temperature);
    }

    public function test_get_with_default_value(): void
    {
        $store = $this->mock(Store::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->with('settings.temperature', 'foo')
                ->once();
        });

        $settings = new SettingsService($store);
        $settings->get('temperature', 'foo');
    }
}
