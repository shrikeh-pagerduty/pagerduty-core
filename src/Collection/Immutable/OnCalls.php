<?php

namespace Shrikeh\PagerDuty\Collection\Immutable;

use IteratorIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Collection\OnCalls as OnCallsCollection;
use Shrikeh\PagerDuty\Entity\OnCall;

final class OnCalls extends IteratorIterator implements Collection, OnCallsCollection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ImmutableCollection;

    protected function append(OnCall $oncall)
    {
        $this->getStorage()->attach($oncall);
    }

    public function filteredByLevel($level)
    {
        $oncalls = [];

        foreach ($this->getStorage() as $oncall) {
            if ($oncall->level() === $level) {
                $oncalls[] = $oncall;
            }
        }
        return static::fromArray($oncalls);
    }
}
