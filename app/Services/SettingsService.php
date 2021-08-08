<?php

declare(strict_types = 1);

namespace App\Services;

use Illuminate\Session\Store;

class SettingsService
{
    private const SESSION_KEY = 'settings';

    public function __construct(private Store $store) {}

    /**
     * @param array<string> $date
    */
    public function save(array $date): void
    {
        $this->store->put(self::SESSION_KEY, [
            'temperature' => $date['temperature'],
            'pressure' => $date['pressure'],
            'speed' => $date['speed'],
            'precipitation' => $date['precipitation'],
            'language' => $date['language'],
        ]);
    }

    public function get(string $key, string $default = null): mixed
    {
        return $this->store->get(self::SESSION_KEY . '.' . $key, $default);
    }
}
