<?php

namespace App\Services;

use Illuminate\Session\Store;

final class HistoryService
{
    private Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function save(string $city): void
    {
        if ($this->store->has('history')) {
            if (in_array($city, $this->store->get('history'))) {
                $repeatingCity = array_search($city, $this->store->get('history'));
                $this->store->forget('history.' . $repeatingCity);
                $this->store->push('history', $city);
            } elseif (count($this->store->get('history')) < 3) {
                $this->store->push('history', $city);
            } else {
                $this->store->forget('history.' . array_key_first($this->store->get('history')));
                $this->store->push('history', $city);
            }
        } else {
            $this->store->put('history', [$city]);
        }
    }

    public function get(string $history): array|null
    {
        return $this->store->get($history);
    }
}
