<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use SplObjectStorage;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\OnCall;

final class OnCalls extends IteratorIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\ImmutableCollection;

    public function __construct($onCalls)
    {
        parent::__construct(new SplObjectStorage());

        foreach ($onCalls as $oncall) {
            $this->appendOnCall($oncall);
        }
        $this->getInnerIterator()->rewind();
    }

    private function appendOnCall(OnCall $oncall)
    {
        $this->getInnerIterator()->attach($oncall);
    }

    public function filteredByLevel($level)
    {
        $oncalls = [];

        foreach ($this->getInnerIterator() as $oncall) {
            if ($oncall->level() === $level) {
                $oncalls[] = $oncall;
            }
        }
        return new static($oncalls);
    }
}
