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
        $this->store->put('history.' . 'history_' . $city, $city);

        if (count($this->store->get('history')) > 3)
        {
            $this->store->forget('history.' . array_key_first($this->store->get('history')));
        }
    }

    public function get(): array
    {
        return array_reverse($this->store->get('history', []), true);
    }
}
