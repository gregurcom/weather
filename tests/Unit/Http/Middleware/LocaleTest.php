<?php

declare(strict_types = 1);

namespace Tests\Unit\Http\Middleware;

use App\Http\Middleware\Locale;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Mockery\MockInterface;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    public function test_set_app_locale(): void
    {
        $settingsService = $this->mock(SettingsService::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')->once()->andReturn('ro');
        });

        $middleware = new Locale($settingsService);

        $middleware->handle(new Request(), function () {
           $this->assertEquals('ro', app()->getLocale());
        });
    }
}
