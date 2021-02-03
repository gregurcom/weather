<?php

namespace Tests\Unit;

use App\Http\Middleware\Locale;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mockery;
use Tests\TestCase;

class LocaleMiddlewareTest extends TestCase
{
    public function test_locale_middleware()
    {
        $request = new Request;

        $settings = Mockery::mock(SettingsService::class);
        $settings->shouldReceive('get')->with('language', App::getLocale())->once();

        $middleware = new Locale($settings);

        $middleware->handle($request, function ($req) {
            $this->assertEquals('en', $req->getLocale());
        });
    }
}
