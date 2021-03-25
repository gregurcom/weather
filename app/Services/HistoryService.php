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

    public function saveHistory(array $data): void
    {
        if ($this->store->has('history')) {
            if (in_array($data, session('history'))) {
                // do nothing
            } elseif (count(session('history')) < 3) {
                $this->store->push('history', $data);
            } else {
                $this->store->forget('history.' . array_key_first(session('history')));
                $this->store->push('history', $data);
            }
        } else {
            $this->store->put('history', [$data]);
        }
    }
}
