<?php

namespace Tests\Unit\Http\Middleware;

use App\Http\Middleware\Locale;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Mockery\MockInterface;
use Tests\TestCase;

class LocaleMiddlewareTest extends TestCase
{
    public function test_locale_middleware_on_set_locale_language(): void
    {
        $settingsService = $this->mock(SettingsService::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')->with('language', app()->getLocale())->once();
        });

        $middleware = new Locale($settingsService);
        $request = new Request;

       $middleware->handle($request, function($req) {
           $this->assertEquals($req->setLocale('ru'), app()->getLocale());
       });
    }
}
