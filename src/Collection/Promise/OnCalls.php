<?php

namespace Shrikeh\PagerDuty\Collection\Promise;

use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Collection\OnCalls as Storage;
use Shrikeh\PagerDuty\Callback;

final class OnCalls implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\PromiseCollection;

    private $callback;

    private $collection;

    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    private function getStorage()
    {
        if (!$this->collection) {
            $this->collection = $this->callback->result();
        }
        return $this->collection;
    }
}
