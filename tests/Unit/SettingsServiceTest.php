<?php

namespace Tests\Unit;

use App\Services\SettingsService;
use Mockery;
use PHPUnit\Framework\TestCase;

class SettingsServiceTest extends TestCase
{
    public function test_get_temperature_value_temp_f(): void
    {
        $settings = Mockery::mock(SettingsService::class);

        $settings->shouldReceive('get')->with('temperature', 'temp_c')->andReturn('temp_f');
        $set = $settings->get('temperature', 'temp_c');

        $this->assertEquals('temp_f', $set);
    }
}
