<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use App\Services\SettingsService;
use Closure;
use Illuminate\Http\Request;

final class Locale
{
    private SettingsService $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function handle(Request $request, Closure $next): mixed
    {
        $locale = $this->settingsService->get('language', app()->getLocale());
        app()->setLocale($locale);

        return $next($request);
    }
}
