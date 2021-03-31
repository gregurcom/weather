<?php

namespace App\Services;

use Illuminate\Session\Store;

final class HistoryService
{
    private const LIMIT = 3;

    private const STORE_KEY = 'history';

    public function __construct(private Store $store) {}

    public function save(string $city): void
    {
        // Get data from store
        $storeData = $this->get();

        // Delete duplicated data
        $storeData = array_filter($storeData, fn($value) => $value !== $city);

        // Insert new data at the beginning of array
        array_unshift($storeData, $city);

        // Limit elements
        $storeData = array_slice($storeData, 0, self::LIMIT);

        // Replace data in store
        $this->store->put(self::STORE_KEY, $storeData);
    }

    public function get(): array
    {
        return $this->store->get(self::STORE_KEY, []);
    }
}
