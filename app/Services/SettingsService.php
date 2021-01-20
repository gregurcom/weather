<?php

namespace App\Services;

use Illuminate\Session\Store;

class SettingsService
{
    private const SESSION_KEY = 'settings';

    private Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function save(array $date): void
    {
        $this->store->put(self::SESSION_KEY, [
            'temperature' => $date['temperature'],
            'pressure' => $date['pressure'],
            'speed' => $date['speed'],
            'precipitation' => $date['precipitation'],
        ]);
    }

    public function get(string $key, string $default = null): mixed
    {
        return $this->store->get(self::SESSION_KEY . '.' . $key, $default);
    }
}
